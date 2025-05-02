<?php

namespace App\Http\Controllers;

use App\Models\Categorium;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    //
    public function createCategoria()
    {
        $categoria = Categorium::all();
        return view('categoria', compact('categoria'));
    }
    public function storeCategoria(Request $request)
    {
        //crear cargo en la bd
        Categorium::create($request->all());

        // Opcional: Redireccionar o mostrar un mensaje de éxito
        return redirect()->route('categoria.create')->with('success', 'Categoria creado con éxito');
    }
}
