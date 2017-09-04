<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Proveedor;

class MovimientoController extends Controller
{
    
    public function EntradaIndividual(Request $request)
    {
    	$productos = Producto::all();
    	$proveedores = Proveedor::all();
    	return view('movimientos.entradaindividual')->with(['productos' => $productos])->with(['proveedores' => $proveedores]);
    }

}
