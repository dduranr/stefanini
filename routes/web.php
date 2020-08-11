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

// Aquí declaro las rutas (Laravel tiene la opción de generarlas todas de una vez, utilizando el método resource de la clase Route, así sólo utilizamos una sola línea)
Route::resource('usuarios', 'UsuariosController');
