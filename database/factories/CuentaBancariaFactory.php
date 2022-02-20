<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CuentaBancariaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'proveedor_id' => 1,
        ];
    }
}
