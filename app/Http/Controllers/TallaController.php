<?php

namespace App\Http\Controllers;

use App\Models\Talla;
use Illuminate\Http\Request;

class TallaController extends Controller
{
    //
    public function createTalla()
    {
        $tallas = Talla::all();
        return view('talla', compact('tallas'));
    }
    public function storeTalla(Request $request)
    {
        //crear talla en la bd
        Talla::create($request->all());

        // Opcional: Redireccionar o mostrar un mensaje de éxito
        return redirect()->route('talla.create')->with('success', 'Categoria creado con éxito');
    }
}
