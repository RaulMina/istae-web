<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('chat_settings', function (Blueprint $table) {
            // Cifrada con APP_KEY (cast "encrypted" en ChatSetting); un texto cifrado no cabe en un string(255).
            $table->text('openai_api_key')->nullable()->after('vector_store_id');
            $table->string('openai_model')->nullable()->after('openai_api_key');
        });
    }

    public function down(): void
    {
        Schema::table('chat_settings', function (Blueprint $table) {
            $table->dropColumn(['openai_api_key', 'openai_model']);
        });
    }
};
