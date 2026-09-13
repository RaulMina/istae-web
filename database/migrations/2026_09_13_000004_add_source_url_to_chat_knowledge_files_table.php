<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('chat_knowledge_files', function (Blueprint $table) {
            $table->string('source_url')->nullable()->after('original_name');
            $table->boolean('auto_scraped')->default(false)->after('source_url');
        });
    }

    public function down(): void
    {
        Schema::table('chat_knowledge_files', function (Blueprint $table) {
            $table->dropColumn(['source_url', 'auto_scraped']);
        });
    }
};
