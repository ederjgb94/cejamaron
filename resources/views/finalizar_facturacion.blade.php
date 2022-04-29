@extends('layout')

@section('content')
    <div style="height: 40px"></div>
    <div style="height: 20px"></div>
    <div class="card p-4">
        <h3>Datos - Facturación</h3>
        <label>— Ingresar la información de su compra</label>
        <div style="height: 30px"></div>
        <form method="POST" action="{{ route('clientes.facturas.store') }}">
            @csrf

            @include('custom_input', [
                'name' => 'rfc',
                'label' => 'RFC:',
                'placeholder' => '--',
                'type' => 'text',
                'disabled' => 'readonly',
                'value' => $cliente->rfc ?? $rfc,
            ])

            @include('custom_input', [
                'name' => 'razon social',
                'label' => 'Razón Social:',
                'placeholder' => '--',
                'type' => 'text',
                'disabled' => 'readonly',
                'value' => $cliente->razon_social ?? $razon_social,
            ])

            {{-- @include('custom_input', [
                'name' => 'folio',
                'label' => 'Folio Ticket:',
                'placeholder' => '--',
                'type' => 'text',
                'value' => $folio ?? '',
            ]) --}}

            <div class="row mb-2">
                <label class="col-sm-3 fw-bold col-form-label">Folio Ticket:</label>
                <div class="col-sm-9">
                    <input required name="folio" type="text" class="form-control {{ $invalid_folio ?? '' }}"
                        placeholder="--" value="{{ $folio ?? '' }}" style="text-transform: uppercase;">
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $error_folio ?? '' }}
                    </div>
                </div>
            </div>

            @include('custom_dropdown', [
                'name' => 'uso_factura',
                'label' => 'Uso Factura:',
                'selected' => $uso_factura ?? '',
                'options' => [
                    'ADQUISICIÓN DE MERCANCIAS',
                    'DEVOLUCIONES DESCUENTOS O BONIFICACIONES',
                    'GASTOS EN GENERAL',
                    'CONSTRUCCIONES',
                    'MOBILARIO Y EQUIPO DE OFICINA PARA INVERSIONES',
                    'EQUIPO DE TRANSPORTE',
                    'EQUIPO DE COMPUTO Y ACCESORIOS',
                    'DADOS, TROQUELES, MOLDES, MATRICES Y HERRAMENTAL',
                    'COMUNICACIONES TELEFÓNICAS',
                    'OTRA MAQUINARIA Y EQUIPO',
                    'HONORARIOS MÉDICOS, DENTALES Y GASTOS HOSPITALARIOS',
                    'GASTOS MÉDICOS CON INCAPACIDAD O DISCAPACIDAD',
                ],
            ])

            <div class="row mb-2">
                <label class="col-sm-3 fw-bold col-form-label">Método de Pago</label>
                <div class="col-sm-9">
                    <div class="form-check">
                        <input name="efectivo" class="form-check-input" type="checkbox" value="1" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            EFECTIVO
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="debito" class="form-check-input" type="checkbox" value="2" id="defaultCheck2">
                        <label class="form-check-label" for="defaultCheck2">
                            TARJETA DÉBITO
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="credito" class="form-check-input" type="checkbox" value="3" id="defaultCheck3">
                        <label class="form-check-label" for="defaultCheck3">
                            TARJETA CRÉDITO
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="cheque" class="form-check-input" type="checkbox" value="4" id="defaultCheck4">
                        <label class="form-check-label" for="defaultCheck4">
                            CHEQUE
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="transferencia" class="form-check-input" type="checkbox" value="5" id="defaultCheck5">
                        <label class="form-check-label" for="defaultCheck5">
                            TRANSFERENCIA
                        </label>
                    </div>
                    @isset($error_metodo_pago)
                        <div class="form-check">

                            <label class="form-check-label text-danger fs-6" for="defaultCheck01">
                                {{ $error_metodo_pago }}
                            </label>
                        </div>
                    @endisset
                </div>
            </div>


            {{-- 'EFECTIVO', 'TARJETA DÉBITO', 'TARJETA CRÉDITO', 'CHEQUE', 'TRANSFERENCIA' --}}

            <div style="height: 10px"></div>
            <div class="d-flex justify-content-between align-items-center">
                <label for="" class="fst-italic">Verifique que sus datos sean correctos</label>
                <div style="width: 10px; "></div>
                <div class="d-flex">
                    <a href="{{ route('facturacion.view') }}" class="btn btn-secondary">Cancelar</a>
                    <div style="width: 10px"></div>
                    <button type="submit" class="btn btn-primary text-white px-4 py-2">Generar</button>
                </div>
            </div>
        </form>
    </div>
@endsection
