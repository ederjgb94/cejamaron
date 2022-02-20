<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'total',
        'folio',
        'folio_corte',
        'fecha_venta',
        'metodo_pago',
        'tipo',
        'sucursal_id',
        'usuario_id',
    ];

    public function productos()
    {
        return $this->belongsToMany(Producto::class)
            ->withTimestamps()
            ->withPivot(['cantidad', 'precio_venta']);
    }
}
