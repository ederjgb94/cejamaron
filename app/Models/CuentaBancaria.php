<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuentaBancaria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'telefono',
        'cuenta',
        'tarjeta',
        'clave_interbancaria',
        'tipo_cuenta',
        'banco',
        'descripcion',
        'proveedor_id',
    ];

    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }
}
