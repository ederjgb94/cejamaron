<?php

namespace App\Http\Controllers;

use App\Models\ClienteFactura;
use Illuminate\Http\Request;

class ClienteFacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('facturacion');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return '';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ClienteFactura::create($request);
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClienteFactura  $clienteFactura
     * @return \Illuminate\Http\Response
     */
    public function show(ClienteFactura $clienteFactura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClienteFactura  $clienteFactura
     * @return \Illuminate\Http\Response
     */
    public function edit(ClienteFactura $clienteFactura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClienteFactura  $clienteFactura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClienteFactura $clienteFactura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClienteFactura  $clienteFactura
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClienteFactura $clienteFactura)
    {
        //
    }
}
