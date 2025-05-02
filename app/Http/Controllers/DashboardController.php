<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function showDashboard()
{
    // Obtener los productos con su cantidad en almacén
    $productos = Producto::with('almacens')->get();

    // Preparar los datos para el gráfico
    $labels = [];
    $data = [];

    foreach ($productos as $producto) {
        $labels[] = $producto->NombreProducto;
        $cantidad = $producto->almacens->sum('pivot.CantidadExistente'); // Sumamos las cantidades existentes
        $data[] = $cantidad;
    }

    // Pasar los datos a la vista
    return view('dashboard', compact('labels', 'data'));
}
}
