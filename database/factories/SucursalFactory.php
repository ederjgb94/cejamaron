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
            'mac1'=>Str::random(5),
            'mac2'=>Str::random(5),
            'mac3'=>Str::random(5),
            'mac4'=>Str::random(5),
            'codigo_remoto'=>Str::random(5),
            'razon_social'=>$this->faker->name(),
            'correo'=>$this->faker->unique()->safeEmail(),
        ];
    }
}
