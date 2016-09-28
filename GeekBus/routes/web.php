<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Login
Route::get('/', 'HomeController@login');

Route::get('dashboard', 'HomeController@dashboard');

Route::resource('autobuses', 'BusController');

Route::resource('choferes', 'ChoferController');

Route::resource('rutas', 'RutaController');

Route::resource('paradas', 'ParadaController');

Route::get('rondas', 'HomeController@rondas');

Auth::routes();