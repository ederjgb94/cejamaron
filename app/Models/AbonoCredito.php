<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbonoCredito extends Model
{
    use HasFactory;

    protected $fillable = [
        'folio',
        'metodo_pago',
        'total_abonado',
        'fecha',
        'clientes_creditos_id',
        'folio_corte',
        'usuario_id',
    ];
}
