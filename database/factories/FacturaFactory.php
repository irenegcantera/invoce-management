<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class FacturaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'numero'=>$this->faker->unique()->numberBetween(1,100),
            'nombre'=>$this->faker->sentence(),
            'direccion'=>$this->faker->sentence(),
            'poblacion'=>$this->faker->word(),
            'provincia'=>$this->faker->word(),
            'cpostal'=>$this->faker->numerify('#####'),
            'telefono'=>$this->faker->phoneNumber(),
            'fecha'=>$this->faker->date(),
            'cliente_id'=>function(){
                return Cliente::factory()->create()->id;
            }
        ];
    }
}
