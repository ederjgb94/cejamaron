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

Route::middleware('jsonapi.validate')->group(function () {
    Route::apiResource('producto', 'ProductoController')->except('destroy');
    Route::post('sincronizar_catalogo', 'ProductoController@sincronizar_catalogo')->name('producto.sincronizar_catalogo');
    Route::post('producto/activar/{producto}', 'ProductoController@activar')->name('producto.activar');
    Route::post('producto/desactivar/{producto}', 'ProductoController@desactivar')->name('producto.desactivar');

    Route::apiResource('cupon', 'CuponController');

    Route::apiResource('usuario', 'UsuarioController');
    Route::post('usuario/login', 'UsuarioController@login')->name('usuario.login');
    Route::post('usuario/activar/{usuario}', 'UsuarioController@activar')->name('usuario.activar');
    Route::post('usuario/desactivar/{usuario}', 'UsuarioController@desactivar')->name('usuario.desactivar');

    Route::apiResource('medida', 'MedidaController');
    Route::post('medida/activar/{medida}', 'MedidaController@activar')->name('medida.activar');
    Route::post('medida/desactivar/{medida}', 'MedidaController@desactivar')->name('medida.desactivar');

    Route::apiResource('categoria', 'CategoriaController');
    Route::post('categoria/activar/{categoria}', 'CategoriaController@activar')->name('categoria.activar');
    Route::post('categoria/desactivar/{categoria}', 'CategoriaController@desactivar')->name('categoria.desactivar');

});
