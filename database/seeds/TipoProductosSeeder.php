<?php

use Illuminate\Database\Seeder;
use App\TipoProducto;

class TipoProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoProducto::create(['tipo' => 'Materia prima', 'codigo' => 'MP',]);
        TipoProducto::create(['tipo' => 'Producto terminado', 'codigo' => 'PT',]);
        TipoProducto::create(['tipo' => 'Reventa', 'codigo' => 'RV',]);
    }
}
