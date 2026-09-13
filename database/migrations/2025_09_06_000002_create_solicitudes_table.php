<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->string('nombres_apellidos_estudiante')->nullable();
            $table->string('institu_destino')->nullable();
            $table->string('tutor_academico')->nullable();
            $table->string('carrera')->nullable();
            $table->string('cedula', 20)->nullable()->unique();
            $table->string('proyecto_asigando')->nullable();
            $table->string('codificacion_proyecto')->nullable();
            $table->string('codificacion_programa')->nullable();
            $table->string('numeracion_proyecto')->nullable();
            $table->string('periodo')->nullable();
            $table->string('correo')->nullable()->unique();
            $table->string('celular', 20)->nullable();
            $table->string('codigo_practicas')->nullable();
            $table->string('nombre_programa')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_finalizacion')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('solicitudes');
    }
};
