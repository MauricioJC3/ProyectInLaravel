<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\MyPime;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('mypime')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $mypimes = MyPime::all();
        return view('products.create', compact('mypimes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'mypime_nit' => 'required|string|exists:mypimes,nit_mypime',
            'nombre_product' => 'required|string|max:255',
            'price_product' => 'required|numeric',
            'description' => 'required|string',
            'status' => 'required|in:disponible,no disponible',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/images'), $imageName);
            $data['image'] = $imageName;
        }

        Product::create($data);

        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $mypimes = MyPime::all();
        return view('products.edit', compact('product', 'mypimes'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}