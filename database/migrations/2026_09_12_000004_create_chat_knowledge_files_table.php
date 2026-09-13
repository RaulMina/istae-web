<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chat_knowledge_files', function (Blueprint $table) {
            $table->id();
            $table->string('original_name');
            $table->string('openai_file_id')->nullable();
            $table->string('status')->default('uploading');
            $table->unsignedBigInteger('size_bytes')->nullable();
            $table->integer('uploaded_by')->unsigned()->nullable();
            $table->foreign('uploaded_by')->references('id')->on('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chat_knowledge_files');
    }
};
