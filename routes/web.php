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

Route::get ('/algo','Espacio_trabajoController@agregar_espacio')->name('agregar');

Route::get ('/Listarespacio','Espacio_trabajoController@listar_espacio')->name('listar_espacio');

Route::get('/modificarespacio/{id}','Espacio_trabajoController@modificarespacio')->name('modificarespacio');

Route::get ('/detaespacio/{id}-{fini}-{ffin}','Espacio_trabajoController@detaespacio')->name('detaespacio');

Route::get('eliminarespacio/{id}','Espacio_trabajoController@eliminar_espacio')->name('eliminarespacio');

//----------------------- Rutas usuario ----------------------------------------------------------------
Route::get('/modificar_usuario/{id}','LandingController@modificar_usuario')->name('modificar_usuario');

Route::get('/listaclientes', 'LandingController@listaclientes')->name('listaclientes');

Route::get('/agragarusuario', 'LandingController@nuevousuario')->name('nuevousuario');

Route::get('eliminar_usuario/{id}','LandingController@eliminar_usuario')->name('eliminar_usuario');

//----------------------- AdminController get ----------------------------------------------------------------

Route::get ('/Listararriendo','AdminController@listar_arriendo')->name('listar_arriendo');

Route::get ('/NuevoArriendo','AdminController@agregar_arriendo')->name('agregar_arriendo');

Route::get ('/AgregarCategoria','AdminController@agregar_categoria')->name('agregar_categoria');

//----------------------- AdminController post ----------------------------------------------------------------

Route::get ('/arreindodetalle/{id}','AdminController@detallearriendo')->name('detallearriendo');

//-------------------------------- post ----------------------------------------------------------------------

Route::post('nuevousuariopost','LandingController@crearusuario')->name('crear_usuario');

Route::post('crearespaciopost','Espacio_trabajoController@crear_espacio')->name('crear_espacio');

Route::post('actualizarespacio','Espacio_trabajoController@actualizarespacio')->name('actualizarespacio');

Route::post('actualizar_usuario','LandingController@actualizar_usuario')->name('actualizar_usuario');

