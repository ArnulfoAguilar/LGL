<?php

use Illuminate\Database\Seeder;
use App\Proveedor;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proveedor::create([
        'nombre' => 'Proveedor 1',
        'telefono_principal' => '22222222',
        'telefono_secundario' => '77777777',
        'contacto' => 'Jose Perez',
        'direccion' => 'Direccion proveedor 1',
    	]);
    }
}
