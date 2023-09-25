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

    Route::get('productos', 'ProductoController@index')->name('productos.index');
    Route::post('productos', 'ProductoController@store')->name('productos.store');
    Route::match(['put', 'patch'], 'productos/{producto}', 'ProductoController@update')->name('productos.update');
    Route::get('productos/{producto}', 'ProductoController@show')->name('productos.show');
    Route::post('productos/activar/{producto}', 'ProductoController@activar')->name('productos.activar');
    Route::post('productos/desactivar/{producto}', 'ProductoController@desactivar')->name('productos.desactivar');
    Route::post('productos/sincronizar', 'ProductoController@sincronizar')->name('productos.sincronizar');

    Route::get('usuarios', 'UsuarioController@index')->name('usuarios.index');
    Route::post('usuarios', 'UsuarioController@store')->name('usuarios.store');
    Route::match(['put', 'patch'], 'usuarios/{usuario}', 'UsuarioController@update')->name('usuarios.update');
    Route::get('usuarios/{usuario}', 'UsuarioController@show')->name('usuarios.show');
    Route::post('usuarios/login', 'UsuarioController@login')->name('usuarios.login');
    Route::post('usuarios/activar/{usuario}', 'UsuarioController@activar')->name('usuarios.activar');
    Route::post('usuarios/desactivar/{usuario}', 'UsuarioController@desactivar')->name('usuarios.desactivar');
    Route::post('usuarios/sincronizar', 'UsuarioController@sincronizar')->name('usuarios.sincronizar');

    Route::get('medidas', 'MedidaController@index')->name('medidas.index');
    Route::post('medidas', 'MedidaController@store')->name('medidas.store');
    Route::match(['put', 'patch'], 'medidas/{medida}', 'MedidaController@update')->name('medidas.update');
    Route::get('medidas/{medida}', 'MedidaController@show')->name('medidas.show');
    Route::post('medidas/activar/{medida}', 'MedidaController@activar')->name('medidas.activar');
    Route::post('medidas/desactivar/{medida}', 'MedidaController@desactivar')->name('medidas.desactivar');
    Route::post('medidas/sincronizar', 'MedidaController@sincronizar')->name('medidas.sincronizar');

    Route::get('categorias', 'CategoriaController@index')->name('categorias.index');
    Route::post('categorias', 'CategoriaController@store')->name('categorias.store');
    Route::match(['put', 'patch'], 'categorias/{categoria}', 'CategoriaController@update')->name('categorias.update');
    Route::get('categorias/{categoria}', 'CategoriaController@show')->name('categorias.show');
    Route::post('categorias/activar/{categoria}', 'CategoriaController@activar')->name('categorias.activar');
    Route::post('categorias/desactivar/{categoria}', 'CategoriaController@desactivar')->name('categorias.desactivar');
    Route::post('categorias/sincronizar', 'CategoriaController@sincronizar')->name('categorias.sincronizar');

    Route::get('cupones', 'CuponController@index')->name('cupones.index');
    Route::post('cupones', 'CuponController@store')->name('cupones.store');
    Route::match(['put', 'patch'], 'cupones/{cupon}', 'CuponController@update')->name('cupones.update');
    Route::get('cupones/{cupon}', 'CuponController@show')->name('cupones.show');
    Route::delete('cupones/{cupon}', 'CuponController@destroy')->name('cupones.destroy');

    Route::get('sucursales', 'SucursalController@index')->name('sucursales.index');
    Route::post('sucursales', 'SucursalController@store')->name('sucursales.store');
    Route::match(['put', 'patch'], 'sucursales/{sucursal}', 'SucursalController@update')->name('sucursales.update');
    Route::get('sucursales/{sucursal}', 'SucursalController@show')->name('sucursales.show');
    Route::post('sucursales/sincronizar', 'SucursalController@sincronizar')->name('sucursales.sincronizar');
    Route::post('sucursales/activar/{sucursal}', 'SucursalController@activar')->name('sucursales.activar');
    Route::post('sucursales/desactivar/{sucursal}', 'SucursalController@desactivar')->name('sucursales.desactivar');

    Route::get('sucursales/{sucursal}/usuarios', 'SucursalUsuarioController@index')->name('sucursales.usuarios.index');
    Route::post('sucursales/{sucursal}/usuarios/{usuario}', 'SucursalUsuarioController@store')->name('sucursales.usuarios.store');
    Route::delete('sucursales/{sucursal}/usuarios/{usuario}', 'SucursalUsuarioController@destroy')->name('sucursales.usuarios.destroy');
    Route::post('usuarios/{usuario}/sincronizar_existencias', 'SucursalUsuarioController@sincronizar_existencias')->name('usuarios.sincronizar_existencias');

    Route::get('ventas', 'VentaController@index')->name('ventas.index');
    Route::post('ventas', 'VentaController@store')->name('ventas.store');
    Route::match(['put', 'patch'], 'ventas/{venta}', 'VentaController@update')->name('ventas.update');
    Route::post('ventas/{venta}', 'VentaController@cancelacion')->name('ventas.cancelacion');

    Route::get('sucursales/{sucursal}/productos', 'ProductoSucursalController@index')->name('sucursales.productos.index');
    Route::post('sucursales/{sucursal}/productos/{producto}', 'ProductoSucursalController@store')->name('sucursales.productos.store');
    Route::get('sucursales/{sucursal}/productos/{producto}', 'ProductoSucursalController@show')->name('sucursales.productos.show');
    Route::get('productos/{producto}/existencias', 'ProductoSucursalController@existencia_producto')->name('productos.existencias');
    // Route::post('sucursales/sincronizar_existencias', 'SucursalController@sincronizar_existencias')->name('sucursales.sincronizar_existencias');

    Route::post('entradas', 'EntradaController@store')->name('entradas.store');
    Route::post('entradas/sincronizar', 'EntradaController@sincronizar')->name('entradas.sincronizar');

    Route::get('proveedores', 'ProveedorController@index')->name('proveedor.index');
    Route::post('proveedores', 'ProveedorController@store')->name('proveedor.store');
    Route::get('proveedores/{proveedor}', 'ProveedorController@show')->name('proveedor.show');
    Route::match(['put', 'patch'], 'proveedores/{proveedor}', 'ProveedorController@update')->name('proveedor.update');
    Route::post('proveedores/sincronizar', 'ProveedorController@sincronizar')->name('proveedores.sincronizar');
    Route::post('proveedores/{proveedor}/agregar_cuenta_bancaria', 'ProveedorController@agregar_cuenta_bancaria')->name('proveedor.agregar_cuenta_bancaria');
    Route::post('proveedores/sincronizar', 'ProveedorController@sincronizar')->name('proveedor.sincronizar');

    Route::get('cuentas_bancarias', 'CuentaBancariaController@index')->name('cuentas_bancarias.index');
    Route::get('cuentas_bancarias/{cuentaBancaria}', 'CuentaBancariaController@show')->name('cuentas_bancarias.show');
    Route::match(['put', 'patch'], 'cuentas_bancarias/{cuentaBancaria}', 'CuentaBancariaController@update')->name('cuentas_bancarias.update');
    Route::delete('cuentas_bancarias/{cuentaBancaria}', 'CuentaBancariaController@destroy')->name('cuentas_bancarias.destroy');

    Route::get('cortes', 'CorteController@index')->name('cortes.index');
    Route::post('cortes', 'CorteController@store')->name('cortes.store');
    Route::get('cortes/{corte}', 'CorteController@show')->name('cortes.show');
    Route::match(['put', 'patch'], 'CorteController@update')->name('cortes.update');




    Route::apiResource('apartados', 'ApartadoController');
    Route::post('apartados/{apartado}/abonar', 'ApartadoController@abonar')->name('apartado.abonar');
    Route::post('apartados/sincronizar', 'ApartadoController@sincronizar')->name('apartados.sincronizar');

    Route::apiResource('creditos', 'CreditoController');
    Route::post('creditos/{credito}/abonar', 'CreditoController@abonar')->name('credito.abonar');
    Route::post('creditos/sincronizar', 'CreditoController@sincronizar')->name('creditos.sincronizar');

    Route::apiResource('abonos_credito', 'AbonoCreditoController');
    Route::post('abonos_credito/sincronizar', 'AbonoCreditoController@sincronizar')->name('abonos_credito.sincronizar');

    Route::apiResource('abonos_apartado', 'AbonoApartadoController');
    Route::post('abonos_apartado/sincronizar', 'AbonoApartadoController@sincronizar')->name('abonos_apartado.sincronizar');

    Route::get('clientes_creditos', 'ClienteCreditoController@index')->name('clientes_creditos.index');
    Route::post('clientes_creditos', 'ClienteCreditoController@store')->name('clientes_creditos.store');
    Route::get('clientes_creditos/{clienteCredito}', 'ClienteCreditoController@show')->name('clientes_creditos.show');
    Route::match(['put', 'patch'], 'clientes_creditos/{clienteCredito}', 'ClienteCreditoController@update')->name('clientes_creditos.update');
    Route::delete('clientes_creditos/{clienteCredito}', 'ClienteCreditoController@destroy')->name('clientes_creditos.destroy');
    Route::post('clientes_creditos/sincronizar', 'ClienteCreditoController@sincronizar')->name('clientes_creditos.sincronizar');

    Route::get('salidas', 'SalidaController@index')->name('salidas.index');
    Route::post('salidas', 'SalidaController@store')->name('salidas.store');
    Route::get('salidas/{salida}', 'SalidaController@show')->name('salidas.show');
    Route::match(['put', 'patch'], 'salidas/{salida}', 'SalidaController@update')->name('salidas.update');
    Route::post('salidas/canelar/{salida}', 'SalidaController@cancelar')->name('salidas.cancelar');
});
