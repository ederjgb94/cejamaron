<?php

namespace App\Http\Controllers;

use App\Models\Credito;
use Illuminate\Http\Request;

class CreditoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginador = Credito::orderBy('created_at', 'DESC')->paginate(5);
        return jsend_success([
            'paginas' => $paginador->lastPage(),
            'creditos' => $paginador->items(),
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
        $credito = Credito::create($request->all());
        $abonos = $request['abonos'];
        foreach ($abonos as $abono) {
            $credito->abonos()->create($abono);
        }
        return jsend_success();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Credito  $credito
     * @return \Illuminate\Http\Response
     */
    public function show(Credito $credito)
    {
        jsend_success([
            'credito' => $credito,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Credito  $credito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Credito $credito)
    {
        $credito->update($request->all());
        return jsend_success();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Credito  $credito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Credito $credito)
    {
        $credito->delete();
        return jsend_success();
    }

    public function sincronizar(Request $request)
    {
        $fecha_de_actualizacion = $request->fecha_de_actualizacion;
        $creditos =  Credito::where('updated_at', '>', $fecha_de_actualizacion)
            ->where('sucursal_id', $request->sucursal_id)
            ->get();

        return jsend_success([
            'creditos' => $creditos,
        ],);
    }

    public function abonar(Request $request, Credito $credito)
    {
        $credito->abonos()->create($request->all());
        $total_abonado = $request['total_abonado'];
        $total_pagado = $credito->total_pagado;
        $credito->total_pagado = $total_pagado + $total_abonado;
        if ($credito->total_pagado == $credito->total) {
            $credito->estado = 3;
        }
        $credito->save();
        return jsend_success();
    }
}
