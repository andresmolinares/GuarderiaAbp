<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NinoController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PlatoController;
use App\Http\Controllers\IngredienteController;
use App\Http\Controllers\PagadorController;
use App\Http\Controllers\CuotaMensualController;
use App\Http\Controllers\Controller;
use App\Models\Ingrediente;
use App\Models\Nino;
use App\Models\Plato;
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

Auth::routes(['reset'=>false]);
//poner esto dentro del parentesis de route al terminar todos los crud
// ['register'=> false, 'reset'=>false]

//Rutas para reportes PDF
Route::get('reporte_bajas', [NinoController::class, 'reporte_bajas'])->middleware('auth');
Route::get('reporte_mensualidad', [NinoController::class, 'reporte_mensualidad'])->middleware('auth');
Route::get('reporte_menus_favoritos', [NinoController::class, 'reporte_menus_favoritos'])->middleware('auth');
Route::get('reporte_alergicos', [IngredienteController::class, 'reporte_alergicos'])->middleware('auth');
Route::get('reporte_platos', [PlatoController::class, 'reporte_platos'])->middleware('auth');

//Fin rutas para reportes PDF
Route::get('/home', [NinoController::class, 'index'])->name('home');
Route::get('bajas', [Nino::class, 'bajas'])->middleware('auth');
Route::get('alergicos', [Ingrediente::class, 'alergicos'])->middleware('auth');
Route::get('total_mensualidad', [Nino::class, 'total_mensualidad'])->middleware('auth');
Route::get('menu_favorito', [Nino::class, 'menu_favorito'])->middleware('auth');
Route::get('cantidad_platos', [Plato::class, 'cantidad_platos'])->middleware('auth');
Route::group(['middleware'=>'auth'],function () {

    Route::get('/home', [NinoController::class, 'index'])->name('home');
    
});
