<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'telefono',
        'correo',
        'id_cajero_registro',
        'id_cajero_entrega',
        'productos',
        'total',
        'total_pagado',
        'metodo_pago',
        'fecha_de_apartado',
        'dias_maximo',
        'folio',
        'fecha_entrega',
        'estado',
    ];
}
