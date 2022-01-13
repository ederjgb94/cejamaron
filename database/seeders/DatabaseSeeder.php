<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\models\Medida;
use App\models\Categoria;
use App\models\Producto;
use App\models\Usuario;
use App\models\Cupon;
use App\Models\Sucursal;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Usuario::factory()->count(10)->create();
        Medida::factory()->count(10)->create();
        Categoria::factory()->count(10)->create();
        Producto::factory()->count(20)->create();
        Cupon::factory()->count(10)->create();
        Sucursal::factory()->count(5)->create();
        for ($i=1; $i < 4; $i++) { 
            $sucursal = Sucursal::find($i);
            for ($j=1; $j < 4; $j++) {
                $usuario = Usuario::find($j);
                $sucursal->usuarios()->attach($usuario);
            }
        }
        $usuario_root = Usuario::find(1);
        $usuario_root->es_raiz = true;
        $usuario_root->usuario = 'admin';
        $usuario_root->clave = '123';
        $usuario_root->save();
    }
}
