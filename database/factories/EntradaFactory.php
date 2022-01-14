<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EntradaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'folio_factura'=>Str::random(17),
            'total_factura'=>$this->faker->randomFloat(2,10,10000),
            'fecha_factura'=>$this->faker->date(),
            'usuario_id'=>($this->faker->randomDigit() + 1),
            'sucursal_id'=>($this->faker->randomDigit() + 1),
        ];
    }
}
