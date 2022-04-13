@extends('layout')

@section('content')
    <div style="height: 100vh;" class="d-flex flex-column text-center justify-content-center">
        <h2>Facturación - Papelería</h2>
        <h6>Benvenido, aquí puedes generar tu facturación, favor de proporcionar tus datos.</h6>
        <div style="height: 40px"></div>

        <h6 class="fw-bold">Registro Federal de Contribuyentes (RFC)</h6>
        <div style="width:400px;" class="align-self-center">
            <form action="{{ route('buscar_rfc') }}" method="POST">
                @csrf
                <input required name="rfc" type="text" class="form-control text-center" placeholder="0000xxxx0000" value=""
                    style="text-transform: uppercase;">
                <div style="height: 20px;"></div>
                <button type="submit" class="btn btn-danger px-5">Aceptar</button>
            </form>
        </div>

    </div>
@endsection
