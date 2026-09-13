<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infoistae extends Model
{
    use HasFactory;
    protected $fillable = [
        'categoria',
        'nombre',
        'detalle',
        'link_normativa',
        'id_users',
        
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
}
