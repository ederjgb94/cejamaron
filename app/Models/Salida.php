<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_sucursal_origen',
        'id_sucursal_destino',
        'productos',
        'folio',
        'fecha_salida',
        'usuario_id',
        'total_importe',
    ];
}
