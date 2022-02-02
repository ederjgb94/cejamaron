<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use App\Models\Usuario;
use Illuminate\Http\Request;

class SucursalUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Sucursal $sucursal)
    {
        $paginador = $sucursal->usuarios()->orderBy('nombre', 'asc')->paginate(10);
        return jsend_success([
            'paginas' => $paginador->lastPage(),
            'sucursales' =>  $paginador->items(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Sucursal $sucursal, Usuario $usuario, Request $request)
    {
        $sucursal->usuarios()->syncWithoutDetaching($usuario);
        //falta guardar usuario quien habilito 
        return jsend_success();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sucursal $sucursal, Usuario $usuario, Request $request)
    {
        $sucursal->usuarios()->detach($usuario);
        return jsend_success();
    }

    public function sincronizar_existencias(Request $request, Usuario $usuario)
    {
        $fecha_de_actualizacion = $request->fecha_de_actualizacion;
        $sucursales = $usuario->sucursals()->get();
        $salida = [];
        foreach ($sucursales as $sucursal) {
            $sucursal = Sucursal::find($sucursal->id);
            $productos = $sucursal->productos;
            array_push($salida, $productos->pluck('pivot'));
        }
        return jsend_success([
            "existencias" => $salida,
        ]);
    }
}
