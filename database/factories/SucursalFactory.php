<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SucursalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'puerta_enlace1'=>Str::random(5),
            'puerta_enlace2'=>Str::random(5),
            'puerta_enlace3'=>Str::random(5),
            'puerta_enlace4'=>Str::random(5),
            'codigo_remoto'=>strtoupper(Str::random(4)),
            'direccion'=>$this->faker->streetAddress(),
            'razon_social'=>$this->faker->name(),
            'correo'=>$this->faker->unique()->safeEmail(),
        ];
    }
}
