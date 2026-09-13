<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Normativa extends Model
{
    use HasFactory;
    protected $fillable = [
        'categoria',
        'detalle',
        'link_normativa',
        'id_users',
        
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
}
