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
        $this->validate($request, [
            'nombre' => 'required',
            'telefonoPrincipal' => 'min:8',
            'telefonoSecundario' => 'min:8|nullable',
        ]);

    	Proveedor::create($request->only('nombre','contacto','direccion','telefonoPrincipal','telefonoSecundario'));
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
        $this->validate($request, [
            'nombre' => 'required',
            'telefonoPrincipal' => 'min:8',
            'telefonoSecundario' => 'min:8|nullable',
        ]);

        $proveedor = Proveedor::find($request->id);
        $proveedor->update($request->only('nombre','contacto','direccion','telefonoPrincipal','telefonoSecundario'));
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
