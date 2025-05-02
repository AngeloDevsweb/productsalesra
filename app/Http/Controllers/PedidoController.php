<?php

namespace App\Http\Controllers;

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
        // Validación
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
            // Crear el pedido
            $pedido = Pedido::create([
                'FechaPedido' => $request->FechaPedido,
                'EstadoPedido' => $request->EstadoPedido,
                'idCliente' => $request->idCliente,
                'idMetodoPago' => $request->idMetodoPago,
                'idEmpresa' => 2,
            ]);

            // Insertar detalles del pedido
            foreach ($request->detalles as $detalle) {
                DetallePedido::create([
                    'idPedido' => $pedido->id,
                    'idProducto' => $detalle['idProducto'],
                    'Cantidad' => $detalle['Cantidad'],
                    'PrecioCompra' => $detalle['PrecioCompra'],
                ]);
            }

            DB::commit();
            return redirect()->route('pedido.create')->with('success', 'Pedido creado con éxito');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Hubo un problema al registrar el pedido: ' . $e->getMessage()]);
        }
    }






}
