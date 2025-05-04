<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Pedidos</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Reporte de Pedidos</h2>
    <table>
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Fecha del Pedido</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio de Compra</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
                @foreach($pedido->detallepedidos as $detalle)
                    <tr>
                        <td>{{$pedido->id}}</td>
                        <td>{{ $pedido->FechaPedido->format('d-m-Y') }}</td>
                        <td>{{ $detalle->producto->NombreProducto }}</td>
                        <td>{{ $detalle->Cantidad }}</td>
                        <td>{{ number_format($detalle->PrecioCompra, 2) }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</body>
</html>
