<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function dashboard()
    {
      if(Auth::user()->is_role == 2)
      {
        $data['getRecord'] = User::find(Auth::user()->id);
          return view('superadmin.dashboard', $data);
      }
      else if (Auth::user()->is_role == 1)
      {
          return view('admin.dashboard');
      }
      else 
      {
          
      }

    }
}
