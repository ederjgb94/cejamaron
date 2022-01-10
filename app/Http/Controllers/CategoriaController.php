<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return jsend_success(['categorias'=>Categoria::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Categoria::create($request->all());
        $this->sincronizarFirebase();
        return jsend_success();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        return jsend_success(['categoria'=>$categoria]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        $categoria->update($request->all());
        $this->sincronizarFirebase();
        return jsend_success();
    }

    public function desactivar(Categoria $categoria)
    {
        $categoria->activo = false;
        $categoria->save();
        $this->sincronizarFirebase();
        return jsend_success();
    }

    public function activar(Categoria $categoria)
    {
        $categoria->activo = true;
        $categoria->save();
        $this->sincronizarFirebase();
        return jsend_success();
    }
}
