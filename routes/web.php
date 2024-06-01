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
  Route::middleware('auth')->prefix('user')->name('user.')->group(function () {
    route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/products', [ProductController::class, 'show'])->name('products.index');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/{cart}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');  // Nueva ruta para el formulario de checkout
    Route::post('/cart/placeOrder', [CartController::class, 'placeOrder'])->name('cart.placeOrder'); // Nueva ruta para procesar la orden

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
});










//cerrar sesión
route::get('logout', [AuthController::class, 'logout']);
