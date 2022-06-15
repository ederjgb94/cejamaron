<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_creditos_id',
        'id_cajero_registro',
        'productos',
        'total',
        'total_pagado',
        'fecha_de_credito',
        'folio',
        'sucursal_id',
        'estado',
        'observaciones',
    ];

    public function abonos()
    {
        return $this->hasMany(AbonoCredito::class);
    }
}
