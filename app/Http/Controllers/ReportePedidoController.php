<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportePedidoController extends Controller
{
    //
    public function generarPDF()
    {
        // $pedidos = Pedido::with(['detallepedidos.producto'])->get();

        // $pdf = Pdf::loadView('reportes.pedidos', compact('pedidos'));

        // return $pdf->download('reporte_pedidos.pdf');

        $pedidos = Pedido::with('detallepedidos.producto')->get(); // cargamos nuevamente

        $pdf = Pdf::loadView('reportes.pedidos', compact('pedidos'));
    
        // Cambia el encabezado para que el PDF se abra en el navegador
        return $pdf->stream('reporte_pedidos.pdf', ['Attachment' => 0]); // El 'Attachment' => 0 indica que se abrirá en el navegador
    }
}
