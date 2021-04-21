<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NinoController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PlatoController;
use App\Http\Controllers\IngredienteController;
use App\Http\Controllers\PagadorController;
use App\Http\Controllers\CuotaMensualController;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

/*Route::get('/niño', function () {
    return view('niño.index');
});

Route::get('/niño/create', [NinoController::class, 'create'] );
*/

Route::resource('nino', NinoController::class)->middleware('auth');
Route::resource('persona', PersonaController::class)->middleware('auth');
Route::resource('menu', MenuController::class)->middleware('auth');
Route::resource('plato', PlatoController::class)->middleware('auth');
Route::resource('ingrediente', IngredienteController::class)->middleware('auth');
Route::resource('pagador', PagadorController::class)->middleware('auth');
Route::resource('cuota_mensual', CuotaMensualController::class)->middleware('auth');

Auth::routes();
//poner esto dentro del parentesis de route al terminar todos los crud
// ['register'=> false, 'reset'=>false]

Route::get('/home', [NinoController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'],function () {

    Route::get('/home', [NinoController::class, 'index'])->name('home');
    
});