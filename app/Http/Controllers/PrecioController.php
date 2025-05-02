<?php

namespace App\Http\Controllers;

use App\Models\Precio;
use App\Models\Producto;
use Illuminate\Http\Request;

class PrecioController extends Controller
{
    //
    public function createPrecio()
    {
        $producto = Producto::all();
        $precios = Precio::with('producto')->get(); //se obtiene el precio con el producto
        return view('precio', compact('precios', 'producto'));
    }
    public function storePrecio(Request $request)
    {
        //crear empleado en la bd con su cargo
        Precio::create($request->all());

        // Opcional: Redireccionar o mostrar un mensaje de éxito
        return redirect()->route('precio.create')->with('success', 'Empleado creado con éxito');
    }
}
