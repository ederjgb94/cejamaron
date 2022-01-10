<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'correo',
        'telefono',
        'imagen',
        'usuario',
        'clave',
        'activo'
    ];

    public function sucursales(){
        return $this->belongsToMany(Sucursal::class);
    }
}
