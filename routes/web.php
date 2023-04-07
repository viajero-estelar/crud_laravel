<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

/*Realizamos una ruta de contro usando Rout*/

/*
Route::get('/pelicula/create',[PeliculaController::class,'create']); 
*/


Route::resource('pelicula',PeliculaController::class)->middleware('auth');
Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/home', [PeliculaController::class, 'index'])->name('home');

Route::group(['/middleware' => 'auth'],function() {

    Route::get('/', [PeliculaController::class, 'index'])->name('home');
        
    });

