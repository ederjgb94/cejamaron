<?php

namespace App\Http\Controllers;

use App\Events\AdministradorOperaciones;
use App\Http\Requests\ActivoRequest;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginador = Producto::orderBy('created_at', 'desc')->Paginate(5);
        return jsend_success([
            'paginas' => $paginador->lastPage(),
            'productos' =>  $paginador->items(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductoRequest $request)
    {

        $nuevos_productos = $request['nuevos_productos'];
        $usuario_id = $request['usuario_id'];

        foreach ($nuevos_productos as  $nuevo_producto) {
            $producto = Producto::create($nuevo_producto);
            event(
                new AdministradorOperaciones($producto, $usuario_id, 'CREAR', 'PRODUCTO')
            );
        }

        $this->sincronizarFirebase();

        return jsend_success();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return jsend_success([
            'producto' => $producto,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */

    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        $producto->update($request->all());
        $usuario_id = $request->usuario_id;

        $this->sincronizarFirebase();
        event(
            new AdministradorOperaciones($producto, $usuario_id, 'ACTUALIZAR', 'PRODUCTO')
        );
        return jsend_success();
    }

    public function activar(ActivoRequest $request, Producto $producto)
    {
        $usuario_id = $request->usuario_id;
        $producto->activo = true;
        $producto->save();
        $this->sincronizarFirebase();
        event(
            new AdministradorOperaciones($producto, $usuario_id, 'ACTIVAR', 'PRODUCTO')
        );
        return jsend_success();
    }

    public function desactivar(ActivoRequest $request, Producto $producto)
    {
        $usuario_id = $request->usuario_id;
        $producto->activo = false;
        $producto->save();
        $this->sincronizarFirebase();
        event(
            new AdministradorOperaciones($producto, $usuario_id, 'DESACTIVAR', 'PRODUCTO')
        );
        return jsend_success();
    }
    
    public function sincronizar_catalogo(Request $request)
    {
        $fecha_de_actualizacion = $request->fecha_de_actualizacion;
        $productos =  Producto::where('updated_at', '>', $fecha_de_actualizacion)->get();

        return jsend_success([
            'productos' => $productos,
        ],);
    }
}
