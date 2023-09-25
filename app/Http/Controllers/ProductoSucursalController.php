<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Sucursal;
use Illuminate\Http\Request;

class ProductoSucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Sucursal $sucursal)
    {
        $paginador = $sucursal->productos()
            ->orderBy('cantidad', 'ASC')
            ->paginate(10, ['id', 'codigo', 'nombre', 'cantidad']);
        return jsend_success([
            'paginas' => $paginador->lastPage(),
            'sucursal_productos' =>  $paginador->items(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Sucursal $sucursal, Producto $producto)
    {
        $sucursal->productos()->syncWithoutDetaching($producto);
        $existencia = $sucursal->productos()->find($producto)->pivot->cantidad;
        $sucursal->productos()->updateExistingPivot($producto, [
            'cantidad' => $existencia + $request->cantidad,
        ]);
        return jsend_success();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sucursal $sucursal, Producto $producto)
    {
        return jsend_success(
            [
                'producto' => $sucursal->productos()->find(
                    $producto,
                    ['id', 'codigo', 'nombre', 'cantidad']
                )
            ]
        );
    }

    public function existencia_producto(Producto $producto)
    {
        return jsend_success([
            'existencias' => $producto->sucursales()
                ->get(
                    [
                        'id',
                        'razon_social',
                        'direccion',
                        'cantidad',
                    ]
                )
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
