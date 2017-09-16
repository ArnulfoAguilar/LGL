<?php

use Illuminate\Database\Seeder;
use App\Producto;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
        'nombre' => 'Producto 1', 
        'codigo' => 'RV1',
        'unidadMedida_id' => '1',
        'tipoProducto_id' => '3',
        'cantidad' => '500',
        'valorUnitario' => '1.5',
        'valorTotal' => '750',
        'existenciaMin' => '20',
        'existenciaMax' => '1000',
    	]);

        Producto::create([
        'nombre' => 'Producto 2', 
        'codigo' => 'MP1',
        'unidadMedida_id' => '5',
        'tipoProducto_id' => '1',
        'cantidad' => '0',
        'valorUnitario' => '0',
        'valorTotal' => '0',
        'existenciaMin' => '10',
        'existenciaMax' => '100',
    	]);
    }
}
