<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('chat_knowledge_files', function (Blueprint $table) {
            $table->string('stored_path')->nullable()->after('openai_file_id');
        });
    }

    public function down(): void
    {
        Schema::table('chat_knowledge_files', function (Blueprint $table) {
            $table->dropColumn('stored_path');
        });
    }
};
