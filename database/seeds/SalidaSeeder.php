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
    	'cantidad' => '100',
    	'valorUnitario' => '1.4',
        'valorTotal' => '140',
    	'ordenPedido_id' => '1',
    	]);
    }
}
