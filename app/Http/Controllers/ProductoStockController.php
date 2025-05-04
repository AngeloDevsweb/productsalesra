<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoStockController extends Controller
{
    //
    public function create()
    {
        $productos = Producto::all();
        $almacenes = Almacen::all();
        return view('producto_stock.create', compact('productos', 'almacenes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:producto,id',
            'almacen_id' => 'required|exists:almacen,id',
            'cantidad' => 'required|integer|min:0'
        ]);

        // Insertar o actualizar si ya existe el registro
        $producto = Producto::find($request->producto_id);
        $producto->almacens()->syncWithoutDetaching([
            $request->almacen_id => ['CantidadExistente' => $request->cantidad]
        ]);

        return redirect()->route('producto-stock.create')->with('success', 'Stock asignado correctamente.');
    }
}
