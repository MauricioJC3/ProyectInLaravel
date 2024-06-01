<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $orders = Order::where('user_id', $userId)->get();
        return view('user.orders.index', compact('orders'));
    }
}
