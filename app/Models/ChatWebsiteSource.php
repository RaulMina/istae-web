<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatWebsiteSource extends Model
{
    protected $fillable = [
        'url',
        'status',
        'frequency_hours',
        'error_message',
        'last_scraped_at',
    ];

    protected $casts = [
        'last_scraped_at' => 'datetime',
    ];
}
