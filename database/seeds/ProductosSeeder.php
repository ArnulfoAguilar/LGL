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
        factory(App\Producto::class, 50)->create();
        $productos = Producto::all();
        foreach ($productos as $producto) {
        	$producto->codigo = $producto->TipoProducto->codigo . $producto->id;
        	$producto->save();
        }
    }
}
