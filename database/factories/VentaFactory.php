<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VentaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'total' => $this->faker->randomFloat(2, 10, 1000),
            'folio' => Str::random(17),
            'fecha_venta' => $this->faker->date(),
            'metodo_pago' => random_int(1, 3),
            'sucursal_id' => random_int(1, 3),
            'tipo' => random_int(1, 3),
        ];
    }
}
