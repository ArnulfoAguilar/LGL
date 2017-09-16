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
        'telefonoPrincipal' => '22222222',
        'telefonoSecundario' => '77777777',
        'contacto' => 'Contacto 1',
        'direccion' => 'Direccion proveedor 1',
    	]);

        Proveedor::create([
        'nombre' => 'Proveedor 2',
        'telefonoPrincipal' => '22222222',
        'telefonoSecundario' => '77777777',
        'contacto' => 'Contacto 2',
        'direccion' => 'Direccion proveedor 2',
        ]);

        Proveedor::create([
        'nombre' => 'Proveedor 3',
        'telefonoPrincipal' => '22222222',
        'telefonoSecundario' => '77777777',
        'contacto' => 'Contacto 3',
        'direccion' => 'Direccion proveedor 3',
        ]);

        Proveedor::create([
        'nombre' => 'Proveedor 4',
        'telefonoPrincipal' => '22222222',
        'telefonoSecundario' => '77777777',
        'contacto' => 'Contacto 4',
        'direccion' => 'Direccion proveedor 4',
        ]);
    }
}
