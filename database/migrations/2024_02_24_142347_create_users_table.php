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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('firstname_lastname');
            $table->string('mail')->unique();
            $table->string('password');
            $table->string('user');
            $table->string('state');
            $table->string('dni')->unique()->nullable();
            $table->string('img')->nullable();
            $table->string('cargo')->nullable();
            $table->string('detalle')->nullable();
            $table->integer('id_roles')->unsigned();
            $table->foreign('id_roles')->references('id')->on('roles');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
