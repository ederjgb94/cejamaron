<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginador = Proveedor::orderBy('created_at', 'DESC')->paginate(5);
        return jsend_success([
            'paginas' => $paginador->lastPage(),
            'proovedores' => $paginador->items(),
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
        Proveedor::create($request->all());
        return jsend_success();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        return jsend_success([
            'proveedor'=>$proveedor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        $proveedor->update($request->all());
        return jsend_success();
    }

    public function agregar_cuenta_bancaria(Request $request, Proveedor $proveedor){
        $proveedor->cuentas_bancarias()->create($request->all());
        return jsend_success();
    }

}
