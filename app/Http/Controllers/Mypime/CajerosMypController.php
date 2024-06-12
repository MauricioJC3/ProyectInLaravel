<?php

namespace App\Http\Controllers\Mypime;

use App\Http\Controllers\Controller;
use App\Models\Cajero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CajerosMypController extends Controller
{
    public function index()
    {
        $mypime_nit = Auth::guard('mypime')->user()->nit_mypime;
        $cajero = Cajero::where('nit_mypime', $mypime_nit)->get();
        return view('Mypime.Cajero.index', compact('cajero'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:cajeros',
            'username' => 'required|string|max:255|unique:cajeros',
            'password' => 'required|string|min:8|confirmed',
            'status' => 'required|in:activo,inactivo',
        ]);

        $data['nit_mypime'] = Auth::guard('mypime')->user()->nit_mypime;

        Cajero::create($data);

        return redirect()->route('Mypime.Cajero.index');
    }

    public function edit($id)
    {
        $cajero = Cajero::where('id', $id)->where('nit_mypime', Auth::guard('mypime')->user()->nit_mypime)->firstOrFail();
        return view('cajeros.edit', compact('cajero'));
    }

    public function update(Request $request, $id)
    {
        $cajero = Cajero::where('id', $id)->where('nit_mypime', Auth::guard('mypime')->user()->nit_mypime)->firstOrFail();

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:cajeros,email,' . $cajero->id,
            'username' => 'required|string|max:255|unique:cajeros,username,' . $cajero->id,
            'status' => 'required|in:activo,inactivo',
        ]);

        $cajero->update($data);

        return redirect()->route('Mypime.Cajero.index');
    }

    public function destroy($id)
    {
        $cajero = Cajero::where('id', $id)->where('nit_mypime', Auth::guard('mypime')->user()->nit_mypime)->firstOrFail();
        $cajero->delete();

        return redirect()->route('Mypime.Cajero.index');
    }
}
