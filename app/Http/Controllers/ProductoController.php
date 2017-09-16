<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\TipoProducto;
use App\UnidadMedida;
use App\Http\Requests\ProductoNuevoRequest;
use App\Http\Requests\ProductoEditarRequest;

class ProductoController extends Controller
{
    public function ProductoLista()
    {
    	$productos = Producto::all();
    	return view('producto.productoLista')->with(['productos' => $productos]);
    }

    public function ProductoNuevo()
    {
        $tipoProductos = TipoProducto::all();
        $unidadMedidas = UnidadMedida::all();
    	return view('producto.productoNuevo')->with(['tipoProductos' => $tipoProductos])->with(['unidadMedidas' => $unidadMedidas]);
    }

    public function ProductoNuevoPost(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'tipoProducto_id' => 'required',
            'unidadMedida_id' => 'required',
            'existenciaMin' => 'numeric|nullable',
            'existenciaMax' => 'numeric|nullable',
        ]);

    	$producto = Producto::create($request->only('nombre','tipoProducto_id','unidadMedida_id','existenciaMin','existenciaMax'));
    	$producto->codigo = $producto->TipoProducto->codigo . $producto->id;
    	$producto->update();
    	session()->flash('message.level', 'success');
    	session()->flash('message.content', 'El producto fue agregado!');
    	return redirect()->route('productoLista');
    }

    public function ProductoEditar(Request $request)
    {
    	$tipoProductos = TipoProducto::all();
        $unidadMedidas = UnidadMedida::all();
        $producto = Producto::find($request->id);
    	return view('producto.productoEditar')->with(['tipoProductos' => $tipoProductos])->with(['unidadMedidas' => $unidadMedidas])->with(['producto' => $producto]);
    }

    public function ProductoEditarPut(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'tipoProducto_id' => 'required',
            'unidadMedida_id' => 'required',
            'existenciaMin' => 'numeric|nullable',
            'existenciaMax' => 'numeric|nullable',
        ]);

    	$producto = Producto::find($request->id);
    	$producto->update($request->only('nombre','tipoProducto_id','unidadMedida_id','cantidad','valorUnitario','existenciaMin','existenciaMax'));
    	$producto->codigo = $producto->TipoProducto->codigo . $producto->id;
    	$producto->save();
    	session()->flash('message.level', 'success');
    	session()->flash('message.content', 'El producto fue actualizado!');
    	return redirect()->route('productoLista');
    }

    public function ProductoEliminar(Request $request)
    {
    	$producto = Producto::find($request->id);
    	$producto->delete();
    	session()->flash('message.level', 'success');
    	session()->flash('message.content', 'El producto fue eliminado!');
    	return redirect()->route('productoLista');
    }
}
