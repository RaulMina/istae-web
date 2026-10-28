<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatSetting extends Model
{
    protected $fillable = [
        'bot_name',
        'tooltip_text',
        'icon_path',
        'system_prompt',
        'vector_store_id',
        'openai_api_key',
        'openai_model',
        'scrape_frequency_hours',
        'history_message_limit',
        'last_scraped_at',
        'is_enabled',
    ];

    /**
     * La API key nunca debe serializarse (toArray/toJson/@json) hacia el cliente.
     */
    protected $hidden = [
        'openai_api_key',
    ];

    protected $casts = [
        'is_enabled' => 'boolean',
        'last_scraped_at' => 'datetime',
        'openai_api_key' => 'encrypted',
    ];

    /**
     * API key efectiva: la guardada desde el panel tiene prioridad sobre OPENAI_API_KEY del .env.
     */
    public function effectiveApiKey(): string
    {
        return (string) ($this->openai_api_key ?: config('services.openai.api_key'));
    }

    /**
     * Modelo efectivo: el elegido en el panel tiene prioridad sobre OPENAI_MODEL del .env.
     */
    public function effectiveModel(): string
    {
        return (string) ($this->openai_model ?: config('services.openai.model', 'gpt-4o-mini'));
    }

    /**
     * De dónde sale la API key efectiva: 'panel', 'env' o null si no hay ninguna.
     */
    public function apiKeySource(): ?string
    {
        if ($this->openai_api_key) {
            return 'panel';
        }

        return config('services.openai.api_key') ? 'env' : null;
    }

    /**
     * Versión ofuscada de la API key efectiva para mostrar en el panel; la key completa nunca sale del servidor.
     * Ej.: "sk-proj-…a1B2". Las keys cortas solo muestran los últimos 4 caracteres.
     */
    public function maskedApiKey(): ?string
    {
        $key = $this->effectiveApiKey();
        if ($key === '') {
            return null;
        }

        $last = substr($key, -4);
        if (strlen($key) < 20) {
            return '…'.$last;
        }

        $prefix = str_starts_with($key, 'sk-proj-') ? 'sk-proj-' : substr($key, 0, 3);

        return $prefix.'…'.$last;
    }

    /**
     * Modelos seleccionables en el panel. Incluye el modelo efectivo actual aunque no esté en la lista,
     * para no perderlo al guardar si se configuró a mano en el .env.
     */
    public function modelOptions(): array
    {
        $options = (array) config('services.openai.models', []);
        $current = $this->effectiveModel();
        if ($current !== '' && !array_key_exists($current, $options)) {
            $options[$current] = $current.' (configurado en .env)';
        }

        return $options;
    }

    public static function current(): self
    {
        return static::query()->firstOrCreate([], [
            'bot_name' => 'ISTABot',
            'tooltip_text' => '¿Tienes una pregunta? ¡Chatea con nosotros!',
            'system_prompt' => 'Eres ISTABot, el asistente virtual del Instituto Superior Tecnológico Alberto Enríquez (ISTAE). '
                .'Ayudas a estudiantes y visitantes con preguntas sobre carreras, admisión, trámites, normativas y servicios del instituto. '
                .'Responde en español, de forma breve y clara. Si no encuentras la información en la base de conocimiento, indícalo '
                .'y sugiere contactar a secretaría general. '
                .'Cuando el estudiante pida un documento o plantilla que exista en la base de conocimiento, menciona el nombre exacto '
                .'del archivo en tu respuesta (el sistema añadirá automáticamente el enlace real de descarga); nunca inventes ni escribas '
                .'tú mismo un enlace o ruta de descarga (por ejemplo, nunca uses "sandbox:", "/mnt/data/" ni URLs inventadas).',
            'is_enabled' => true,
        ]);
    }
}
