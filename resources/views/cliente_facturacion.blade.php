@extends('layout')

@section('content')
    <div style="height: 40px"></div>
    <div style="height: 20px"></div>
    <div class="card p-4">
        <h3>Cliente - Facturación</h3>
        <label>— Ingresar datos para facturación</label>
        <div style="height: 30px"></div>
        <form method="POST" action="{{ route('clientes.store') }}">
            @csrf

            @include('custom_input', [
                'name' => 'rfc',
                'label' => 'RFC:',
                'placeholder' => '--',
                'type' => 'text',
                'value' => $rfc,
            ])

            @include('custom_input', [
                'name' => 'razon_social',
                'label' => 'Razón social:',
                'placeholder' => '--',
                'type' => 'text',
                'value' => $razon_social ?? '',
            ])

            @include('custom_input', [
                'name' => 'calle',
                'label' => 'Calle:',
                'placeholder' => '--',
                'type' => 'text',
                'value' => $calle ?? '',
            ])


            <div class="row mb-2">
                <label class="col-sm-3 fw-bold col-form-label">Num. exterior:</label>
                <div class="col-sm-3">
                    <input required name="numero_exterior" type="text" class="form-control" placeholder="--"
                        value="{{ $numero_exterior ?? '' }}" style="text-transform: uppercase;">
                </div>

                <label class="col-sm-3 fw-bold col-form-label">*Num. interior:</label>
                <div class="col-sm-3">
                    <input name="numero_interior" type="text" class="form-control" placeholder="-- (opcional)"
                        value="{{ $numero_interior ?? '' }}" style="text-transform: uppercase;">
                </div>
            </div>

            @include('custom_input', [
                'name' => 'colonia',
                'label' => 'Colonia:',
                'placeholder' => '--',
                'type' => 'text',
                'value' => $colonia ?? '',
            ])
            @include('custom_input', [
                'name' => 'codigo_postal',
                'label' => 'Código Postal:',
                'placeholder' => '--',
                'type' => 'text',
                'value' => $codigo_postal ?? '',
            ])

            @include('custom_input', [
                'name' => 'ciudad',
                'label' => 'Ciudad:',
                'placeholder' => '--',
                'type' => 'text',
                'value' => $ciudad ?? '',
            ])

            @include('custom_input', [
                'name' => 'correo',
                'label' => 'Correo:',
                'placeholder' => '--',
                'type' => 'text',
                'value' => $correo ?? '',
            ])

            @include('custom_input', [
                'name' => 'telefono',
                'label' => 'Teléfono:',
                'placeholder' => '--',
                'type' => 'text',
                'value' => $telefono ?? '',
            ])
            <div style="height: 10px"></div>
            <div class="d-flex justify-content-between align-items-center">
                <label for="" class="fst-italic">Verifique que sus datos sean correctos</label>
                <div style="width: 10px; "></div>
                <button type="submit" class="btn btn-primary text-white px-4 py-2">Siguiente</button>
            </div>
        </form>
    </div>
@endsection
