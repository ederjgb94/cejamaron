<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corte extends Model
{
    use HasFactory;

    protected $fillable = [
        'fondo_apertura',
        'total_efectivo',
        'folio_corte',
        'total_tarjetas_debito',
        'total_tarjetas_credito',
        'total_cheques',
        'total_transferencias',
        'efectivo_apartados',
        'efectivo_creditos',
        'gastos',
        'ingresos',
        'sobrante',
        'fecha_apertura_caja',
        'fecha_corte_caja',
        'sucursal_id',
        'usuario_id',
    ];

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
