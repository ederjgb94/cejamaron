<?php

namespace App\Http\Controllers;

use App\Models\Corte;
use Illuminate\Http\Request;

class CorteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginador = Corte::orderBy('id', 'desc')->Paginate(10);
        return jsend_success([
            'paginas' => $paginador->lastPage(),
            'cortes' =>  $paginador->items(),
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
        Corte::create($request->all());
        return jsend_success();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Corte  $corte
     * @return \Illuminate\Http\Response
     */
    public function show(Corte $corte)
    {
        return jsend_success(['corte'=>$corte]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Corte  $corte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Corte $corte)
    {
        $corte->update($request->all());
        return jsend_success();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Corte  $corte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Corte $corte)
    {
        //
    }
}
