<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProveedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=>$this->faker->name(),
            'direccion'=>$this->faker->streetAddress(),
            'correo'=>$this->faker->name(),
            'telefono'=>$this->faker->phoneNumber(),
        ];
    }
}
