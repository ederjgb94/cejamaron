<?php

namespace App\Http\Controllers;

use \App\Models\AbonoCredito;
use Illuminate\Http\Request;

class AbonoCreditoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginador = AbonoCredito::orderBy('created_at', 'DESC')->paginate(5);
        return jsend_success([
            'paginas' => $paginador->lastPage(),
            'abonos_credito' => $paginador->items(),
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
        AbonoCredito::create($request->all());
        return jsend_success();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AbonoCredito  $abono_credito
     * @return \Illuminate\Http\Response
     */
    public function show(AbonoCredito $abono_credito)
    {
        return jsend_success([
            'abono_credito' => $abono_credito,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AbonoCredito  $abono_credito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AbonoCredito $abono_credito)
    {
        $abono_credito->update($request->all());
        return jsend_success();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AbonoCredito  $abono_credito
     * @return \Illuminate\Http\Response
     */
    public function destroy(AbonoCredito $abono_credito)
    {
        $abono_credito->delete();
        return jsend_success();
    }

    public function sincronizar(Request $request)
    {
        $fecha_de_actualizacion = $request->fecha_de_actualizacion;
        $abonos_credito =  AbonoCredito::where('updated_at', '>', $fecha_de_actualizacion)
            ->where('sucursal_id', $request->sucursal_id)
            ->get();

        return jsend_success([
            'abonos_creditos' => $abonos_credito,
        ],);
    }
}
