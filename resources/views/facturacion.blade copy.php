@extends('layout')

@section('content')
    <div style="height: 40px"></div>
    <div style="height: 20px"></div>
    <div class="card p-4">
        <h3>Facturación - Papelería</h3>
        <label>— Ingresar datos de facturación</label>
        <div style="height: 30px"></div>
        <form method="POST" action="{{ route('facturacion.store') }}">
            @csrf

            @include('custom_input', [
                'name' => 'nombre',
                'label' => 'Razón social:',
                'placeholder' => '--',
                'type' => 'text',
            ])

            @include('custom_input', [
                'name' => 'rfc',
                'label' => 'RFC:',
                'placeholder' => '--',
                'type' => 'text',
            ])

            @include('custom_input', [
                'name' => 'calle',
                'label' => 'Calle:',
                'placeholder' => '--',
                'type' => 'text',
            ])
            @include('custom_input', [
                'name' => 'numero',
                'label' => 'No. #:',
                'placeholder' => '--',
                'type' => 'text',
            ])

            @include('custom_input', [
                'name' => 'colonia',
                'label' => 'Colonia:',
                'placeholder' => '--',
                'type' => 'text',
            ])
            @include('custom_input', [
                'name' => 'codigopostal',
                'label' => 'Código Postal:',
                'placeholder' => '--',
                'type' => 'text',
            ])

            @include('custom_input', [
                'name' => 'ciudad',
                'label' => 'Ciudad:',
                'placeholder' => '--',
                'type' => 'text',
            ])

            @include('custom_input', [
                'name' => 'correo',
                'label' => 'Correo:',
                'placeholder' => '--',
                'type' => 'text',
            ])

            @include('custom_input', [
                'name' => 'telefono',
                'label' => 'Teléfono:',
                'placeholder' => '--',
                'type' => 'text',
            ])

            @include('custom_dropdown', [
                'name' => 'metodopago',
                'label' => 'Método de pago:',
                'options' => ['EFECTIVO', 'TARJETA DÉBITO', 'TARJETA CRÉDITO', 'CHEQUE', 'TRANSFERENCIA'],
            ])

            @include('custom_dropdown', [
                'name' => 'usofactura',
                'label' => 'Uso Factura:',
                'options' => ['ADQ. MERCANCÍA', 'GASTOS GENERALES', 'OTRO'],
            ])

            @include('custom_input', [
                'name' => 'folio',
                'label' => 'Folio:',
                'placeholder' => '--',
                'type' => 'text',
            ])

            <div style="height: 40px"></div>
            <div class="d-flex justify-content-end">

                <button type="submit" class="btn btn-primary text-white px-4 py-2">Enviar solicitud</button>
            </div>
        </form>
    </div>
@endsection
