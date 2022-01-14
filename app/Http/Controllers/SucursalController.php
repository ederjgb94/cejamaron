<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivoRequest;
use App\Models\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return jsend_success(
            ['sucursales' => Sucursal::orderBy('id', 'desc')
                ->paginate(10)]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $codigo = '';
        do {
            $codigo = strtoupper(Str::random(4));
        } while (Sucursal::where('codigo_remoto', $codigo)->exists());
        $request->merge(['codigo_remoto' => $codigo]);
        Sucursal::create($request->all());
        $this->sincronizarFirebase();
        return jsend_success();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function show(Sucursal $sucursal)
    {
        return jsend_success(
            ['sucursal' => $sucursal]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sucursal $sucursal)
    {
        $sucursal->update($request->all());
        $this->sincronizarFirebase();
        return jsend_success();
    }

    public function activar(ActivoRequest $request, Sucursal $sucursal)
    {
        $sucursal->activo = true;
        $this->sincronizarFirebase();
        return jsend_success();
    }

    public function desactivar(ActivoRequest $request, Sucursal $sucursal)
    {
        $sucursal->activo = false;
        $this->sincronizarFirebase();
        return jsend_success();
    }

    public function sincronizar(Request $request)
    {
        $fecha_de_actualizacion = $request->fecha_de_actualizacion;
        $sucursales =  Sucursal::where('updated_at', '>', $fecha_de_actualizacion)->get();

        return jsend_success([
            'sucursales' => $sucursales,
        ],);
    }
}
