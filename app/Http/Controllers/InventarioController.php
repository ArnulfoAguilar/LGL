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
    		$producto->porcentajeStock = ($producto->cantidad) / ($producto->existencia_max - $producto->existencia_min) * 100;
    	}
    	// dd($productos);
    	return view('inventario.inventariogeneral')->with(['productos' => $productos]);
    }

    public function KardexProducto(Request $request)
    {
    	$movimientos = Movimiento::where('producto_id', $request->id)->get();
    	foreach ($movimientos as $movimiento) {
    		$movimiento->valor_total = $movimiento->cantidad * $movimiento->valor_unitario;
    		$movimiento->valor_total_existencia = $movimiento->cantidad_existencia * $movimiento->valor_unitario_existencia;
    	}
    	return view('inventario.kardex')->with(['movimientos' => $movimientos]);	
    }
}
