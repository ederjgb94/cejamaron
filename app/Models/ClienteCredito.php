<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteCredito extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'rfc',
        'numero_exterior',
        'numero_interior',
        'calle',
        'colonia',
        'ciudad',
        'codigo_postal',
        'telefono',
        'correo',
    ];
}
