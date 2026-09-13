<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticiasfacebook extends Model
{
    use HasFactory;
    protected $fillable = [
        'link_facebook',
        'name_facebook',
        'id_users',
        
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
}
