<?php

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

Route::get('/ola', function(){
    echo"Olá Mundo";
});

Route::get('/animes', [App\Http\Controllers\AnimesController::class, 'index'])->name('index');
Route::get('/animes/criar', [App\Http\Controllers\AnimesController::class, 'create'])->name('criaranime');
Route::post('/animes/criar', [App\Http\Controllers\AnimesController::class, 'store'])->name('salvaranime');
Route::delete('/animes/{id}', [App\Http\Controllers\AnimesController::class, 'destroy'])->name('removeranime');
Route::get('/animes/{animeId}/temporadas', [App\Http\Controllers\TemporadasController::class, 'index'])->name('indextemporada');