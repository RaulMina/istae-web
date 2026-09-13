<?php

namespace App\Http\Controllers;

use App\Models\ChatConversation;
use App\Models\ChatKnowledgeFile;
use App\Models\ChatSetting;
use App\Services\OpenAiChatService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Throwable;

class ChatController extends Controller
{
    public function send(Request $request, OpenAiChatService $openAi)
    {
        $request->validate([
            'message' => 'required|string|max:2000',
        ]);

        $settings = ChatSetting::current();

        if (!$settings->is_enabled || !$openAi->isConfigured()) {
            return response()->json([
                'error' => 'El asistente no está disponible en este momento.',
            ], 503);
        }

        try {
            $conversation = $this->currentConversation($request);

            $userMessage = trim($request->input('message'));

            $conversation->messages()->create([
                'role' => 'user',
                'content' => $userMessage,
            ]);

            $reply = $openAi->sendMessage($conversation, $userMessage, $settings);
            $reply = $this->resolveKnowledgeLinks($reply);

            $conversation->messages()->create([
                'role' => 'assistant',
                'content' => $reply,
            ]);

            return response()->json(['reply' => $reply]);
        } catch (Throwable $e) {
            report($e);

            return response()->json([
                'error' => 'Ocurrió un error al procesar tu mensaje. Intenta de nuevo en un momento.',
            ], 500);
        }
    }

    public function history(Request $request)
    {
        $sessionUuid = session('chat_session_uuid');

        if (!$sessionUuid) {
            return response()->json(['messages' => []]);
        }

        $conversation = ChatConversation::where('session_uuid', $sessionUuid)->first();

        if (!$conversation) {
            return response()->json(['messages' => []]);
        }

        $messages = $conversation->messages()
            ->orderBy('id')
            ->get(['role', 'content'])
            ->map(fn ($m) => ['role' => $m->role, 'content' => $m->content]);

        return response()->json(['messages' => $messages]);
    }

    public function downloadKnowledge(ChatKnowledgeFile $knowledgeFile)
    {
        if (!$knowledgeFile->stored_path || !file_exists(public_path($knowledgeFile->stored_path))) {
            abort(404);
        }

        return response()->download(public_path($knowledgeFile->stored_path), $knowledgeFile->original_name);
    }

    public function viewKnowledge(ChatKnowledgeFile $knowledgeFile)
    {
        if (!$knowledgeFile->stored_path || !file_exists(public_path($knowledgeFile->stored_path))) {
            abort(404);
        }

        return response()->file(public_path($knowledgeFile->stored_path));
    }

    private function currentConversation(Request $request): ChatConversation
    {
        $sessionUuid = session('chat_session_uuid');
        if (!$sessionUuid) {
            $sessionUuid = (string) Str::uuid();
            session(['chat_session_uuid' => $sessionUuid]);
        }

        return ChatConversation::firstOrCreate(
            ['session_uuid' => $sessionUuid],
            ['ip_address' => $request->ip()]
        );
    }

    /**
     * Replace any link the model produced pointing to a fake/inaccessible location
     * (e.g. OpenAI's internal "sandbox:/mnt/data/..." paths) with a real download
     * link to one of our own knowledge files when we can match it, or drop the
     * fake link otherwise. Also appends a link if a known file is mentioned by
     * name without any link at all.
     */
    private function resolveKnowledgeLinks(string $reply): string
    {
        $files = ChatKnowledgeFile::whereNotNull('stored_path')->get();

        if ($files->isEmpty()) {
            return $reply;
        }

        $normalize = function (string $name): string {
            $name = preg_replace('/\.[a-zA-Z0-9]+$/', '', $name);
            $name = preg_replace('/\s*\(\d+\)\s*$/', '', $name);
            $name = str_replace(['-', '_'], ' ', $name);
            $name = preg_replace('/\s+/', ' ', trim($name));

            return Str::lower(Str::ascii($name));
        };

        // El modelo a veces reformula el nombre del archivo (reordena palabras, agrega tildes),
        // pero conserva el código del documento (ej. "ISTAE-VS-04"). Ese código es un ancla de
        // coincidencia mucho más confiable que el nombre completo.
        $extractCode = function (string $text): ?string {
            return preg_match('/[a-z]{2,}-[a-z]{2,}-\d+/i', $text, $m) ? Str::lower($m[0]) : null;
        };

        $byNormalizedName = [];
        $byCode = [];
        foreach ($files as $file) {
            $byNormalizedName[$normalize($file->original_name)] = $file;
            if ($code = $extractCode($file->original_name)) {
                $byCode[$code] = $file;
            }
        }

        $ownDownloadBase = url('/chat/knowledge/');

        $reply = preg_replace_callback('/\[([^\]]+)\]\(([^)]+)\)/', function ($m) use ($byNormalizedName, $normalize, $ownDownloadBase) {
            [, $label, $url] = $m;

            if (Str::startsWith($url, $ownDownloadBase)) {
                return $m[0];
            }

            $path = parse_url($url, PHP_URL_PATH) ?: $url;
            $needle = $normalize(urldecode(basename($path)));

            foreach ($byNormalizedName as $normalizedName => $file) {
                if ($needle !== '' && (Str::contains($normalizedName, $needle) || Str::contains($needle, $normalizedName))) {
                    return '['.$file->original_name.']('.route('chat.knowledge.download', $file->id).')';
                }
            }

            return $label;
        }, $reply);

        $lowerReply = Str::lower($reply);

        foreach ($byCode as $code => $file) {
            $downloadUrl = route('chat.knowledge.download', $file->id);
            if (Str::contains($lowerReply, $code) && !Str::contains($reply, $downloadUrl)) {
                $reply .= "\n\n📎 [{$file->original_name}]({$downloadUrl})";
            }
        }

        $normalizedReply = Str::lower(Str::ascii(preg_replace('/\s+/', ' ', str_replace(['-', '_'], ' ', $reply))));

        foreach ($byNormalizedName as $normalizedName => $file) {
            $downloadUrl = route('chat.knowledge.download', $file->id);
            if ($normalizedName !== '' && Str::contains($normalizedReply, $normalizedName) && !Str::contains($reply, $downloadUrl)) {
                $reply .= "\n\n📎 [{$file->original_name}]({$downloadUrl})";
            }
        }

        // El modelo a veces pega un ")." o ".ext)" sobrante justo después de un enlace de
        // descarga ya resuelto (típicamente cuando el nombre del archivo tiene paréntesis,
        // ej. "(1).docx"), duplicando la extensión. Se limpia ese sobrante aquí.
        $reply = preg_replace(
            '/(\]\('.preg_quote(rtrim($ownDownloadBase, '/'), '/').'\/\d+\/download\))\.[a-zA-Z0-9]{1,5}\)/',
            '$1',
            $reply
        );

        return $reply;
    }
}
