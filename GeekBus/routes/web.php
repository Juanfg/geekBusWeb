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


Route::group(['middleware'=>'auth'], function(){

	Route::get('/', 'HomeController@dashboard')->name('/');

	Route::get('/home',function(){

		return redirect()->route('/');
	});

	Route::resource('autobuses', 'BusController');

	Route::resource('choferes', 'ChoferController');

	Route::resource('rutas', 'RutaController');

	Route::resource('paradas', 'ParadaController');

	Route::get('rondas', 'RondaController');

	Route::get('logout', function(){
		Auth::logout();
		return redirect()->route('/');
	})->name('logout');
});


Auth::routes();

Route::get('test',function(){
	return view('paradas.index');
});

