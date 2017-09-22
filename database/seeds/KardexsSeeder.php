    <?php

use Illuminate\Database\Seeder;
use App\Kardex;
use App\Producto;

class KardexsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productos = Producto::all();
        foreach ($productos as $producto) {
            Kardex::create(['producto_id' => $producto->id]);
        }
    }
}
