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
        'nombre' => 'Leche SULA', 
        'codigo' => 'RV01',
        'unidadMedida_id' => '1',
        'tipoProducto_id' => '3',
        'cantidad' => '100',
        'valor_unitario' => '1.5',
        'valor_total' => '150.0',
        'existencia_min' => '20',
        'existencia_max' => '1000',
    	]);

        Producto::create([
        'nombre' => 'Esensia Vainilla', 
        'codigo' => 'MP01',
        'unidadMedida_id' => '5',
        'tipoProducto_id' => '1',
        'cantidad' => '50',
        'valor_unitario' => '1.0',
        'valor_total' => '50.0',
        'existencia_min' => '10',
        'existencia_max' => '100',
    	]);
    }
}
