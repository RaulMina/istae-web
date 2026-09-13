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
        'scrape_frequency_hours',
        'history_message_limit',
        'last_scraped_at',
        'is_enabled',
    ];

    protected $casts = [
        'is_enabled' => 'boolean',
        'last_scraped_at' => 'datetime',
    ];

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
