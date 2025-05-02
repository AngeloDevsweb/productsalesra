<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    //
    public function createCargo()
    {
        $cargo = Cargo::all();
        return view('cargo', compact('cargo'));
    }
    public function storeCargo(Request $request)
    {
        //crear cargo en la bd
        Cargo::create($request->all());

        // Opcional: Redireccionar o mostrar un mensaje de éxito
        return redirect()->route('cargo.create')->with('success', 'Empleado creado con éxito');
    }
}
