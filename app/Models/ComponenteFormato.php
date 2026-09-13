<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComponenteFormato extends Model
{
    protected $table = 'componentes_formatos';
    
    protected $fillable = [
        'tipos_campos',
        'campos'
    ];

    // protected $casts = [
    //     'campos' => 'array'
    // ];
}
