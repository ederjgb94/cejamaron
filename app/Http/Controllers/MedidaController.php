<?php

namespace App\Http\Controllers;

use App\Models\Medida;
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
        return Medida::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $medida = new Medida();
        $medida->create($request->all());
        $this->sincronizarFirebase();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medida  $medida
     * @return \Illuminate\Http\Response
     */
    public function show(Medida $medida)
    {
        return $medida;
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medida  $medida
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medida $medida)
    {
    }

    public function disable(Medida $medida)
    {
        $medida->activo = false;
        $medida->save();
        $this->sincronizarFirebase();
    }

    public function activate(Medida $medida)
    {
        $medida->activo = true;
        $medida->save();
        $this->sincronizarFirebase();
    }
}
