<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    //
    public function createEmpleado()
    {
        $cargo = Cargo::all();
        $empleados = Empleado::with('cargo')->get(); //se obtiene lso empleados con su cargo
        return view('empleado', compact('cargo', 'empleados'));
    }
    public function storeEmpleado(Request $request)
    {
        //crear empleado en la bd con su cargo
        Empleado::create($request->all());

        // Opcional: Redireccionar o mostrar un mensaje de éxito
        return redirect()->route('empleado.create')->with('success', 'Empleado creado con éxito');
    }
}
