<?php

namespace App\Http\Controllers;

use App\Models\ClienteCredito;
use Illuminate\Http\Request;

class ClienteCreditoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginador = ClienteCredito::orderBy('created_at', 'DESC')->paginate(5);
        return jsend_success([
            'paginas' => $paginador->lastPage(),
            'clientes_credito' => $paginador->items(),
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
        $cliente = ClienteCredito::create($request->all());
        return jsend_success(
            [
                'cliente_creditos_id' => $cliente->id,
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClienteCredito  $clienteCredito
     * @return \Illuminate\Http\Response
     */
    public function show(ClienteCredito $clienteCredito)
    {
        return jsend_success([
            'cliente_credito' => $clienteCredito,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClienteCredito  $clienteCredito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClienteCredito $clienteCredito)
    {
        $clienteCredito->update($request->all());
        return jsend_success();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClienteCredito  $clienteCredito
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClienteCredito $clienteCredito)
    {
        //
    }

    public function sincronizar(Request $request)
    {
        $fecha_de_actualizacion = $request->fecha_de_actualizacion;
        $clientes_credito =  ClienteCredito::where('updated_at', '>', $fecha_de_actualizacion)->get();

        return jsend_success([
            'clientes_credito' => $clientes_credito,
        ],);
    }
}
