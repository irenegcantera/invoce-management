<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Factura;
use App\Models\Producto;

class LineaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'producto'=>$this->faker->sentence(),
            'cantidad'=>$this->faker->numberBetween(1,10),
            'precio'=>$this->faker->numberBetween(1,10000),
            'factura_numero'=>function(){
                return Factura::factory()->create()->numero;
            },
            'producto_id'=>function(){
                return Producto::factory()->create()->id;
            },
            
        ];
    }
}
