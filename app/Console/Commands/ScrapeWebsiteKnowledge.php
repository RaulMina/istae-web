<?php

namespace App\Console\Commands;

use App\Models\ChatSetting;
use App\Models\ChatWebsiteSource;
use App\Services\OpenAiChatService;
use App\Services\WebsiteScraperService;
use Illuminate\Console\Command;

class ScrapeWebsiteKnowledge extends Command
{
    protected $signature = 'chat:scrape-website {--force : Ignorar la frecuencia configurada y actualizar todas ahora}';

    protected $description = 'Descarga las páginas del instituto configuradas y actualiza la base de conocimiento del chat';

    public function handle(WebsiteScraperService $scraper, OpenAiChatService $openAi): int
    {
        $settings = ChatSetting::current();
        $sources = ChatWebsiteSource::all();

        if ($sources->isEmpty()) {
            $this->info('No hay URLs configuradas para monitorear.');
            return self::SUCCESS;
        }

        if (!$openAi->isConfigured()) {
            $this->error('OPENAI_API_KEY no está configurada.');
            return self::FAILURE;
        }

        $force = $this->option('force');
        $due = 0;

        foreach ($sources as $source) {
            $frequency = $source->frequency_hours ?? $settings->scrape_frequency_hours;

            if (!$force && $source->last_scraped_at && $source->last_scraped_at->diffInHours(now()) < $frequency) {
                continue;
            }

            $due++;

            if ($scraper->scrape($source)) {
                $this->info("OK: {$source->url}");
            } else {
                $this->error("Falló {$source->url}: {$source->fresh()->error_message}");
            }
        }

        if ($due === 0) {
            $this->info('Ninguna página necesitaba actualizarse todavía.');
        }

        $settings->update(['last_scraped_at' => now()]);

        return self::SUCCESS;
    }
}
