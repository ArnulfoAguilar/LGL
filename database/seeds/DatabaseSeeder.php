<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(TipoProductosSeeder::class);
        $this->call(UnidadMedidasSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(ProductosSeeder::class);
        // $this->call(MovimientosSeeder::class);
        $this->call(KardexsSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(ProveedorSeeder::class);
        // $this->call(EntradaSeeder::class);
        // $this->call(SalidaSeeder::class);
    }
}
