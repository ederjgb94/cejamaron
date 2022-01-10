<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCuponRequest;
use App\Models\Cupon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CuponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginador = Cupon::orderBy('created_at', 'DESC')->paginate(5);
        return jsend_success([
            'paginas' => $paginador->lastPage(),
            'cupones' => $paginador->items(),
        ],);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCuponRequest $request)
    {
        if (!$request->filled('codigo')) {
            $codigo = '';
            do {
                $codigo = 'CEJA-' . strtoupper(Str::random(4));
            } while (Cupon::where('codigo', $codigo)->exists());
            $request->merge(['codigo' => $codigo]);
        }
        $cupon = Cupon::create($request->all());

        return jsend_success([
            'codigo' => $cupon->codigo,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cupon  $cupon
     * @return \Illuminate\Http\Response
     */
    public function show(Cupon $cupon)
    {
        return jsend_success(['cupon' => $cupon]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cupon  $cupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cupon $cupon)
    {
        $cupon->update($request->all());
        return jsend_success();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cupon  $cupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cupon $cupon)
    {
        $cupon->delete();
        return jsend_success(
            $cupon->codigo
        );
    }
}
