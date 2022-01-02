<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codigo' => $this->faker->randomNumber(5),
            'nombre' => $this->faker->text(60),
            'cantidad_mayoreo' => ($this->faker->randomDigit() + 1),
            'medida_id' => ($this->faker->randomDigit() + 1),
            'presentacion' => $this->faker->text(20),
            'categoria_id' => ($this->faker->randomDigit() + 1),
            'menudeo' => $this->faker->randomFloat(2, 1000, 10000),
        ];
    }
}
