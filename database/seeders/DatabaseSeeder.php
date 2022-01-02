<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\models\Medida;
use App\models\Categoria;
use App\models\Producto;
use App\models\Usuario;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Medida::factory()->count(10)->create();
        Categoria::factory()->count(10)->create();
        Usuario::factory()->count(10)->create();
        Producto::factory()->count(20)->create();
    }
}
