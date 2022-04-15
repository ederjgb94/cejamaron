@extends('layout')

@section('content')
    <div style="height: 100vh;" class="d-flex flex-column text-center justify-content-center">
        <img class="img-fluid align-self-center" height="400" width="400" src="{{ asset('images/undraw.svg') }}" alt="">

        <div style="height: 20px"></div>
        <p class="fw-light">
            Su registro se envió correctamente. Para alguna aclaración o comentario envía al correo:<br>
            <a href="/facturacion">cm-papeleria@clientes.com</a>
        </p>
        <div style="width: 200px" class="align-self-center">

            <a href="/facturacion" class="btn btn-danger fw-light">Inicio</a>
        </div>
    </div>
@endsection
