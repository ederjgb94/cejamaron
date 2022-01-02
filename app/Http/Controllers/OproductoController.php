<?php

namespace App\Http\Controllers;

use App\Models\Oproducto;
use Illuminate\Http\Request;

class OproductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Oproducto::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $oproducto = new Oproducto($request->all());
        $oproducto->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Oproducto  $oproducto
     * @return \Illuminate\Http\Response
     */
    public function show(Oproducto $oproducto)
    {
        return $oproducto;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Oproducto  $oproducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Oproducto $oproducto)
    {
        $oproducto->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Oproducto  $oproducto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Oproducto $oproducto)
    {
        //
    }

    public function confirm(Oproducto $oproducto)
    {
        $oproducto->confirmar = true;
        $oproducto->save();
    }

    public function unconfirm(Oproducto $oproducto)
    {
        $oproducto->confirmar = false;
        $oproducto->save();
    }
}
