<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Usuario::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checarUsuarioCorreo = Usuario::where('usuario', '=', $request->usuario)
            ->where('correo', '=', $request->correo)->first();
        if ($checarUsuarioCorreo) return response('Correo o Usario en uso', 400);
        $usuario = new Usuario();
        $usuario->create($request->all());
        $this->sincronizarFirebase();
    }

    public function login(Request $request)
    {
        $usuario = Usuario::where('usuario', '=', $request->usuario)
            ->where('clave', '=', $request->clave)->first();
        return $usuario ? $usuario : [];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        return $usuario;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        $usuario->update($request->all());
        $this->sincronizarFirebase();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
    }

    public function disable(Usuario $usuario)
    {
        $usuario->activo = false;
        $usuario->save();
        $this->sincronizarFirebase();
    }

    public function activate(Usuario $usuario)
    {
        $usuario->activo  = true;
        $usuario->save();
        $this->sincronizarFirebase();
    }
}
