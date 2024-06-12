<?php

namespace App\Http\Controllers\Mypime;

use App\Http\Controllers\Controller;
use App\Models\MyPime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardMypController extends Controller
{
    public function dashboard()
    {
        $data['getRecord'] = MyPime::find(Auth::user()->id); // traer datos del mypime
        return view('mypime.dashboard', $data);
    }

}
