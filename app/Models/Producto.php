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

    public function medida(){
        return $this->belongsTo(Medida::class);
    }
}
