<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Proveedor;
use App\Movimiento;
use App\Factura;
use App\Entrada;
use App\Kardex;
use App\OrdenPedido;
use App\Cliente;

class MovimientoController extends Controller
{
    public function FacturaLista()
    {
        $facturas = Factura::all();
        return view('movimientos.facturaLista')->with(['facturas' => $facturas]);
    }

    public function FacturaIngreso()
    {
        $productos = Producto::all();
        $proveedores = Proveedor::all();
    	return view('movimientos.facturaIngreso')->with(['productos' => $productos])->with(['proveedores' => $proveedores]);
    }

    public function FacturaIngresoPost(Request $request)
    {
        // Validacion 
        $this->validate($request, [
            'fechaIngreso' => 'required',
            'proveedor_id' => 'required',
            'productos_id.*' => 'required',
            'cantidades.*' => 'required',
            'valoresTotales.*' => 'required',
        ]);
        // Fin Validacion
        // dd($request);
        $factura = Factura::create($request->only('fechaIngreso','numero','proveedor_id','ingresadoPor'));
        $productos_id = $request->input('productos_id');
        $cantidades = $request->input('cantidades');
        $valoresTotales = $request->input('valoresTotales');
        $max = sizeof($productos_id);
        // dd($request);
        for ($i=0; $i < $max; $i++) { 
            $kardex = Kardex::where('producto_id', $productos_id[$i])->first();
            $movimiento = Movimiento::create([
                'kardex_id' => $kardex->id,
                'tipoMovimiento_id' => 1,
                'fechaIngreso' => $request->input('fechaIngreso'),
                'detalle' => 'Entrada de producto de factura numero '.$factura->numero,
            ]);
            $valorUnitario = $valoresTotales[$i] / $cantidades[$i];
            $entrada = Entrada::create([
                'movimiento_id' => $movimiento->id,
                'factura_id' => $factura->id,
                'cantidad' => $cantidades[$i],
                'valorTotal' => $valoresTotales[$i],
                'valorUnitario' => $valorUnitario,
            ]);
            $cantidadExistencia = $kardex->cantidadActual + $entrada->cantidad;
            if ($kardex->valorUnitarioActual != null) {
                $valorUnitarioExistencia = ($kardex->valorUnitarioActual + $entrada->valorUnitario) / 2;
            } else {
                $valorUnitarioExistencia = $entrada->valorUnitario;
            }
            $valorTotalExistencia = $valorUnitario * $cantidadExistencia;
            $movimiento->cantidadExistencia = $cantidadExistencia;
            $movimiento->valorUnitarioExistencia = $valorUnitarioExistencia;
            $movimiento->valorTotalExistencia = $valorTotalExistencia;
            $movimiento->save();
            $kardex->cantidadActual = $movimiento->cantidadExistencia;
            $kardex->valorUnitarioActual = $movimiento->valorUnitarioExistencia;
            $kardex->valorTotalActual = $movimiento->valorTotalExistencia;
            $kardex->save();
        }
        session()->flash('message.level', 'success');
        session()->flash('message.content', 'La factura fue ingresada correctamente!');
        return redirect()->route('facturaVer',$factura->id);
    }

    public function FacturaVer($id)
    {
        $factura = Factura::find($id);
        $productos = Producto::all();
        $proveedores = Proveedor::all();
        return view('movimientos.facturaVer')->with(['productos' => $productos])->with(['proveedores' => $proveedores])->with(['factura' => $factura]);
    }

    public function facturaEliminar($id)
    {
        $factura = Factura::find($id);
        $entradas = Entrada::where('factura_id',$id)->get();
        dd($entradas);
    }

    public function SalidaProductos()
    {
        $productos = Producto::all();
        $proveedores = Proveedor::all();
        return view('movimientos.salidaProductos')->with(['productos' => $productos])->with(['proveedores' => $proveedores]);
    }

    public function OrdenPedidoLista()
    {
        $ordenesPedidos = OrdenPedido::all();
        return view('movimientos.ordenPedidoLista')->with(['ordenesPedidos' => $ordenesPedidos]);
    }

    public function OrdenPedidoIngreso()
    {
        $productos = Producto::all();
        $clientes = Cliente::all();
        return view('movimientos.ordenPedidoIngreso')->with(['productos' => $productos])->with(['clientes' => $clientes]);        
    }

}
