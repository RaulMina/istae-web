<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatKnowledgeFile;
use App\Models\ChatSetting;
use App\Models\ChatWebsiteSource;
use App\Services\OpenAiChatService;
use App\Services\WebsiteScraperService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ChatSettingsController extends Controller
{
    private function denyIfNotAdmin()
    {
        if (session()->has('roles')) {
            if (session('roles') && session('roles')->role_name != 'admin') {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }

        return null;
    }

    public function index()
    {
        if ($redirect = $this->denyIfNotAdmin()) {
            return $redirect;
        }

        $settings = ChatSetting::current();
        $files = ChatKnowledgeFile::latest()->get();
        $websiteSources = ChatWebsiteSource::latest()->get();

        return view('admin.chat.settings', compact('settings', 'files', 'websiteSources'));
    }

    public function updateSettings(Request $request)
    {
        if ($redirect = $this->denyIfNotAdmin()) {
            return $redirect;
        }

        $request->validate([
            'bot_name' => 'required|string|max:50',
            'tooltip_text' => 'nullable|string|max:120',
            'system_prompt' => 'nullable|string|max:4000',
            'is_enabled' => 'nullable|boolean',
            'scrape_frequency_hours' => 'nullable|integer|min:24|max:720',
            'history_message_limit' => 'nullable|integer|min:2|max:30',
        ]);

        $settings = ChatSetting::current();
        $settings->update([
            'bot_name' => $request->input('bot_name'),
            'tooltip_text' => $request->input('tooltip_text'),
            'system_prompt' => $request->input('system_prompt'),
            'is_enabled' => $request->boolean('is_enabled'),
            'scrape_frequency_hours' => $request->input('scrape_frequency_hours', $settings->scrape_frequency_hours),
            'history_message_limit' => $request->input('history_message_limit', $settings->history_message_limit),
        ]);

        return redirect()->route('admin.chat.index')->with('success', 'Configuración del asistente actualizada.');
    }

    public function storeWebsiteSource(Request $request, WebsiteScraperService $scraper)
    {
        if ($redirect = $this->denyIfNotAdmin()) {
            return $redirect;
        }

        $request->validate([
            'url' => 'required|url|max:2048|unique:chat_website_sources,url',
        ]);

        $source = ChatWebsiteSource::create([
            'url' => $request->input('url'),
            'status' => 'pending',
        ]);

        if ($scraper->scrape($source)) {
            return redirect()->route('admin.chat.index')->with('success', 'Página agregada y procesada.');
        }

        return redirect()->route('admin.chat.index')
            ->with('error', 'La página se agregó, pero no se pudo procesar: '.$source->fresh()->error_message);
    }

    public function updateWebsiteSourceFrequency(Request $request, ChatWebsiteSource $websiteSource)
    {
        if ($redirect = $this->denyIfNotAdmin()) {
            return $redirect;
        }

        $request->validate([
            'frequency_hours' => 'nullable|integer|min:24|max:720',
        ]);

        $websiteSource->update(['frequency_hours' => $request->input('frequency_hours') ?: null]);

        return redirect()->route('admin.chat.index')->with('success', 'Frecuencia actualizada.');
    }

    public function bulkDestroyWebsiteSources(Request $request, WebsiteScraperService $scraper)
    {
        if ($redirect = $this->denyIfNotAdmin()) {
            return $redirect;
        }

        $request->validate([
            'ids' => 'required|array|min:1',
            'ids.*' => 'integer|exists:chat_website_sources,id',
        ]);

        $deleted = 0;
        foreach (ChatWebsiteSource::whereIn('id', $request->input('ids'))->get() as $source) {
            $scraper->remove($source);
            $deleted++;
        }

        $message = $deleted === 1 ? '1 página eliminada.' : "{$deleted} páginas eliminadas.";

        return redirect()->route('admin.chat.index')->with('success', $message);
    }

    public function bulkRefreshWebsiteSources(Request $request, WebsiteScraperService $scraper)
    {
        if ($redirect = $this->denyIfNotAdmin()) {
            return $redirect;
        }

        $request->validate([
            'ids' => 'required|array|min:1',
            'ids.*' => 'integer|exists:chat_website_sources,id',
        ]);

        $ok = 0;
        $failed = 0;
        foreach (ChatWebsiteSource::whereIn('id', $request->input('ids'))->get() as $source) {
            $scraper->scrape($source) ? $ok++ : $failed++;
        }

        $message = $ok === 1 ? '1 página actualizada.' : "{$ok} páginas actualizadas.";
        if ($failed > 0) {
            return redirect()->route('admin.chat.index')
                ->with('success', $message)
                ->with('error', "{$failed} página(s) no se pudieron actualizar.");
        }

        return redirect()->route('admin.chat.index')->with('success', $message);
    }

    public function refreshWebsiteSource(ChatWebsiteSource $websiteSource, WebsiteScraperService $scraper)
    {
        if ($redirect = $this->denyIfNotAdmin()) {
            return $redirect;
        }

        if ($scraper->scrape($websiteSource)) {
            return redirect()->route('admin.chat.index')->with('success', 'Página actualizada.');
        }

        return redirect()->route('admin.chat.index')
            ->with('error', 'No se pudo actualizar: '.$websiteSource->fresh()->error_message);
    }

    public function destroyWebsiteSource(ChatWebsiteSource $websiteSource, WebsiteScraperService $scraper)
    {
        if ($redirect = $this->denyIfNotAdmin()) {
            return $redirect;
        }

        try {
            $scraper->remove($websiteSource);

            return redirect()->route('admin.chat.index')->with('success', 'Página eliminada de la base de conocimiento.');
        } catch (Exception $e) {
            report($e);

            return redirect()->route('admin.chat.index')->with('error', 'No se pudo eliminar la página.');
        }
    }

    public function updateIcon(Request $request)
    {
        if ($redirect = $this->denyIfNotAdmin()) {
            return $redirect;
        }

        $request->validate([
            'icon' => 'required|image|mimes:png,jpg,jpeg,webp,svg|max:2048',
        ]);

        $settings = ChatSetting::current();

        try {
            $destination = public_path('assets/img/chat');
            if (!File::isDirectory($destination)) {
                File::makeDirectory($destination, 0755, true);
            }

            $file = $request->file('icon');
            $fileName = 'chat-icon-'.time().'.'.$file->getClientOriginalExtension();
            $file->move($destination, $fileName);

            if ($settings->icon_path) {
                $previous = public_path($settings->icon_path);
                if (File::exists($previous)) {
                    File::delete($previous);
                }
            }

            $settings->update(['icon_path' => 'assets/img/chat/'.$fileName]);

            return redirect()->route('admin.chat.index')->with('success', 'Ícono del chat actualizado.');
        } catch (Exception $e) {
            report($e);

            return redirect()->route('admin.chat.index')->with('error', 'No se pudo actualizar el ícono.');
        }
    }

    public function storeKnowledgeFile(Request $request, OpenAiChatService $openAi)
    {
        if ($redirect = $this->denyIfNotAdmin()) {
            return $redirect;
        }

        $request->validate([
            'knowledge_file' => 'required|array|min:1',
            'knowledge_file.*' => 'file|mimes:pdf,txt,doc,docx,md|max:15360',
        ]);

        $settings = ChatSetting::current();
        $uploaded = 0;
        $failed = [];

        try {
            $vectorStoreId = $openAi->ensureVectorStore($settings);
        } catch (Exception $e) {
            report($e);

            return redirect()->route('admin.chat.index')->with('error', 'No se pudo preparar la base de conocimiento: '.$e->getMessage());
        }

        $destination = public_path('assets/chat-knowledge');
        if (!File::isDirectory($destination)) {
            File::makeDirectory($destination, 0755, true);
        }

        foreach ($request->file('knowledge_file') as $file) {
            $originalName = $file->getClientOriginalName();
            $sizeBytes = $file->getSize();

            try {
                $openAiFileId = $openAi->uploadKnowledgeFile($file, $vectorStoreId);

                $storedName = Str::uuid().'.'.$file->getClientOriginalExtension();
                $file->move($destination, $storedName);

                ChatKnowledgeFile::create([
                    'original_name' => $originalName,
                    'openai_file_id' => $openAiFileId,
                    'stored_path' => 'assets/chat-knowledge/'.$storedName,
                    'status' => 'ready',
                    'size_bytes' => $sizeBytes,
                    'uploaded_by' => optional(session('user'))->id,
                ]);

                $uploaded++;
            } catch (Exception $e) {
                report($e);
                $failed[] = $originalName;
            }
        }

        if ($uploaded > 0 && empty($failed)) {
            return redirect()->route('admin.chat.index')
                ->with('success', $uploaded === 1 ? 'Archivo agregado a la base de conocimiento.' : "{$uploaded} archivos agregados a la base de conocimiento.");
        }

        if ($uploaded > 0 && !empty($failed)) {
            return redirect()->route('admin.chat.index')
                ->with('success', "{$uploaded} archivo(s) agregados.")
                ->with('error', 'No se pudieron subir: '.implode(', ', $failed));
        }

        return redirect()->route('admin.chat.index')->with('error', 'No se pudo subir ningún archivo: '.implode(', ', $failed));
    }

    public function destroyKnowledgeFile(ChatKnowledgeFile $knowledgeFile, OpenAiChatService $openAi)
    {
        if ($redirect = $this->denyIfNotAdmin()) {
            return $redirect;
        }

        try {
            $this->deleteKnowledgeFileRecord($knowledgeFile, $openAi);

            return redirect()->route('admin.chat.index')->with('success', 'Archivo eliminado de la base de conocimiento.');
        } catch (Exception $e) {
            report($e);

            return redirect()->route('admin.chat.index')->with('error', 'No se pudo eliminar el archivo.');
        }
    }

    public function bulkDestroyKnowledgeFiles(Request $request, OpenAiChatService $openAi)
    {
        if ($redirect = $this->denyIfNotAdmin()) {
            return $redirect;
        }

        $request->validate([
            'ids' => 'required|array|min:1',
            'ids.*' => 'integer|exists:chat_knowledge_files,id',
        ]);

        $deleted = 0;
        $failed = 0;

        foreach (ChatKnowledgeFile::whereIn('id', $request->input('ids'))->get() as $knowledgeFile) {
            try {
                $this->deleteKnowledgeFileRecord($knowledgeFile, $openAi);
                $deleted++;
            } catch (Exception $e) {
                report($e);
                $failed++;
            }
        }

        $message = $deleted === 1 ? '1 archivo eliminado.' : "{$deleted} archivos eliminados.";
        if ($failed > 0) {
            return redirect()->route('admin.chat.index')
                ->with('success', $message)
                ->with('error', "{$failed} archivo(s) no se pudieron eliminar.");
        }

        return redirect()->route('admin.chat.index')->with('success', $message);
    }

    private function deleteKnowledgeFileRecord(ChatKnowledgeFile $knowledgeFile, OpenAiChatService $openAi): void
    {
        $settings = ChatSetting::current();
        $openAi->deleteKnowledgeFile($settings->vector_store_id, $knowledgeFile->openai_file_id);

        if ($knowledgeFile->stored_path) {
            $localPath = public_path($knowledgeFile->stored_path);
            if (File::exists($localPath)) {
                File::delete($localPath);
            }
        }

        $knowledgeFile->delete();
    }
}
