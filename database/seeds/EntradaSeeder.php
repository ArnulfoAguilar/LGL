<?php

use Illuminate\Database\Seeder;
use App\Entrada;

class EntradaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Entrada::create([
        'movimiento_id' => '1',
    	'tipo' => 'Inicio',
    	'cantidad' => '100',
    	'valorUnitario' => '1.5',
        'valorTotal' => '150',
    	'factura_id' => '1',
    	]);

    	Entrada::create([
        'movimiento_id' => '2',
    	'tipo' => 'Normal',
    	'cantidad' => '200',
    	'valorUnitario' => '1.3',
        'valorTotal' => '260',
    	'factura_id' => '2',
    	]);

    	Entrada::create([
        'movimiento_id' => '4',
    	'tipo' => 'Normal',
    	'cantidad' => '500',
    	'valorUnitario' => '1.6',
        'valorTotal' => '800',
    	'factura_id' => '3',
    	]);
    }
}
