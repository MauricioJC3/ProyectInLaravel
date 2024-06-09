<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\MyPime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('mypime')->get();
        return view('superadmin.products.index', compact('products'));
    }

    public function create()
    {
        $mypimes = MyPime::all();
        return view('superadmin.products.create', compact('mypimes'));
    }



    public function show(Request $request)
    {
        $search = $request->input('search');
        $products = Product::where('nombre_product', 'like', "%{$search}%")->get();
        return view('user.products.index', compact('products'));
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
        return view('superadmin.products.edit', compact('product', 'mypimes'));
    }



        /* ////////////////////////////*/
        // actualizar producto
    /* //////////////////////////// */



    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            Log::error("No se ha podido encontrar el producto con el ID: $id");
            return redirect()->route('products.index')->with('error', 'Producto no encontrado');
        }

        try {
            // Validación de datos de entrada
            $data = $request->validate([
                'nombre_product' => 'required|string|max:255',
                'price_product' => 'required|numeric',
                'description' => 'required|string',
                'status' => 'required|in:disponible,no disponible',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Borra la imagen antigua si existe y guarda la nueva imagen
            if ($request->hasFile('image')) {
                $oldImagePath = public_path('assets/images/' . $product->image);
                if (file_exists($oldImagePath)) {
                    if (!unlink($oldImagePath)) {
                        Log::error("Error al borrar imagen antigua en la ruta: $oldImagePath");
                    }
                }

                $imageName = time() . '.' . $request->image->extension();
                if (!$request->image->move(public_path('assets/images'), $imageName)) {
                    Log::error("Error al mover la imagen cargada a la ruta: assets/images");
                    return redirect()->route('products.index')->with('error', 'Error al mover la imagen cargada');
                }
                $data['image'] = $imageName;
            }

            // Actualiza el producto
            $product->update($data);

            return redirect()->route('products.index')->with('success', 'Producto actualizado con éxito');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Loguear errores de validación específicos
            foreach ($e->errors() as $field => $messages) {
                foreach ($messages as $message) {
                    Log::error("Validation error for $field: $message");
                }
            }
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error("Se ha producido un error inesperado: " . $e->getMessage());
            return redirect()->route('products.index')->with('error', 'Ocurrió un error inesperado');
        }
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
