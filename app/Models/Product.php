<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'mypime_nit',
        'nombre_product',
        'price_product',
        'description',
        'status',
        'image'
    ];

    public function mypime()
    {
        return $this->belongsTo(MyPime::class, 'mypime_nit', 'nit_mypime');
    }
}
