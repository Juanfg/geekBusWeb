<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'api'], function () {

    Route::get('rutas', 'ApiController@getRutas');

    Route::get('rutas/{id}', 'ApiController@getInfoRuta');

	Route::get('paradas', 'ApiController@getParadas');

    Route::get('paradas/{id}/rutas', 'ApiController@getParadaRutas');

	Route::get('paradas_rutas/', 'ApiController@getParadasRutasCercanas');
});