<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Cajero extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'cajeros';

    protected $fillable = [
        'nit_mypime',
        'name',
        'email',
        'username',
        'password',
        'status'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function mypime()
    {
        return $this->belongsTo(MyPime::class, 'nit_mypime', 'nit_mypime');
    }
}
