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
        'proveedor_id',
    ];

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }

    public function sucursal(){
        return $this->belongsTo(Sucursal::class);
    }

    public function productos(){
        return $this->belongsToMany(Producto::class)->withTimestamps()
        ->withPivot(['costo','cantidad']);
    }

    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }
}
