<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    //
    public function createColor()
    {
        $colores = Color::all();
        return view('color', compact('colores'));
    }
    public function storeColor(Request $request)
    {
        //crear talla en la bd
        Color::create($request->all());

        // Opcional: Redireccionar o mostrar un mensaje de éxito
        return redirect()->route('color.create')->with('success', 'Categoria creado con éxito');
    }
}
