<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('chat_website_sources', function (Blueprint $table) {
            // null = usar la frecuencia global configurada en chat_settings.
            $table->unsignedInteger('frequency_hours')->nullable()->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('chat_website_sources', function (Blueprint $table) {
            $table->dropColumn('frequency_hours');
        });
    }
};
