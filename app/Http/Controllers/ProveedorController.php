<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;

class ProveedorController extends Controller
{
    public function ProveedorLista()
    {
    	$proveedores = Proveedor::all();
    	return view('proveedor.proveedorLista')->with(['proveedores' => $proveedores]);
    }

    public function ProveedorNuevo(Request $request)
    {
    	return view('proveedor.proveedorNuevo');
    }

    public function ProveedorNuevoPost(Request $request)
    {
    	Proveedor::create($request->only('nombre','contacto','direccion','telefono_principal','telefono_secundario'));
    	session()->flash('message.level', 'success');
    	session()->flash('message.content', 'El proveedor fue agregado!');
    	return redirect()->route('proveedorLista');
    }

    public function ProveedorEditar(Request $request)
    {
        $proveedor = Proveedor::find($request->id);
        return view('proveedor.proveedorEditar')->with(['proveedor' => $proveedor]);
    }

    public function ProveedorEditarPut(Request $request)
    {
        $proveedor = Proveedor::find($request->id);
        $proveedor->update($request->only('nombre','contacto','direccion','telefono_principal','telefono_secundario'));
        session()->flash('message.level', 'success');
        session()->flash('message.content', 'El proveedor fue actualizado!');
        return redirect()->route('proveedorLista');
    }

    public function ProveedorEliminar(Request $request)
    {
        $proveedor = Proveedor::find($request->id);
        $proveedor->delete();
        session()->flash('message.level', 'success');
        session()->flash('message.content', 'El proveedor fue eliminado!');
        return redirect()->route('proveedorLista');
    }
}
