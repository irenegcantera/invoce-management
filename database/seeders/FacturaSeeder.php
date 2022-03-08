<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Factura;
use App\Models\Linea;

class FacturaSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    
        Factura::factory(20)->create();
        $facturas=Factura::all('numero');
        for ($i = 0; $i < 150; $i++){
            Linea::factory(1)->create(['factura_numero'=>$facturas[random_int(0,19)]]);
        }        
      
    }
}

?>