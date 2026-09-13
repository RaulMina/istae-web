<?php

namespace App\Services;

use App\Models\ChatConversation;
use App\Models\ChatSetting;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use RuntimeException;

class OpenAiChatService
{
    /**
     * Valor por defecto de mensajes de historial si no hay uno configurado en
     * chat_settings.history_message_limit (ver ChatSetting).
     */
    private const DEFAULT_HISTORY_MESSAGE_LIMIT = 6;

    private string $apiKey;
    private string $model;
    private string $baseUrl;

    public function __construct()
    {
        $this->apiKey = (string) config('services.openai.api_key');
        $this->model = (string) config('services.openai.model', 'gpt-4o-mini');
        $this->baseUrl = rtrim((string) config('services.openai.base_url', 'https://api.openai.com/v1'), '/');
    }

    public function isConfigured(): bool
    {
        return $this->apiKey !== '';
    }

    private function client()
    {
        return Http::withToken($this->apiKey)->timeout(30);
    }

    /**
     * Send a user message to the assistant and return its reply text.
     * Reenvía únicamente una ventana acotada de mensajes recientes como contexto
     * (chat_settings.history_message_limit) en lugar de encadenar todo el historial
     * vía previous_response_id, para evitar que el costo por turno crezca sin límite.
     */
    public function sendMessage(ChatConversation $conversation, string $userMessage, ChatSetting $settings): string
    {
        if (!$this->isConfigured()) {
            throw new RuntimeException('OPENAI_API_KEY no está configurada.');
        }

        $historyLimit = $settings->history_message_limit ?: self::DEFAULT_HISTORY_MESSAGE_LIMIT;

        $recentMessages = $conversation->messages()
            ->latest()
            ->take($historyLimit)
            ->get()
            ->reverse()
            ->values();

        $input = $recentMessages->isEmpty()
            ? $userMessage
            : $recentMessages->map(fn ($m) => ['role' => $m->role, 'content' => $m->content])->all();

        $payload = [
            'model' => $this->model,
            'input' => $input,
            'instructions' => $settings->system_prompt,
        ];

        if ($settings->vector_store_id) {
            $payload['tools'] = [
                [
                    'type' => 'file_search',
                    'vector_store_ids' => [$settings->vector_store_id],
                ],
            ];
        }

        $response = $this->client()->post("{$this->baseUrl}/responses", $payload);

        if ($response->failed()) {
            Log::error('OpenAI responses error', ['status' => $response->status(), 'body' => $response->body()]);
            throw new RuntimeException('No se pudo obtener respuesta del asistente.');
        }

        $data = $response->json();

        if (!empty($data['id'])) {
            $conversation->update(['openai_last_response_id' => $data['id']]);
        }

        return $this->extractText($data);
    }

    private function extractText(array $data): string
    {
        if (!empty($data['output_text'])) {
            return trim((string) $data['output_text']);
        }

        $text = '';
        foreach ($data['output'] ?? [] as $item) {
            if (($item['type'] ?? null) !== 'message') {
                continue;
            }
            foreach ($item['content'] ?? [] as $content) {
                if (($content['type'] ?? null) === 'output_text') {
                    $text .= $content['text'] ?? '';
                }
            }
        }

        return trim($text) !== '' ? trim($text) : 'No obtuve una respuesta del asistente. Intenta reformular tu pregunta.';
    }

    /**
     * Ensure a vector store exists for the knowledge base, creating one if needed.
     */
    public function ensureVectorStore(ChatSetting $settings): string
    {
        if ($settings->vector_store_id) {
            return $settings->vector_store_id;
        }

        if (!$this->isConfigured()) {
            throw new RuntimeException('OPENAI_API_KEY no está configurada.');
        }

        $response = $this->client()->post("{$this->baseUrl}/vector_stores", [
            'name' => 'ISTAE Knowledge Base',
        ]);

        if ($response->failed()) {
            Log::error('OpenAI vector store creation error', ['status' => $response->status(), 'body' => $response->body()]);
            throw new RuntimeException('No se pudo crear la base de conocimiento en OpenAI.');
        }

        $vectorStoreId = $response->json('id');
        $settings->update(['vector_store_id' => $vectorStoreId]);

        return $vectorStoreId;
    }

    /**
     * Upload a file to OpenAI and attach it to the given vector store.
     * Returns the OpenAI file id.
     */
    public function uploadKnowledgeFile(UploadedFile $file, string $vectorStoreId): string
    {
        if (!$this->isConfigured()) {
            throw new RuntimeException('OPENAI_API_KEY no está configurada.');
        }

        $uploadResponse = $this->client()
            ->attach('file', file_get_contents($file->getRealPath()), $file->getClientOriginalName())
            ->post("{$this->baseUrl}/files", [
                'purpose' => 'assistants',
            ]);

        if ($uploadResponse->failed()) {
            Log::error('OpenAI file upload error', ['status' => $uploadResponse->status(), 'body' => $uploadResponse->body()]);
            throw new RuntimeException('No se pudo subir el archivo a OpenAI.');
        }

        $fileId = $uploadResponse->json('id');

        $attachResponse = $this->client()->post("{$this->baseUrl}/vector_stores/{$vectorStoreId}/files", [
            'file_id' => $fileId,
        ]);

        if ($attachResponse->failed()) {
            Log::error('OpenAI vector store attach error', ['status' => $attachResponse->status(), 'body' => $attachResponse->body()]);
            throw new RuntimeException('El archivo se subió pero no se pudo vincular a la base de conocimiento.');
        }

        return $fileId;
    }

    /**
     * Upload raw text content (e.g. scraped web page text) as a knowledge file
     * and attach it to the given vector store. Returns the OpenAI file id.
     */
    public function uploadKnowledgeContent(string $content, string $filename, string $vectorStoreId): string
    {
        if (!$this->isConfigured()) {
            throw new RuntimeException('OPENAI_API_KEY no está configurada.');
        }

        $uploadResponse = $this->client()
            ->attach('file', $content, $filename)
            ->post("{$this->baseUrl}/files", [
                'purpose' => 'assistants',
            ]);

        if ($uploadResponse->failed()) {
            Log::error('OpenAI file upload error', ['status' => $uploadResponse->status(), 'body' => $uploadResponse->body()]);
            throw new RuntimeException('No se pudo subir el contenido a OpenAI.');
        }

        $fileId = $uploadResponse->json('id');

        $attachResponse = $this->client()->post("{$this->baseUrl}/vector_stores/{$vectorStoreId}/files", [
            'file_id' => $fileId,
        ]);

        if ($attachResponse->failed()) {
            Log::error('OpenAI vector store attach error', ['status' => $attachResponse->status(), 'body' => $attachResponse->body()]);
            throw new RuntimeException('El contenido se subió pero no se pudo vincular a la base de conocimiento.');
        }

        return $fileId;
    }

    /**
     * Detach and delete a knowledge file from OpenAI.
     */
    public function deleteKnowledgeFile(?string $vectorStoreId, string $fileId): void
    {
        if (!$this->isConfigured() || !$fileId) {
            return;
        }

        if ($vectorStoreId) {
            $this->client()->delete("{$this->baseUrl}/vector_stores/{$vectorStoreId}/files/{$fileId}");
        }

        $this->client()->delete("{$this->baseUrl}/files/{$fileId}");
    }
}
