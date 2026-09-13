<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatKnowledgeFile extends Model
{
    protected $fillable = [
        'original_name',
        'source_url',
        'auto_scraped',
        'openai_file_id',
        'stored_path',
        'status',
        'size_bytes',
        'uploaded_by',
    ];

    protected $casts = [
        'auto_scraped' => 'boolean',
    ];

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}
