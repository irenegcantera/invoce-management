<?php

use App\Http\Controllers\FacturaController;
use App\Http\Controllers\LineaController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\FamiliaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RecoveryPasswordController;
use App\Http\Controllers\RegisterController;
use App\Models\Familia;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('auth')->name('home');

// Route::post('/facturas/{factura}/{cliente}',[FacturaController::class,'update'])->middleware('auth')->name('facturas.update');
Route::resource('facturas',FacturaController::class)->middleware('auth');

Route::resource('lineas',LineaController::class)->middleware('auth');
Route::post('ajax/productos',[AjaxController::class,'producto'])->middleware('auth')->name('ajax.producto');
Route::post('ajax/clientes',[AjaxController::class,'cliente'])->middleware('auth')->name('ajax.cliente');

//RUTAS PRODUCTOS, FAMILIAS, CLIENTES
Route::resource('productos',ProductoController::class)->middleware('auth');
Route::resource('familias',FamiliaController::class)->middleware('auth');
Route::resource('clientes',ClienteController::class)->middleware('auth');

//RUTAS LOGIN
Route::get('/login',[LoginController::class,'create'])->name('login.create');
Route::post('/login',[LoginController::class,'store'])->name('login.store');
Route::get('/logout',[LoginController::class,'destroy'])->name('login.destroy');

//RUTAS REGISTER 
Route::get('/register',[RegisterController::class,'create'])->name('register.create');
Route::post('/register',[RegisterController::class,'store'])->name('register.store');

//VERIFICACIÓN REGISTRO
Route::get('/register/verify/{code}',[RegisterController::class,'verify'])->name('register.verify');

//RECUPERACIÓN CONTRASEÑAS
// Route::get('/recovery',[RecoveryPasswordController::class,'index'])->name('recovery.index');
// Route::post('/recovery',[RecoveryPasswordController::class,'sendToken'])->name('recovery.sendToken');
// Route::get('/recovery/{token}',[RecoveryPasswordController::class,'create'])->name('recovery.create');