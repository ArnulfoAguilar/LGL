<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\TipoProducto;
use App\UnidadMedida;
use App\Http\Requests\ProductoNuevoRequest;
use App\Http\Requests\ProductoEditarRequest;
use App\Categoria;
use App\Kardex;

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
        $categorias = Categoria::all();
    	return view('producto.productoNuevo')->with(['tipoProductos' => $tipoProductos])->with(['unidadMedidas' => $unidadMedidas])->with(['categorias' => $categorias]);
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

        if (Producto::where('nombre',$request->nombre)->first() != null) {
            $request->flash();
            session()->flash('message.level', 'danger');
            session()->flash('message.content', 'El producto con ese nombre ya existe!');
            return redirect()->route('productoNuevo');
        }

    	$producto = Producto::create($request->only('nombre','tipoProducto_id','unidadMedida_id','categoria_id','existenciaMin','existenciaMax'));
    	$producto->codigo = $producto->TipoProducto->codigo . $producto->id;
    	$producto->update();
        Kardex::create(['producto_id' => $producto->id]);
    	session()->flash('message.level', 'success');
    	session()->flash('message.content', 'El producto fue agregado!');
    	return redirect()->route('productoLista');
    }

    public function ProductoEditar(Request $request)
    {
    	$tipoProductos = TipoProducto::all();
        $unidadMedidas = UnidadMedida::all();
        $categorias = Categoria::all();
        $producto = Producto::find($request->id);
    	return view('producto.productoEditar')->with(['tipoProductos' => $tipoProductos])->with(['unidadMedidas' => $unidadMedidas])->with(['producto' => $producto])->with(['categorias' => $categorias]);
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
    	$producto->update($request->only('nombre','tipoProducto_id','unidadMedida_id','existenciaMin','existenciaMax'));
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
