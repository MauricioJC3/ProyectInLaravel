<?php

namespace App\Http\Controllers\Mypime;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductosMypController extends Controller
{
    public function index()
    {
        $mypime_nit = Auth::guard('mypime')->user()->nit_mypime;
        $products = Product::where('mypime_nit', $mypime_nit)->get();
        return view('Mypime.products.index', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre_product' => 'required|string|max:255',
            'price_product' => 'required|numeric',
            'description' => 'required|string',
            'status' => 'required|in:disponible,no disponible',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data['mypime_nit'] = Auth::guard('mypime')->user()->nit_mypime;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/images'), $imageName);
            $data['image'] = $imageName;
        }

        Product::create($data);

        return redirect()->route('Mypime.products.index');
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->where('mypime_nit', Auth::guard('mypime')->user()->nit_mypime)->firstOrFail();
        return view('products.edit', compact('products'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::where('id', $id)->where('mypime_nit', Auth::guard('mypime')->user()->nit_mypime)->firstOrFail();

        $data = $request->validate([
            'nombre_product' => 'required|string|max:255',
            'price_product' => 'required|numeric',
            'description' => 'required|string',
            'status' => 'required|in:disponible,no disponible',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                unlink(public_path('assets/images/' . $product->image));
            }
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/images'), $imageName);
            $data['image'] = $imageName;
        }

        $product->update($data);

        return redirect()->route('Mypime.products.index');
    }

    public function destroy($id)
    {
        $product = Product::where('id', $id)->where('mypime_nit', Auth::guard('mypime')->user()->nit_mypime)->firstOrFail();
        if ($product->image) {
            unlink(public_path('assets/images/' . $product->image));
        }
        $product->delete();

        return redirect()->route('Mypime.products.index');
    }
}
