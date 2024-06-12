<?php

namespace App\Http\Controllers\Mypime;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class MyPimeAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.mypime_login');
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email_mypime', 'password');

        if (Auth::guard('mypime')->attempt($credentials, $request->remember)) {
            $mypime = Auth::guard('mypime')->user();

            if ($mypime->status == 'inactivo') {
                Auth::guard('mypime')->logout();
                return redirect()->back()->withErrors(['error' => 'Cuenta inactiva']);
            }

            return redirect()->intended(route('mypime.dashboard'));
        }

        return redirect()->back()->withErrors(['error' => 'Credenciales incorrectas']);
    }
}
