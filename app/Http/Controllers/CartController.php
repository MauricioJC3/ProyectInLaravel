<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::all();
        return view('carts.index', compact('carts'));
    }

    public function create()
    {
        return view('carts.create');
    }

    public function store(Request $request)
    {
        $cart = Cart::create($request->all());
        return redirect()->route('carts.index');
    }

    public function edit($id)
    {
        $cart = Cart::find($id);
        return view('carts.edit', compact('cart'));
    }

    public function update(Request $request, $id)
    {
        $cart = Cart::find($id);
        $cart->update($request->all());
        return redirect()->route('carts.index');
    }

    public function destroy($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->route('carts.index');
    }
}
