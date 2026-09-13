<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;
    protected $fillable = [
        'firstname_lastname',
        'mail',
        'password',
        'user',
        'id_roles',
        'dni',
        'img',
        'state',
        'cargo',
       'detalle',
    ];

    public function Role()
    {
        return $this->belongsTo(Role::class, 'id_roles');
    }
}
