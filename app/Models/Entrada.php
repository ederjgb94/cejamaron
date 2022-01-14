<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    protected $fillable = [
        'folio_factura',
        'total_factura',
        'fecha_factura',
        'usuario_id',
        'sucursal_id',
    ];

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }

    public function sucursal(){
        return $this->belongsTo(Sucursal::class);
    }
}
