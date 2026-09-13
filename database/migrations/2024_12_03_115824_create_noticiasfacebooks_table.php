<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('noticiasfacebooks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_facebook',1000);
            $table->string('link_facebook',1000);
            $table->integer('id_users')->unsigned();
            $table->foreign('id_users')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noticiasfacebooks');
    }
};
