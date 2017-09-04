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
    	'valor_unitario' => '1.3',
    	'proveedor_id' => '1',
    	]);

    	Entrada::create([
        'movimiento_id' => '2',
    	'tipo' => 'Normal',
    	'cantidad' => '150',
    	'valor_unitario' => '1.1',
    	'proveedor_id' => '1',
    	]);

    	Entrada::create([
        'movimiento_id' => '4',
    	'tipo' => 'Normal',
    	'cantidad' => '50',
    	'valor_unitario' => '1.3',
    	'proveedor_id' => '1',
    	]);
    }
}
