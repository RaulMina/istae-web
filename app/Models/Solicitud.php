<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitudes';
    
    protected $fillable = [
        'nombres_apellidos_estudiante',
        'institu_destino',
        'tutor_academico',
        'carrera',
        'cedula',
        'proyecto_asigando',
        'codificacion_proyecto',
        'codificacion_programa',
        'numeracion_proyecto',
        'periodo',
        'correo',
        'celular',
        'codigo_practicas',
        'nombre_programa',
        'fecha_inicio',
        'fecha_finalizacion',
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_finalizacion' => 'date',
    ];
} 