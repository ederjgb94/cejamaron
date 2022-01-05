<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('producto', 'ProductoController');
Route::post('sincronizar_catalogo', 'ProductoController@sincronizar_catalogo')->name('producto.sincronizar_catalogo');
Route::post('producto/activate/{producto}', 'ProductoController@activate')->name('producto.activate');
Route::post('producto/disable/{producto}', 'ProductoController@disable')->name('producto.disable');

Route::apiResource('usuario', 'UsuarioController');
Route::post('usuario/login', 'UsuarioController@login')->name('usuario.login');
Route::post('usuario/activate/{usuario}', 'UsuarioController@activate')->name('usuario.activate');
Route::post('usuario/disable/{usuario}', 'UsuarioController@disable')->name('usuario.disable');

Route::apiResource('medida', 'MedidaController');
Route::post('medida/activate/{medida}', 'MedidaController@activate')->name('medida.activate');
Route::post('medida/disable/{medida}', 'MedidaController@disable')->name('medida.disable');

Route::apiResource('categoria', 'CategoriaController');
// Route::get('categoria', 'CategoriaController@index')->name("categoria.index");
// Route::post('categoria', 'CategoriaController@store')->name("categoria.store");
// Route::match(['put', 'patch'], 'categoria/{categoria}', 'CategoriaController@update')->name("categoria.update");
// Route::get('categoria/{categoria}', 'CategoriaController@show')->name("categoria.show");
// Route::delete('categoria/{categoria}', 'CategoriaController@destroy')->name("categoria.destroy");
Route::post('categoria/activate/{categoria}', 'CategoriaController@activate')->name('categoria.activate');
Route::post('categoria/disable/{categoria}', 'CategoriaController@disable')->name('categoria.disable');

Route::apiResource('oproducto', 'OproductoController');
Route::post('oproducto/confirm/{oproducto}', 'OproductoController@confirm')->name('oproducto.confirm');
Route::post('oproducto/unconfirm/{oproducto}', 'OproductoController@unconfirm')->name('oproducto.unconfirm');
