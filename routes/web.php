<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\Author;

Route::get('/',[HomeController::class,'index']);

// Registrarse
Route::get('/registro', [AuthController::class, 'registrarse']);
route::post('/registration_post',[AuthController::class,'registration_post']);


// Iniciar sesión
route::get('login', [AuthController::class, 'login']);
route::post('login_post', [AuthController::class, 'login_post']);

//superadmin
route::group(['middleware' => 'superadmin'], function(){
    route::get('superadmin/dashboard', [DashboardController::class, 'dashboard']);


});


//admin
Route::group(['middleware' => 'admin'], function(){
  route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

});


//cerrar sesion
route::get('logout', [AuthController::class, 'logout']);