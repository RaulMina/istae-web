<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_py',
        'detalle_py',
        'link_py',
        'id_users',
        'tipo_trabajo',
        'img_autor',
        
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
}
