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




        /* ////////////////////////////*/
        // crear producto
    /* //////////////////////////// */


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



        /* ////////////////////////////*/
        // actualizar producto
    /* //////////////////////////// */



    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        // Borra la imagen antigua si existe
        if ($request->hasFile('image')) {
            $oldImagePath = public_path('assets/images/' . $product->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Guarda la nueva imagen
            $data = $request->validate([
                'nombre_product' => 'required|string|max:255',
                'price_product' => 'required|numeric',
                'description' => 'required|string',
                'status' => 'required|in:disponible,no disponible',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/images'), $imageName);
            $data['image'] = $imageName;
        } else {
            // Si no se proporciona una nueva imagen, solo actualiza los otros datos
            $data = $request->validate([
                'nombre_product' => 'required|string|max:255',
                'price_product' => 'required|numeric',
                'description' => 'required|string',
                'status' => 'required|in:disponible,no disponible',
            ]);
        }

        $product->update($data);

        return redirect()->route('products.index');
    }



        /* ////////////////////////////*/
        // borrar producto
    /* //////////////////////////// */


    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}
