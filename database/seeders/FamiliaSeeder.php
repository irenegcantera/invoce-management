<?php

namespace Database\Seeders;

use App\Models\Familia;
use App\Models\Producto;
use Illuminate\Database\Seeder;

class FamiliaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Familia::factory(15)->create();
        $familias=Familia::all('id');
        for ($i = 0; $i < 25; $i++){
            Producto::factory(1)->create(['familia_id'=>$familias[random_int(0,14)]]);
        }
    }
}
