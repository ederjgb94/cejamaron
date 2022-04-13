<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginador = Cliente::orderBy('created_at', 'DESC')->paginate(5);
        return jsend_success([
            'paginas' => $paginador->lastPage(),
            'clientes' => $paginador->items(),
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
        $cliente = Cliente::where('rfc', '=', $request->rfc)->first();
        if ($cliente == null) {
            Cliente::create($request->all());
        } else {
            $cliente->update($request->all());
        }
        return view('');
    }

    public function create()
    {
        return view('cliente_facturacion');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return jsend_success(
            ['cliente' => $cliente],
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update($request->all());
        return jsend_success();
    }

    public function buscar_rfc(Request $request)
    {
        $cliente =  Cliente::where('rfc', '=', $request->rfc)->first();

        if ($cliente == null) {
            return view('cliente_facturacion', [
                'rfc' => $request->rfc,
            ]);
        } else {
            return view('cliente_facturacion', $cliente);
        }
    }
}
