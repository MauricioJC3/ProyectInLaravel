<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPasswordMail;
use App\Http\Requests\ResetPassword;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{


        /* ////////////////////////////*/
        // Registrarse
    /* //////////////////////////// */



    public function registrarse()
    {
        return view('auth.registro');
    }

    public function registration_post(Request $request)
    {
       //dd($request->all());

         // Configurar las reglas de validación
         $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'confirm_password' => 'required_with:password|same:password|min:6',
            'is_role' => 'required|integer'
        ]);

          // Verificar si la validación falla
          if ($validator->fails()) {
            // Loguear errores específicos de validación
            foreach ($validator->errors()->all() as $error) {
                Log::error('Validation error: ' . $error);
            }

            // Retornar con errores
            return redirect()->back()->withErrors($validator)->withInput();
        }

       $user                  = new User();

       $user->name            = trim($request->name);
       $user->email           = trim($request->email);
       $user->password        = Hash::make($request->password);
       $user->is_role         = trim($request->is_role);
       $user->remember_token  = Str::random(50);
       $user->save();

       return redirect('login')->with('success', 'Registro Finalizado con Éxito');

    }

    public function login()
    {
      return view('auth.login');
    }




    /* ////////////////////////////*/
        // Iniciar Sesión
    /* //////////////////////////// */



    public function login_post(Request $request)
    {

            // Validación de datos de entrada
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    $user = \App\Models\User::where('email', $request->email)->first();
    if (!$user) {
        Log::error('Intento de inicio de sesión fallido: Correo electrónico no encontrado ');
        return redirect()->back()->with('error', 'El correo electrónico no está registrado');
    }


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
        Log::error('Login attempt failed for email ');
        return redirect()->back()->with('error', 'Por favor verifique sus datos');
      }
    }




    /* ////////////////////////////*/
        // Recuperar contraseña
    /* //////////////////////////// */

    public function forgot()
{
    return view('auth.forgot');
}



public function forgot_post(Request $request)
{

        // Validación de datos de entrada
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);


    $user = User::where('email', $request->email)->first();
    if ($user) {
        //$user->remember_token = Str::random(60);
        $user->save();

        Mail::to($user->email)->send(new ForgotPasswordMail($user));

        return redirect()->back()->with('success', 'Revise su correo electrónico para restablecer la contraseña');
    } else {
        Log::error('Forgot password attempt failed for email: ' . $request->email);
        return redirect()->back()->with('error', 'El correo utilizado no está registrado en el sistema');
    }
}



public function getReset($token)
{
    $user = User::where('remember_token', $token)->first();
    if (!$user) {
        abort(403);
    }

    return view('auth.reset', ['token' => $token]);
}

public function postReset($token, ResetPassword $request)
    {

            // Validación de datos de entrada
    $request->validate([
        'password' => 'required|min:6|confirmed',
    ]);


        $user = User::where('remember_token', '=', $token);

        if ($user->count() == 0) {
            Log::error('Invalid token provided for password reset.');
            abort(403);
        }
        $user = $user->first();

        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(50);
        $user->save();

        return redirect('login')->with('success', 'Contraseña restablecida');
    }



    public function logout()
    {
        Auth::logout();
        return redirect(url('login'));
    }

}
