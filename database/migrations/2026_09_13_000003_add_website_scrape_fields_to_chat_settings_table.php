<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('chat_settings', function (Blueprint $table) {
            $table->text('website_urls')->nullable()->after('vector_store_id');
            $table->unsignedInteger('scrape_frequency_hours')->default(24)->after('website_urls');
            $table->timestamp('last_scraped_at')->nullable()->after('scrape_frequency_hours');
        });
    }

    public function down(): void
    {
        Schema::table('chat_settings', function (Blueprint $table) {
            $table->dropColumn(['website_urls', 'scrape_frequency_hours', 'last_scraped_at']);
        });
    }
};
