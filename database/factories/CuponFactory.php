<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CuponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codigo' => 'CEJA-'.strtoupper(Str::random(4)),
            'descuento'=> $this->faker->randomFloat(2,0,100),
            'descuento_maximo' => $this->faker->randomFloat(2,200,1000),
            'monto_minimo' => $this->faker->randomFloat(2,0,500),
            'fecha_expiracion' => $this->faker->date(),
            'sucursales' => json_encode(
                [
                    $this->faker->randomNumber(1),
                    $this->faker->randomNumber(1),
                    $this->faker->randomNumber(1),
                    $this->faker->randomNumber(1),
                ],
            ),
            'es_porcentaje' => $this->faker->boolean(),
            'usuario_id' => ($this->faker->randomDigit() + 1),
        ];
    }
}
