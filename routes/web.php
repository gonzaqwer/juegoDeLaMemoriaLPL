<?php

use App\Http\Controllers\EstadisticasController;
use App\Http\Controllers\JuegoController;
use App\Http\Controllers\PlayController;
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
    return view('juego');
})->middleware(['auth'])->name('dashboard');

// Route::get('/', [PlayController::class, 'index']);
// Route::resource('/mejores', JuegoController::class);

// Route::group(['prefix'=>'inicio'], function(){
//     Route::resource('/play', PlayController::class);
// });

Route::get('/registro', function () {
    return view('auth.register');
})->name('creaCuenta');

Route::resource('/estadisticas', EstadisticasController::class);
// Route::get('/estadisticas', function () {
//     return view('estadisticas');
// })->name('estadisticas');

// Route::get('/juegoMemoria', function () {
//     return view('juegoMemoria');
// })->name('juegoMemoria');

Route::get('juegoMemoria', [PlayController::class, 'index'])->name('juegoMemoria');

Route::resource('/play', PlayController::class);


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
