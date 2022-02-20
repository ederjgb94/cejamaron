<?php

namespace App\Http\Controllers;

use App\Models\CuentaBancaria;
use Illuminate\Http\Request;

class CuentaBancariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginador = CuentaBancaria::orderBy('created_at', 'DESC')->paginate(5);
        return jsend_success([
            'paginas' => $paginador->lastPage(),
            'cuentas_bancarias' => $paginador->items(),
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CuentaBancaria  $cuentaBancaria
     * @return \Illuminate\Http\Response
     */
    public function show(CuentaBancaria $cuentaBancaria)
    {
        return jsend_success(
            ['cuenta_bancaria'=>$cuentaBancaria]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CuentaBancaria  $cuentaBancaria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CuentaBancaria $cuentaBancaria)
    {
        $cuentaBancaria->update($request->all());
        return jsend_success();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CuentaBancaria  $cuentaBancaria
     * @return \Illuminate\Http\Response
     */
    public function destroy(CuentaBancaria $cuentaBancaria)
    {
        $cuentaBancaria->delete();
        return jsend_success();
    }
}
