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
        Cliente::create([
        'nombre' => 'Cliente 1',
        'telefono_principal' => '22222222',
        'telefono_secundario' => '77777777',
        'contacto' => 'Juan Perez',
        'direccion' => 'Direccion cliente 1',
    	]);
    }
}
