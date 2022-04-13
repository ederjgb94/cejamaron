<?php

namespace App\Http\Controllers;

use App\Models\ClienteFactura;
use App\Models\Cliente;
use App\Models\Venta;

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
        // return view('finalizar_facturacion');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (
            $request->efectivo == null &&
            $request->debito == null &&
            $request->credito == null &&
            $request->cheque == null &&
            $request->transferencia == null
        ) {
            return view('finalizar_facturacion', [
                'error_metodo_pago' => 'Método de pago es requerido',
                'folio' => $request->folio,
                'uso_factura' => $request->uso_factura,
                'rfc' => $request->rfc,
                'razon_social' => $request->razon_social,

            ]);
        }

        $cliente = Cliente::where('rfc', '=', $request->rfc)->first();
        $venta = Venta::where('folio', '=', $request->folio)->first();

        if ($venta == null) {
            return view('finalizar_facturacion', [
                'folio' => $request->folio,
                'uso_factura' => $request->uso_factura,
                'rfc' => $request->rfc,
                'razon_social' => $request->razon_social,
                'error_folio' => 'La venta no existe',
                'invalid_folio' => 'is-invalid',
            ]);
        }
        $factura_aux = ClienteFactura::where('venta_id', '=', $venta->id)->first();

        if ($factura_aux != null) {
            return view('finalizar_facturacion', [
                'folio' => $request->folio,
                'uso_factura' => $request->uso_factura,
                'rfc' => $request->rfc,
                'razon_social' => $request->razon_social,
                'error_folio' => 'El folio en proceso de facturación',
                'invalid_folio' => 'is-invalid',
            ]);
        }

        $cliente_factura = new ClienteFactura();
        $cliente_factura->uso_factura = $request->uso_factura;
        $cliente_factura->metodo_pago = json_encode([
            'efectivo' => $request->efectivo == null ? 'false' : 'true',
            'debito' => $request->debito == null ? 'false' : 'true',
            'credito' => $request->credito == null ? 'false' : 'true',
            'cheque' => $request->cheque == null ? 'false' : 'true',
            'transferencia' => $request->transferencia == null ? 'false' : 'true',
        ]);
        $cliente_factura->cliente()->associate($cliente);
        $cliente_factura->venta()->associate($venta);
        $cliente_factura->save();
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
