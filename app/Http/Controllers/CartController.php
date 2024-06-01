<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->get();
        return view('user.cart.index', compact('cartItems'));
    }

    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        $cartItem = Cart::updateOrCreate(
            ['user_id' => Auth::id(), 'product_id' => $product->id],
            [
                'name_products' => $product->nombre_product,
                'price_product' => $product->price_product,
                'quantity' => $request->quantity ?? 1,
                'image' => $product->image
            ]
        );

        return redirect()->route('user.cart.index');
    }

    public function update(Request $request, Cart $cart)
    {
        $cart->update(['quantity' => $request->quantity]);
        return redirect()->route('user.cart.index');
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('user.cart.index');
    }

    public function checkout()
    {
        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->get();
        return view('user.cart.checkout', compact('cartItems'));
    }

    public function placeOrder(Request $request)
    {
        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->get();

        $order = Order::create([
            'user_id' => $userId,
            'name_user' => $request->input('name_user', 'N/A'),
            'number_user' => $request->input('number_user', 'N/A'),
            'email_user' => $request->input('email_user', 'N/A'),
            'method' => $request->input('method', 'N/A'),
            'address_user' => $request->input('address_user', 'N/A'),
            'total_products' => $cartItems->sum('quantity'),
            'total_price' => $cartItems->sum(function($cartItem) {
                return $cartItem->price_product * $cartItem->quantity;
            }),
            'status' => 'pendiente'
        ]);

        foreach ($cartItems as $cartItem) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'unit_price' => $cartItem->price_product,
                'quantity' => $cartItem->quantity
            ]);
        }

        Cart::where('user_id', $userId)->delete();

        return redirect()->route('user.orders.index');
    }
}
