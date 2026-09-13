<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chat_website_sources', function (Blueprint $table) {
            $table->id();
            $table->string('url')->unique();
            $table->string('status')->default('pending'); // pending | ready | error
            $table->text('error_message')->nullable();
            $table->timestamp('last_scraped_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chat_website_sources');
    }
};
