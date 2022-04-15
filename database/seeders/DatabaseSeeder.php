<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\models\Medida;
use App\models\Categoria;
use App\models\Producto;
use App\models\Usuario;
use App\models\Cupon;
use App\Models\Entrada;
use App\Models\Sucursal;
use App\Models\Venta;
use App\Models\Proveedor;
use App\Models\Corte;
use App\Models\CuentaBancaria;

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
        Producto::factory()->count(100)->create();
        Cupon::factory()->count(10)->create();
        Sucursal::factory()->count(10)->create();
        for ($i = 1; $i < 4; $i++) {
            $sucursal = Sucursal::find($i);
            for ($j = 1; $j < 4; $j++) {
                $usuario = Usuario::find($j);
                $sucursal->usuarios()->attach($usuario);
            }
        }
        $usuario_root = Usuario::find(1);
        $usuario_root->es_raiz = 0;
        $usuario_root->usuario = 'admin';
        $usuario_root->clave = '123';
        $usuario_root->save();

        for ($i = 0; $i < 8; $i++) {
            $venta = Venta::factory()->create();
            for ($j = 1; $j <= 3; $j++) {
                $producto = Producto::find($j);
                $venta->productos()->attach($producto, [
                    'cantidad' => random_int(1, 10),
                    'precio_venta' => $producto->menudeo,
                ]);
            }
        }
        $entrada = Entrada::factory()->create();
        $entrada->productos()->attach(1, ['costo' => 10, 'cantidad' => 2]);
        $sucursal = $entrada->sucursal;
        $sucursal->productos()->attach(1, ['cantidad' => 2]);

        $entrada = Entrada::factory()->create();
        $entrada->productos()->attach(2, ['costo' => 3, 'cantidad' => 33]);
        $sucursal = $entrada->sucursal;
        $sucursal->productos()->attach(2, ['cantidad' => 33]);
        $sucursal->productos()->attach(4, ['cantidad' => 12]);
        $sucursal->productos()->attach(5, ['cantidad' => 55]);

        Proveedor::factory(10)->create();
        CuentaBancaria::factory(3)->create();
    }
}
