<?php

namespace App\Http\Controllers;

use App\Models\OperacionProducto;
use Illuminate\Http\Request;

class OperacionProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OperacionProducto::all()->paginate(5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $OperacionProducto = new OperacionProducto($request->all());
        $OperacionProducto->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OperacionProducto  $OperacionProducto
     * @return \Illuminate\Http\Response
     */
    public function show(OperacionProducto $OperacionProducto)
    {
        return $OperacionProducto;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OperacionProducto  $OperacionProducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OperacionProducto $OperacionProducto)
    {
        $OperacionProducto->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Oproducto  $OperacionProducto
     * @return \Illuminate\Http\Response
     */
    public function destroy(OperacionProducto $OperacionProducto)
    {
        //
    }

    public function confirm(OperacionProducto $OperacionProducto)
    {
        $OperacionProducto->confirmar = true;
        $OperacionProducto->save();
    }

    public function unconfirm(OperacionProducto $OperacionProducto)
    {
        $OperacionProducto->confirmar = false;
        $OperacionProducto->save();
    }
}
