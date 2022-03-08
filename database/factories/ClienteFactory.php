<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nif'=>$this->faker->numerify('#########'),
            'nombre'=>$this->faker->word(),
            'direccion'=>$this->faker->sentence(),
            'poblacion'=>$this->faker->word(),
            'provincia'=>$this->faker->word(),
            'cod_postal'=>$this->faker->numerify('#####'),
            'email'=>$this->faker->safeEmail(),
            'telefono'=>$this->faker->phoneNumber(),
        ];
    }
}
