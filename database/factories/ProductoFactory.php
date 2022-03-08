<?php

namespace Database\Factories;

use App\Models\Familia;
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
            'nombre'=>$this->faker->word(),
            'descripcion'=>$this->faker->sentence(),
            'precio'=>$this->faker->numberBetween(1,1000),
            'familia_id'=>function(){
                return Familia::factory()->create()->id;
            },
        ];
    }
}
