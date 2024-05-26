<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function registrarse()
    {
        return view('auth.registro');
    }

    public function registration_post(Request $request)
    {
       //dd($request->all());

       $user = request()->validate([
        'name' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required|min:6',
        'confirm_password' => 'required_with:password|same:password|min:6',
        'is_role' => 'required'

       ]);

       $user                  = new User();

       $user->name            = trim($request->name);
       $user->email           = trim($request->email);
       $user->password        = Hash::make($request->password);
       $user->is_role         = trim($request->is_role);
       $user->remember_token  = Str::random(50);
       $user->save();

       return redirect('login')->with('success', 'registration finish');

    }

    public function login()
    {
      return view('auth.login');
    }



    public function forgot()
    {
        return view('auth.forgot');
    }




    public function login_post(Request $request)
    {
      //dd($request->all());
      if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true))
      {
          if (Auth::User()->is_role == '2')
          {
            //echo "Super Admin"; die();
            return redirect()->intended('superadmin/dashboard');
          }
          else if (Auth::User()->is_role == '1')
          {
            //echo "Admin"; die();
            return redirect()->intended('admin/dashboard');
          }
          else if (Auth::User()->is_role == '0')
          {
            //echo "user"; die();
            return redirect()->intended('user/dashboard');
          }
          else
          {
            return redirect('login')->with('error', 'No tienes permisos..');
          }

      }else {
        return redirect()->back()->with('error', 'Por favor verifique sus datos');
      }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url('login'));
    }

}