<?php

namespace App\Services;

use App\Models\ChatKnowledgeFile;
use App\Models\ChatSetting;
use App\Models\ChatWebsiteSource;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use RuntimeException;
use Throwable;

class WebsiteScraperService
{
    public function __construct(private OpenAiChatService $openAi)
    {
    }

    /**
     * Scrape a single website source, replacing its previous knowledge file
     * (if any). Updates the source's status/error fields. Returns true on success.
     */
    public function scrape(ChatWebsiteSource $source): bool
    {
        $settings = ChatSetting::current();

        try {
            $vectorStoreId = $this->openAi->ensureVectorStore($settings);

            $response = Http::timeout(15)->get($source->url);
            if ($response->failed()) {
                throw new RuntimeException("No se pudo descargar la página (HTTP {$response->status()})");
            }

            $text = $this->extractVisibleText($response->body());
            if (trim($text) === '') {
                throw new RuntimeException('La página no tiene contenido de texto útil.');
            }

            $existing = ChatKnowledgeFile::query()
                ->where('source_url', $source->url)
                ->where('auto_scraped', true)
                ->first();

            if ($existing) {
                $this->openAi->deleteKnowledgeFile($settings->vector_store_id, $existing->openai_file_id);
                if ($existing->stored_path) {
                    $oldPath = public_path($existing->stored_path);
                    if (File::exists($oldPath)) {
                        File::delete($oldPath);
                    }
                }
                $existing->delete();
            }

            $filename = 'web-'.Str::slug(parse_url($source->url, PHP_URL_HOST).'-'.parse_url($source->url, PHP_URL_PATH)).'.txt';
            $fileId = $this->openAi->uploadKnowledgeContent($text, $filename, $vectorStoreId);

            $destination = public_path('assets/chat-knowledge');
            if (!File::isDirectory($destination)) {
                File::makeDirectory($destination, 0755, true);
            }

            $storedName = Str::uuid().'.txt';
            File::put($destination.DIRECTORY_SEPARATOR.$storedName, $text);

            ChatKnowledgeFile::create([
                'original_name' => $source->url,
                'source_url' => $source->url,
                'auto_scraped' => true,
                'openai_file_id' => $fileId,
                'stored_path' => 'assets/chat-knowledge/'.$storedName,
                'status' => 'ready',
                'size_bytes' => strlen($text),
                'uploaded_by' => null,
            ]);

            $source->update([
                'status' => 'ready',
                'error_message' => null,
                'last_scraped_at' => now(),
            ]);

            return true;
        } catch (Throwable $e) {
            $source->update([
                'status' => 'error',
                'error_message' => $e->getMessage(),
                'last_scraped_at' => now(),
            ]);

            return false;
        }
    }

    /**
     * Remove a website source's associated knowledge file (if any) from
     * OpenAI and local storage, then delete the source itself.
     */
    public function remove(ChatWebsiteSource $source): void
    {
        $settings = ChatSetting::current();

        $existing = ChatKnowledgeFile::query()
            ->where('source_url', $source->url)
            ->where('auto_scraped', true)
            ->first();

        if ($existing) {
            $this->openAi->deleteKnowledgeFile($settings->vector_store_id, $existing->openai_file_id);
            if ($existing->stored_path) {
                $oldPath = public_path($existing->stored_path);
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }
            $existing->delete();
        }

        $source->delete();
    }

    private function extractVisibleText(string $html): string
    {
        $blockTags = ['p', 'div', 'li', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'tr', 'br', 'section', 'article'];
        $html = preg_replace('#</('.implode('|', $blockTags).')>#i', "</$1>\n", $html);

        libxml_use_internal_errors(true);
        $dom = new \DOMDocument();
        $dom->loadHTML('<?xml encoding="utf-8" ?>'.$html);
        libxml_clear_errors();

        $xpath = new \DOMXPath($dom);
        foreach ($xpath->query('//script | //style | //nav | //footer | //noscript') as $node) {
            $node->parentNode?->removeChild($node);
        }

        $text = $dom->textContent ?? '';
        $text = preg_replace('/[ \t]+/', ' ', $text);
        $text = preg_replace('/\n\s*\n+/', "\n\n", $text);

        return trim($text);
    }
}
