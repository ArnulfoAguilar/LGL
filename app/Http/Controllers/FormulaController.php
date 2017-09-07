<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UnidadMedida;
use App\Producto;

class FormulaController extends Controller
{
    
	public function FormulaLista()
	{
		return view('formula.formulaLista');
	}

	public function FormulaNueva()
	{
		$unidadMedidas = UnidadMedida::all();
		$productos = Producto::all();
		return view('formula.formulaNueva')->with(['unidadMedidas' => $unidadMedidas])->with(['productos' => $productos]);
	}

}
