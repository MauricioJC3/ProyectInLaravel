<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MyPime;

class MyPimeController extends Controller
{
    public function index()
    {
        $mypimes = MyPime::all();
        return view('mypimes.index', compact('mypimes'));
    }

    public function create()
    {
        return view('mypimes.create');
    }

    public function edit($id)
    {
        $mypime = MyPime::find($id);
        return view('mypimes.edit', compact('mypime'));
    }




        /* ////////////////////////////*/
        // Actualizar mypime
    /* //////////////////////////// */



    public function update(Request $request, $id)
    {
        $mypime = MyPime::find($id);

        // Borra la imagen antigua si existe
        if ($request->hasFile('photo')) {
            $oldImagePath = public_path('assets/imagenes_microempresas/' . $mypime->photo);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Guarda la nueva imagen
            $data = $request->validate([
                'name_mypime' => 'required',
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'address_mypime' => 'required',
                'phone_mypime' => 'required',
                'email_mypime' => 'required|email',
            ]);

            $imageName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('assets/imagenes_microempresas'), $imageName);
            $data['photo'] = $imageName;
        } else {
            // Si no se proporciona una nueva imagen, solo actualiza los otros datos
            $data = $request->validate([
                'name_mypime' => 'required',
                'address_mypime' => 'required',
                'phone_mypime' => 'required',
                'email_mypime' => 'required|email',
            ]);
        }

        $mypime->update($data);

        return redirect()->route('mypimes.index');
    }



        /* ////////////////////////////*/
        // eliminar
    /* //////////////////////////// */

    public function destroy($id)
    {
        $mypime = MyPime::find($id);
        $mypime->delete();
        return redirect()->route('mypimes.index');
    }




        /* ////////////////////////////*/
        // activar y desactivar mypime
    /* //////////////////////////// */

    public function toggleStatus($id)
    {
        $mypime = MyPime::find($id);
        $mypime->status = $mypime->status == 'activo' ? 'inactivo' : 'activo';
        $mypime->save();
        return redirect()->route('mypimes.index');
    }




        /* ////////////////////////////*/
        // crear mypime
    /* //////////////////////////// */



    public function store(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'nit_mypime' => 'required|string|max:255',
            'name_mypime' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address_mypime' => 'required|string|max:255',
            'phone_mypime' => 'required|string|max:255',
            'email_mypime' => 'required|email|max:255',
            'username' => 'required|string|unique:mypimes,username|max:255',
            'password' => 'required|string|max:255',
        ]);

        // Save the image in the public\assets\imagenes_microempresas folder
        $imageName = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('assets/imagenes_microempresas'), $imageName);

        // Add the photo path to the data array
        $data['photo'] = $imageName;

        // Encrypt the password before saving
        $data['password'] = bcrypt($data['password']);

        // Create the MyPime record
        MyPime::create($data);

        // Redirect to the index page
        return redirect()->route('mypimes.index');
    }
}
