<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginador = Entrada::orderBy('id', 'desc')->Paginate(10);
        return jsend_success([
            'paginas' => $paginador->lastPage(),
            'entradas' =>  $paginador->items(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entrada = Entrada::create($request->all());
        $entrada_productos = $request['entrada_productos'];
        // $entrada->productos()->syncWithoutDetaching($entrada_productos);
        // $entrada->sucursal->productos()->syncWithoutDetaching($entrada_productos->all());
        foreach ($entrada_productos as $producto) {
            $entrada->productos()->syncWithoutDetaching([
                $producto['id'] => [
                    'cantidad' => $producto['cantidad'],
                    'costo' => $producto['costo']
                ]
            ]);
            $sucursal = $entrada->sucursal;

            $existencia = $sucursal->productos->contains('id', $producto['id']) ?
                $sucursal->productos->find($producto['id'])->cantidad : 0;

            $sucursal->productos()->syncWithoutDetaching([
                $producto['id'] => [
                    'cantidad' => $producto['cantidad'] + $existencia,
                ]
            ]);
        }
        return jsend_success();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function show(Entrada $entrada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entrada $entrada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entrada $entrada)
    {
        //
    }


    public function sincronizar(Request $request)
    {
        $fecha_de_actualizacion = $request->fecha_de_actualizacion;
        $Entrada =  Entrada::where('updated_at', '>', $fecha_de_actualizacion)->get();

        return jsend_success([
            'Entrada' => $Entrada,
        ],);
    }
}
