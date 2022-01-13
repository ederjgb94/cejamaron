<?php

use App\Http\Controllers\SucursalUsuarioController;
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

    Route::get('productos','ProductoController@index')->name('productos.index');
    Route::post('productos','ProductoController@store')->name('productos.store');
    Route::match(['put','patch'], 'productos/{producto}', 'ProductoController@update')->name('productos.update');
    Route::get('productos/{producto}','ProductoController@show')->name('productos.show');
    Route::post('productos/activar/{producto}', 'ProductoController@activar')->name('productos.activar');
    Route::post('productos/desactivar/{producto}', 'ProductoController@desactivar')->name('productos.desactivar');
    Route::post('productos/sincronizar', 'ProductoController@sincronizar')->name('productos.sincronizar');

    Route::get('usuarios','UsuarioController@index')->name('usuarios.index');
    Route::post('usuarios','UsuarioController@store')->name('usuarios.store');
    Route::match(['put','patch'], 'usuarios/{usuario}', 'UsuarioController@update')->name('usuarios.update');
    Route::get('usuarios/{usuario}','UsuarioController@show')->name('usuarios.show');
    Route::post('usuarios/login', 'UsuarioController@login')->name('usuarios.login');
    Route::post('usuarios/activar/{usuario}', 'UsuarioController@activar')->name('usuarios.activar');
    Route::post('usuarios/desactivar/{usuario}', 'UsuarioController@desactivar')->name('usuarios.desactivar');
    Route::post('usuarios/sincronizar', 'usuarioController@sincronizar')->name('usuarios.sincronizar');

    Route::get('medidas','MedidaController@index')->name('medidas.index');
    Route::post('medidas','MedidaController@store')->name('medidas.store');
    Route::match(['put','patch'], 'medidas/{medida}', 'MedidaController@update')->name('medidas.update');
    Route::get('medidas/{medida}','MedidaController@show')->name('medidas.show');
    Route::post('medidas/activar/{medida}', 'MedidaController@activar')->name('medidas.activar');
    Route::post('medidas/desactivar/{medida}', 'MedidaController@desactivar')->name('medidas.desactivar');
    Route::post('medidas/sincronizar', 'MedidaController@sincronizar')->name('medidas.sincronizar');
    
    Route::get('categorias', 'CategoriaController@index')->name('categorias.index');
    Route::post('categorias', 'CategoriaController@store')->name('categorias.store');
    Route::match(['put','patch'],'categorias/{categoria}', 'CategoriaController@update')->name('categorias.update');
    Route::get('categorias/{categoria}','CategoriaController@show')->name('categorias.show');
    Route::post('categorias/activar/{categoria}', 'CategoriaController@activar')->name('categorias.activar');
    Route::post('categorias/desactivar/{categoria}', 'CategoriaController@desactivar')->name('categorias.desactivar');
    Route::post('categorias/sincronizar', 'categoriaController@sincronizar')->name('categorias.sincronizar');
    
    Route::get('cupones','CuponController@index')->name('cupones.index');
    Route::post('cupones','CuponController@store')->name('cupones.store');
    Route::match(['put','patch'], 'cupones/{cupon}','CuponController@update')->name('cupones.update');
    Route::get('cupones/{cupon}', 'CuponController@show')->name('cupones.show');
    Route::delete('cupones/{cupon}', 'CuponController@destroy')->name('cupones.destroy');

    Route::get('sucursales', 'SucursalController@index')->name('sucursales.index');
    Route::post('sucursales', 'SucursalController@store')->name('sucursales.store');
    Route::match(['put', 'patch'], 'sucursales/{sucursal}', 'SucursalController@update')->name('sucursales.update');
    Route::get('sucursales/{sucursal}', 'SucursalController@show')->name('sucursales.show');

    Route::get('sucursales/{sucursal}/usuarios', 'SucursalUsuarioController@index')->name('sucursales.usuarios.index');
    Route::post('sucursales/{sucursal}/usuarios/{usuario}', 'SucursalUsuarioController@store')->name('sucursales.usuarios.store');
    Route::delete('sucursales/{sucursal}/usuarios/{usuario}', 'SucursalUsuarioController@destroy')->name('sucursales.usuarios.destroy');

    Route::get('ventas','VentaController@index')->name('ventas.index');
    Route::post('ventas','VentaController@store')->name('ventas.store');
    Route::match(['put','patch'],'ventas/{venta}','VentaController@update')->name('ventas.update');
    Route::post('ventas/{venta}', 'VentaController@cancelacion')->name('ventas.cancelacion');
    

});
