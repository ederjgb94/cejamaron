<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbonoApartado extends Model
{
    use HasFactory;

    protected $fillable = [
        'folio',
        'metodo_pago',
        'total_abonado',
        'fecha',
        'apartado_id',
        'folio_corte',
        'usuario_id',
    ];

    public function abonos()
    {
        return $this->belongsTo(Apartado::class);
    }
}
