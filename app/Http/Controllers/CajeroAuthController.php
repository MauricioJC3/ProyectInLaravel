<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CajeroAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.cajero_login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('cajero')->attempt($credentials, $request->remember)) {
            $cajero = Auth::guard('cajero')->user();

            if ($cajero->mypime->status == 'inactivo' || $cajero->status == 'inactivo') {
                Auth::guard('cajero')->logout();
                return redirect()->back()->withErrors(['error' => 'Cuenta inactiva']);
            }

            return redirect()->intended('cajero/dashboard');
        }

        return redirect()->back()->withErrors(['error' => 'Credenciales incorrectas']);
    }
}
