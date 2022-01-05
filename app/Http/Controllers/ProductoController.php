<?php

namespace App\Http\Controllers;

use App\Events\AdministradorOperaciones;
use App\Http\Requests\StoreProductoRequest;
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
        $paginator = Producto::orderBy('created_at', 'desc')->Paginate(5);
        return jsend_success([
            'productos' =>  $paginator->items(),
            'total_pages' => $paginator->lastPage(),
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
                new AdministradorOperaciones($producto, $usuario_id, 'ALTA', 'PRODUCTO')
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
        ],);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Producto $producto)
    {
        $producto->update($request->all());
        $this->sincronizarFirebase();

        return jsend_success();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
    }

    public function disable(Producto $producto)
    {
        $producto->activo = false;
        $producto->save();
        $this->sincronizarFirebase();

        return jsend_success();
    }

    public function activate(Producto $producto)
    {
        $producto->activo = true;
        $producto->save();
        $this->sincronizarFirebase();

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
