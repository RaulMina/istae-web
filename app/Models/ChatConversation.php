<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatConversation extends Model
{
    protected $fillable = [
        'session_uuid',
        'openai_last_response_id',
        'ip_address',
    ];

    public function messages()
    {
        return $this->hasMany(ChatMessage::class);
    }
}
