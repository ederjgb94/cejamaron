<?php

namespace App\Http\Controllers;

use App\Models\AbonoApartado;
use Illuminate\Http\Request;

class AbonoApartadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginador = AbonoApartado::orderBy('created_at', 'DESC')->paginate(5);
        return jsend_success([
            'paginas' => $paginador->lastPage(),
            'abonos_apartado' => $paginador->items(),
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
        AbonoApartado::create($request->all());
        return jsend_success();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AbonoApartado  $abonoApartado
     * @return \Illuminate\Http\Response
     */
    public function show(AbonoApartado $abonoApartado)
    {
        return jsend_success([
            'abono_apartado' => $abonoApartado,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AbonoApartado  $abonoApartado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AbonoApartado $abonoApartado)
    {
        $abonoApartado->update($request->all());
        return jsend_success();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AbonoApartado  $abonoApartado
     * @return \Illuminate\Http\Response
     */
    public function destroy(AbonoApartado $abonoApartado)
    {
        $abonoApartado->delete();
        return jsend_success();
    }

    public function sincronizar(Request $request)
    {
        $fecha_de_actualizacion = $request->fecha_de_actualizacion;
        $abonos_apartado =  AbonoApartado::where('updated_at', '>', $fecha_de_actualizacion)
            ->where('sucursal_id', $request->sucursal_id)
            ->get();

        return jsend_success([
            'abonos_apartado' => $abonos_apartado,
        ],);
    }
}
