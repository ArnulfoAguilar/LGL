<?php

use Illuminate\Database\Seeder;
use App\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Cliente::class, 20)->create();

     //    Cliente::create([
     //    'nombre' => 'Cliente 1',
     //    'telefonoPrincipal' => '22222222',
     //    'telefonoSecundario' => '77777777',
     //    'contacto' => 'Cliente 1',
     //    'direccion' => 'Direccion cliente 1',
    	// ]);

     //    Cliente::create([
     //    'nombre' => 'Cliente 2',
     //    'telefonoPrincipal' => '22222222',
     //    'telefonoSecundario' => '77777777',
     //    'contacto' => 'Cliente 2',
     //    'direccion' => 'Direccion cliente 2',
     //    ]);

     //    Cliente::create([
     //    'nombre' => 'Cliente 3',
     //    'telefonoPrincipal' => '22222222',
     //    'telefonoSecundario' => '77777777',
     //    'contacto' => 'Cliente 3',
     //    'direccion' => 'Direccion cliente 3',
     //    ]);

     //    Cliente::create([
     //    'nombre' => 'Cliente 4',
     //    'telefonoPrincipal' => '22222222',
     //    'telefonoSecundario' => '77777777',
     //    'contacto' => 'Cliente 4',
     //    'direccion' => 'Direccion cliente 4',
     //    ]);
    }
}
