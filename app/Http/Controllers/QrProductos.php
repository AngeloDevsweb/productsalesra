<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QrProductos extends Controller
{
    //
    public function mostrarLista(){
        return view('listaproductos.qrproductos');
    }
}
