<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class MyPime extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'mypimes'; // Explicitly define the table name

    protected $fillable = [
        'nit_mypime',
        'name_mypime',
        'photo',
        'address_mypime',
        'phone_mypime',
        'email_mypime',
        'username',
        'password',
        'status'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'mypime_nit', 'nit_mypime');
    }
}
