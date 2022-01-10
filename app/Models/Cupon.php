<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'descuento',
        'descuento_maximo',
        'monto_minimo',
        'fecha_expiracion',
        'usos',
        'sucursales',
        'es_porcentaje',
        'usuario_id',
    ];
}
