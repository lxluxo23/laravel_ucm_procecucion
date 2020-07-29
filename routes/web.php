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

Route::get('/', 'Espacio_trabajoController@index')->name('inicio');

Route::get('/pagogogogo', 'LandingController@pago')->name('pago');

Route::get('/admin', 'LandingController@indexadmin')->name('inicioadmin');

Route::get('/agragarusuario', 'LandingController@nuevousuario')->name('nuevousuario');

Route::get('/listaclientes', 'LandingController@listaclientes')->name('listaclientes');

Route::get ('/algo','Espacio_trabajoController@agregar_espacio')->name('agregar');

Route::get ('/Listarespacio','Espacio_trabajoController@listar_espacio')->name('listar_espacio');

Route::get('/modificarespacio/{id}','Espacio_trabajoController@modificarespacio')->name('modificarespacio');

Route::get ('/detaespacio/{id}','Espacio_trabajoController@detaespacio')->name('detaespacio');

Route::get('eliminarespacio/{id}','Espacio_trabajoController@eliminar_espacio')->name('eliminarespacio');



Route::post('nuevousuariopost','LandingController@crearusuario')->name('crear_usuario');

Route::post('crearespaciopost','Espacio_trabajoController@crear_espacio')->name('crear_espacio');

Route::post('actualizarespacio','Espacio_trabajoController@actualizarespacio')->name('actualizarespacio');

