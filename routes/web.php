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

Route::get('/', 'LandingController@index')->name('inicio');

Route::get('/pagogogogo', 'LandingController@pago')->name('pago');

Route::get('/admin', 'LandingController@indexadmin')->name('inicioadmin');

Route::get('/agragarusuario', 'LandingController@nuevousuario')->name('nuevousuario');

Route::get('/listaclientes', 'LandingController@listaclientes')->name('listaclientes');

Route::get ('/algo','LandingController@agregar_espacio')->name('agregar');

Route::get ('/Listarespacio','LandingController@listar_espacio')->name('listar_espacio');

Route::get ('/DetalleEspacio','LandingController@detventa')->name('detventa');



/*
|--------------------------------------------------------------------------
| PARA LOS METODOS POST PEASOS DE LACRA
|--------------------------------------------------------------------------
*/

Route::post('nuevousuariopost','LandingController@crearusuario')->name('crear_usuario');

Route::post('crearespaciopost','LandingController@crear_espacio')->name('crear_espacio');

Route::post('modificarespacio','LandingController@modificarespacio')->name('modificarespacio');

