<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo',
        'nombre',
        'presentacion',
        'iva',
        'menudeo',
        'mayoreo',
        'cantidad_mayoreo',
        'especial',
        'vendedor',
        'medida_id',
        'categoria_id',
    ];

    protected $hidden = [
        'pivot'
    ];

    public function medida()
    {
        return $this->belongsTo(Medida::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function ventas()
    {
        return $this->belongsToMany(Venta::class)
            ->withTimestamps()
            ->withPivot(['cantidad', 'precio_venta']);
    }

    public function sucursales(){
        return $this->belongsToMany(Sucursal::class)->withTimestamps()
        ->withPivot(['cantidad']);
    }

    public function entradas(){
        return $this->belongsToMany(Entrada::class)->withTimestamps()
        ->withPivot(['costo','cantidad']);
    }
}
