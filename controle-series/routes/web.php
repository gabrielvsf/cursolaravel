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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/series', function(){
    echo"Olá Mundo";
});

Route::get('/animes', function () {
    $animes=[
        'Code Geass',
        'Fullmetal Alchemist',
        'Steins Gate'
    ];
    $html = "<ul>";
        foreach($animes as $anime){
            $html .="<li>$anime</li>";
        }
    $html .= "</ul>";
        return $html;
});