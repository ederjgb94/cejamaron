<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'direccion',
        'correo',
        'telefono',
        'descripcion',
    ];

    public function cuentas_bancarias(){
        return $this->hasMany(CuentaBancaria::class);
    }

    public function entradas(){
        return $this->hasMany(Entrada::class);
    }
}
