<?php

use Illuminate\Database\Seeder;
use App\Salida;

class SalidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Salida::create([
        'movimiento_id' => '3',
    	'tipo' => 'Normal',
    	'cantidad' => '70',
    	'valor_unitario' => '1.2',
    	'cliente_id' => '1',
    	]);
    }
}
