<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperacionProducto extends Model
{
    use HasFactory;

    protected $fillable = [
        'accion',
        'confirmar',
        'producto_id',
        'usuario_id',
    ];
}
