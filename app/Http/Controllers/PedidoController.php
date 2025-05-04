<?php

namespace App\Http\Controllers;

use App\Models\Almacenproducto;
use App\Models\Cliente;
use App\Models\Detallepedido;
use App\Models\Metodopago;
use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    public function create()
    {
        // $clientes = Cliente::all();
        // $metodosPago = Metodopago::all();
        // $productos = Producto::with('precios')->get();

        // return view('pedido', compact('clientes', 'metodosPago', 'productos'));

        $clientes = Cliente::all();
            $metodosPago = Metodopago::all();

            // Traer productos con su precio más reciente
            $productos = Producto::with(['precios' => function ($query) {
                $query->orderBy('id', 'desc')->limit(1);
            }])->get();

            return view('pedido', compact('clientes', 'metodosPago', 'productos'));
    }

    public function store(Request $request)
{
    $request->validate([
        'FechaPedido' => 'required|date',
        'EstadoPedido' => 'required|string',
        'idCliente' => 'required|exists:cliente,id',
        'idMetodoPago' => 'required|exists:metodopago,id',
        'detalles' => 'required|array',
        'detalles.*.idProducto' => 'required|exists:producto,id',
        'detalles.*.Cantidad' => 'required|integer|min:1',
        'detalles.*.PrecioCompra' => 'required|numeric|min:0',
    ]);

    DB::beginTransaction();
    try {
        // Crear el pedido principal
        $pedido = Pedido::create([
            'FechaPedido' => $request->FechaPedido,
            'EstadoPedido' => $request->EstadoPedido,
            'idCliente' => $request->idCliente,
            'idMetodoPago' => $request->idMetodoPago,
            'idEmpresa' => 2, // Fijo como ya manejas
        ]);

        foreach ($request->detalles as $detalle) {
            $almacenProducto = Almacenproducto::where('idProducto', $detalle['idProducto'])->first();

            if (!$almacenProducto) {
                throw new \Exception("El producto con ID {$detalle['idProducto']} no está registrado en el almacén.");
            }

            if ($almacenProducto->CantidadExistente <= 0) {
                throw new \Exception("El producto '{$almacenProducto->producto->NombreProducto}' está agotado.");
            }

            if ($detalle['Cantidad'] > $almacenProducto->CantidadExistente) {
                throw new \Exception("Stock insuficiente para el producto '{$almacenProducto->producto->NombreProducto}'. Disponible: {$almacenProducto->CantidadExistente}, solicitado: {$detalle['Cantidad']}.");
            }

            // Registrar detalle del pedido
            Detallepedido::create([
                'idPedido' => $pedido->id,
                'idProducto' => $detalle['idProducto'],
                'Cantidad' => $detalle['Cantidad'],
                'PrecioCompra' => $detalle['PrecioCompra'],
            ]);

            // Descontar stock
            $almacenProducto->CantidadExistente -= $detalle['Cantidad'];
            $almacenProducto->save();
        }

        DB::commit();
        return redirect()->route('pedido.create')->with('success', 'Pedido creado con éxito y stock actualizado');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->withErrors(['error' => $e->getMessage()]);
    }
}


}
