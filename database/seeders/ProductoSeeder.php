<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productos = Producto::all();
        $productos->each(function ($productoUp, $key) {
            $productoUp->menudeo = $productoUp->menudeo + 1;
            $productoUp->save();
        });
    }
}
