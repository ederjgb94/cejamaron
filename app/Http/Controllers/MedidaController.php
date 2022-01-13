<?php

namespace App\Http\Controllers;

use App\Models\Medida;
use App\Http\Requests\ActivoRequest;
use Illuminate\Http\Request;

class MedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return jsend_success(
            ['medidas'=> Medida::all()],
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Medida::create($request->all());
        $this->sincronizarFirebase();
        return jsend_success();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medida  $medida
     * @return \Illuminate\Http\Response
     */
    public function show(Medida $medida)
    {
        return jsend_success(['medida'=>$medida]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medida  $medida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medida $medida)
    {
        $medida->update($request->all());
        $this->sincronizarFirebase();
        return jsend_success();
    }

    public function desactivar(ActivoRequest $request, Medida $medida)
    {
        $medida->activo = false;
        $medida->save();
        $this->sincronizarFirebase();
        return jsend_success();
    }

    public function activate(ActivoRequest $request, Medida $medida)
    {
        $medida->activo = true;
        $medida->save();
        $this->sincronizarFirebase();
        return jsend_success();
    }

    public function sincronizar(Request $request)
    {
        $fecha_de_actualizacion = $request->fecha_de_actualizacion;
        $medidas =  Medida::where('updated_at', '>', $fecha_de_actualizacion)->get();

        return jsend_success([
            'medidas' => $medidas,
        ],);
    }
}
