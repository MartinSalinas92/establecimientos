<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;

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


//Pagina de Inicio
Route::get('/', InicioController::class)->name('inicio');

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function () {

Route::get('/establecimientos/create', [App\Http\Controllers\EstablecimientoController::class,'create'])->name('establecimientos.crear');
Route::get('/establecimientos/{establecimiento}/edit', [App\Http\Controllers\EstablecimientoController::class,'edit'])->name('establecimientos.edit');
Route::post('/establecimientos', [App\Http\Controllers\EstablecimientoController::class,'store'])->name('establecimientos.store');
//subir imagen
Route::post('/establecimientos/imagenes', [App\Http\Controllers\ImagenController::class,'store'])->name('establecimientos.imagen');
//Eliminar imagen
Route::post('/eliminarImagen/destroy', [App\Http\Controllers\ImagenController::class,'destroy'])->name('eliminar.imagen');
});


