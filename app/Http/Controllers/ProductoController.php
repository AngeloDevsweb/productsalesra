<?php

namespace App\Http\Controllers;

use App\Models\Categorium;
use App\Models\Color;
use App\Models\Producto;
use App\Models\Talla;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    //
    public function viewProduct(){
        return view('producto');
    }

    public function listarProductos()
{
    $productos = Producto::with(['tallas', 'colors', 'precios', 'almacens'])->get();

    return view('productos.listaproductos', compact('productos'));
}

    public function index()
    {
        $productos = Producto::with(['categorium', 'colors', 'tallas'])->get();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categorium::all();
        $colores = Color::all();
        $tallas = Talla::all();
        return view('productos.producto', compact('categorias', 'colores', 'tallas'));
    }

    public function store(Request $request)
    {

        $producto = Producto::create([
            'NombreProducto' => $request->NombreProducto,
            'DescripcionProducto' => $request->DescripcionProducto,
            'idCategoria' => $request->idCategoria,
        ]);

        $producto->colors()->attach($request->colores);
        $producto->tallas()->attach($request->tallas);

        return redirect()->route('producto.create')->with('success', 'Producto creado con éxito.');
    }
}
