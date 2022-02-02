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
        'usuario',
        'clave',
        'activo',
        'es_raiz'
    ];

    public function sucursals(){
        return $this->belongsToMany(Sucursal::class)->withTimestamps();
    }

    public function cupons(){
        return $this->hasMany(Cupon::class);
    }
}
