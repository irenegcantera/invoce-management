<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FamiliaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=>$this->faker->word(),
            'descripcion'=>$this->faker->sentence()
        ];
    }
}
