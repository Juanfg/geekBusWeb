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

	Route::get('rutas/{id}/create', 'RutaController@paradaCreate');
	Route::post('rutas/{id}/create', 'RutaController@paradaStore')->name('rutaparda');

	Route::get('/home',function(){

		return redirect()->route('/');
	});

	Route::resource('autobuses', 'BusController');

	Route::resource('choferes', 'ChoferController');

	Route::resource('rutas', 'RutaController');

	Route::resource('paradas', 'ParadaController');

	Route::resource('admins', 'AdminController');

	Route::get('rondas', 'RondaController');

	Route::get('incidencias', 'IncidenciasController@index')->name('incidencias.index');
	Route::get('incidencias/{id}', 'IncidenciasController@show')->name('incidencias.show');
	Route::delete('incidencias/{id}', 'IncidenciasController@destroy')->name('incidencias.destroy');
	Route::delete('incidencias/{id}/all', 'IncidenciasController@destroyAll')->name('incidencias.destroyAll');

	Route::get('logout', function(){
		Auth::logout();
		return redirect()->route('/');
	})->name('logout');
});

Auth::routes();