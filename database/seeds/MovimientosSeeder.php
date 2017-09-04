<?php

use Illuminate\Database\Seeder;
use App\Movimiento;

class MovimientosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movimiento::create([
        'producto_id' => '1',
        'detalle' => 'Inventario inicial de mes de junio',
        'cantidad_existencia' => '100',
        'valor_unitario_existencia' => '1.3',
    	]);

    	Movimiento::create([
        'producto_id' => '1',
        'detalle' => 'Compra #2 de mes de junio',
        'cantidad_existencia' => '250',
        'valor_unitario_existencia' => '1.2',
    	]);

    	Movimiento::create([
        'producto_id' => '1',
        'detalle' => 'Venta de Manguito S.A de C.V',
        'cantidad_existencia' => '180',
        'valor_unitario_existencia' => '1.2',
    	]);

        Movimiento::create([
        'producto_id' => '1',
        'detalle' => 'Compra de mes de junio',
        'cantidad_existencia' => '230',
        'valor_unitario_existencia' => '1.25',
        ]);
    }
}
