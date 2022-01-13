<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Requests\ActivoRequest;
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
        $paginador = Usuario::orderBy('created_at', 'desc')->Paginate(5);
        return jsend_success([
            'paginas' => $paginador->lastPage(),
            'usuarios' =>  $paginador->items(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Usuario::create($request->all());
        $this->sincronizarFirebase();
        return jsend_success();
    }

    public function login(Request $request)
    {
        $usuario = Usuario::where('usuario', '=', $request->usuario)
            ->where('clave', '=', $request->clave)->first();
        return $usuario ? 
        jsend_success() : jsend_fail([
            'message'=>'Cuenta invalida',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        return jsend_success(
            ['usuario'=>$usuario]
        );
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
        return jsend_success();
    }

    public function desactivar(ActivoRequest $request, Usuario $usuario)
    {
        $usuario->activo = false;
        $usuario->save();
        $this->sincronizarFirebase();
        return jsend_success();
    }

    public function activar(ActivoRequest $request, Usuario $usuario)
    {
        $usuario->activo  = true;
        $usuario->save();
        $this->sincronizarFirebase();
        return jsend_success();
    }

    public function sincronizar(Request $request)
    {
        $fecha_de_actualizacion = $request->fecha_de_actualizacion;
        $usuarios =  Usuario::where('updated_at', '>', $fecha_de_actualizacion)->get();

        return jsend_success([
            'usuarios' => $usuarios,
        ],);
    }
}
