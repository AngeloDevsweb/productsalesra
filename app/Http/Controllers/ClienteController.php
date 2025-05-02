<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function createPersona()
    {
        $personas = Cliente::all();
        return view('cliente', compact('personas'));
    }
    public function storePersona(Request $request)
    {
        //crear person aen la bd
        // Persona::create([
        // ]);
        // Crear persona en la base de datos
        Cliente::create($request->all());

        // Opcional: Redireccionar o mostrar un mensaje de éxito
        return redirect()->route('cliente.create')->with('success', 'cliente creada con éxito');
    }
}
