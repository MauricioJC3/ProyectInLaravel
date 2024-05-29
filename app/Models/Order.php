<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name_user', 'number_user', 'email_user', 'method', 'address_user', 'total_products', 'total_price', 'status'
    ];
}
