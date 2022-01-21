<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;

    protected $fillable = [
        'puerta_enlace1',
        'puerta_enlace2',
        'puerta_enlace3',
        'puerta_enlace4',
        'codigo_remoto',
        'razon_social',
        'correo',
    ];

    public function usuarios(){
        return $this->belongsToMany(Usuario::class)->withTimestamps();
    }

    public function productos(){
        return $this->belongsToMany(Producto::class)->withTimestamps()
        ->withPivot(['cantidad']);
    }

    public function entradas(){
        return $this->hasMany(Entrada::class);
    }
}
