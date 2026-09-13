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
        Schema::create('normativas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('categoria',1000);
            $table->string('detalle',1000);
            $table->string('link_normativa',1000);
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
        Schema::dropIfExists('normativas');
    }
};
