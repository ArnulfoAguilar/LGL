<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Movimiento;
use App\Kardex;

class InventarioController extends Controller
{
    public function Inventario()
    {
    	$productos = Producto::all();
    	foreach ($productos as $producto) {
    		$producto->porcentajeStock = abs(($producto->kardex->cantidadActual) / ($producto->existenciaMax - $producto->existenciaMin) * 100);
    	}
    	// dd($productos);
    	return view('inventario.inventariogeneral')->with(['productos' => $productos]);
    }

    public function KardexProducto(Request $request)
    {
        $kardex = Kardex::where('producto_id',$request->id)->first();
    	$movimientos = Movimiento::where('kardex_id', $kardex->id)->get();
    	// foreach ($movimientos as $movimiento) {
     //        if ($movimiento->entrada != null) {
     //            $movimiento->entrada->valorTotal = $movimiento->entrada->cantidad * $movimiento->entrada->valorUnitario;
     //        }
     //        if ($movimiento->salida != null) {
     //            $movimiento->salida->valorTotal = $movimiento->salida->cantidad * $movimiento->salida->valorUnitario;
     //        }
    	// 	$movimiento->valorTotalExistencia = $movimiento->cantidadExistencia * $movimiento->valorUnitarioExistencia;
    	// }
    	return view('inventario.kardex')->with(['movimientos' => $movimientos])->with(['kardex' => $kardex]);	
    }
}
