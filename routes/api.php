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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('equipos','EquipoController');
Route::resource('images','ImagenController');
Route::post('guardarimagen/{id}','EquipoController@guardarimagen');
Route::post('guardarimagenupdate/{id}','EquipoController@guardarimagenupdate');
Route::resource('jugadores','JugadorController');
Route::post('guardarimagenjugador/{id}','JugadorController@guardarimagenjugador');
Route::resource('arbitrajes','ArbitrajeController');
Route::resource('tamarillas','TarjetaAmarillaController');
