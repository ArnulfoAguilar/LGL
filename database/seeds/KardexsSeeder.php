<?php

use Illuminate\Database\Seeder;
use App\Kardex;

class KardexsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kardex::create([
        'producto_id' => '1', 
        'metodo' => 'Costo Promedio',
    	]);
    }
}
