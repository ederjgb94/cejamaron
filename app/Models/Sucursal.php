<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;

    protected $fillable = [
        'mac1',
        'mac2',
        'mac3',
        'mac4',
        'codigo_remoto',
        'razon_social',
        'correo',
    ];

    public function usuarios(){
        return $this->belongsToMany(Usuario::class);
    }
}
