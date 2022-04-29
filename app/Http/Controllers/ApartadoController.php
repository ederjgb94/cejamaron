<?php

namespace App\Http\Controllers;

use App\Models\Apartado;
use Illuminate\Http\Request;

class ApartadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginador = Apartado::orderBy('created_at', 'DESC')->paginate(5);
        return jsend_success([
            'paginas' => $paginador->lastPage(),
            'apartados' => $paginador->items(),
        ],);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Apartado::create($request->all());
        return jsend_success();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartado  $apartado
     * @return \Illuminate\Http\Response
     */
    public function show(Apartado $apartado)
    {
        return jsend_success([
            'apartado' => $apartado,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apartado  $apartado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartado $apartado)
    {
        $apartado->update($request->all());
        return jsend_success();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartado  $apartado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartado $apartado)
    {
        $apartado->delete();
        return jsend_success();
    }

    public function sincronizar(Request $request)
    {
        $fecha_de_actualizacion = $request->fecha_de_actualizacion;
        $apartados =  Apartado::where('updated_at', '>', $fecha_de_actualizacion)
            ->where('sucursal_id', $request->sucursal_id)
            ->get();

        return jsend_success([
            'apartados' => $apartados,
        ],);
    }
}
