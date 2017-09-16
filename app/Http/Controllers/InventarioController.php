<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Movimiento;

class InventarioController extends Controller
{
    public function Inventario()
    {
    	$productos = Producto::all();
    	foreach ($productos as $producto) {
    		$producto->porcentajeStock = ($producto->cantidad) / ($producto->existenciaMax - $producto->existenciaMin) * 100;
    	}
    	// dd($productos);
    	return view('inventario.inventariogeneral')->with(['productos' => $productos]);
    }

    public function KardexProducto(Request $request)
    {
        $producto = Producto::find($request->id);
    	$movimientos = Movimiento::where('producto_id', $request->id)->get();
    	foreach ($movimientos as $movimiento) {
            if ($movimiento->entrada != null) {
                $movimiento->entrada->valorTotal = $movimiento->entrada->cantidad * $movimiento->entrada->valorUnitario;
            }
            if ($movimiento->salida != null) {
                $movimiento->salida->valorTotal = $movimiento->salida->cantidad * $movimiento->salida->valorUnitario;
            }
    		$movimiento->valorTotalExistencia = $movimiento->cantidadExistencia * $movimiento->valorUnitarioExistencia;
    	}
    	return view('inventario.kardex')->with(['movimientos' => $movimientos])->with(['producto' => $producto]);	
    }
}
