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
        'detalle' => 'Inventario inicial de mes de agosto',
        'cantidadExistencia' => '100',
        'valorUnitarioExistencia' => '1.5',
    	]);

    	Movimiento::create([
        'producto_id' => '1',
        'detalle' => 'Compra #1 de mes de agosto',
        'cantidadExistencia' => '300',
        'valorUnitarioExistencia' => '1.4',
    	]);

    	Movimiento::create([
        'producto_id' => '1',
        'detalle' => 'Venta de Manguito S.A de C.V',
        'cantidadExistencia' => '200',
        'valorUnitarioExistencia' => '1.4',
    	]);

        Movimiento::create([
        'producto_id' => '1',
        'detalle' => 'Compra #2 de mes de agosto',
        'cantidadExistencia' => '500',
        'valorUnitarioExistencia' => '1.5',
        ]);
    }
}
