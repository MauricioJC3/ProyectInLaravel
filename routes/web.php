<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MyPimeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\Author;

Route::get('/',[HomeController::class,'index']);

// Registrarse
Route::get('/registro', [AuthController::class, 'registrarse']);
route::post('/registration_post',[AuthController::class,'registration_post']);


// Iniciar sesión
route::get('login', [AuthController::class, 'login']);
route::post('login_post', [AuthController::class, 'login_post']);


// Recuperar contraseña
Route::get('forgot', [AuthController::class, 'forgot'])->name('password.request');
Route::post('forgot_post', [AuthController::class, 'forgot_post'])->name('password.email');
Route::get('reset/{token}', [AuthController::class, 'getReset'])->name('password.reset');
Route::post('reset_post/{token}', [AuthController::class, 'postReset'])->name('password.update');




//superadmin
route::group(['middleware' => 'superadmin'], function(){
    route::get('superadmin/dashboard', [DashboardController::class, 'dashboard']);

    Route::resource('mypimes', MyPimeController::class);
    Route::post('mypimes/{mypime}/toggle-status', [MyPimeController::class, 'toggleStatus'])->name('mypimes.toggleStatus');

    Route::resource('products', ProductController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('carts', CartController::class);
    Route::resource('messages', MessageController::class);
});


//admin
Route::group(['middleware' => 'admin'], function(){
  route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

});


//usuarios
Route::group(['middleware' => 'user'], function(){
    route::get('user/dashboard', [DashboardController::class, 'dashboard']);

  });


//cerrar sesion
route::get('logout', [AuthController::class, 'logout']);
