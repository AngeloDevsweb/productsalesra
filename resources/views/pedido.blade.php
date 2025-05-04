<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Agregar Pedido</h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto">
        <div class="bg-indigo-700 p-2 rounded-md text-white mb-6">
            <a href="/reporte-pedidos" target="_blank">Generar Reporte de pedidos</a>
        </div>

        {{-- Mostrar errores generales --}}
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <strong>¡Ups! Algo salió mal.</strong>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pedido.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="idCliente" class="block text-sm font-medium text-gray-700">Cliente</label>
                <select name="idCliente" id="idCliente" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    <option value="">Seleccione un cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ old('idCliente') == $cliente->id ? 'selected' : '' }}>{{ $cliente->NombrePersona }}</option>
                    @endforeach
                </select>
                @error('idCliente')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="FechaPedido" class="block text-sm font-medium text-gray-700">Fecha del Pedido</label>
                <input type="date" name="FechaPedido" id="FechaPedido" class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('FechaPedido') }}" required>
                @error('FechaPedido')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="idMetodoPago" class="block text-sm font-medium text-gray-700">Método de Pago</label>
                <select name="idMetodoPago" id="idMetodoPago" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    <option value="">Seleccione un método de pago</option>
                    @foreach($metodosPago as $metodo)
                        <option value="{{ $metodo->id }}" {{ old('idMetodoPago') == $metodo->id ? 'selected' : '' }}>{{ $metodo->NombreMetodo }}</option>
                    @endforeach
                </select>
                @error('idMetodoPago')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="EstadoPedido" class="block text-sm font-medium text-gray-700">Estado del Pedido</label>
                <select name="EstadoPedido" id="EstadoPedido" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    <option value="Pendiente" {{ old('EstadoPedido') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="En Proceso" {{ old('EstadoPedido') == 'En Proceso' ? 'selected' : '' }}>En Proceso</option>
                    <option value="En Espera" {{ old('EstadoPedido') == 'En Espera' ? 'selected' : '' }}>En Espera</option>
                    <option value="Enviado" {{ old('EstadoPedido') == 'Enviado' ? 'selected' : '' }}>Enviado</option>
                    <option value="Entregado" {{ old('EstadoPedido') == 'Entregado' ? 'selected' : '' }}>Entregado</option>
                    <option value="Cancelado" {{ old('EstadoPedido') == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
                    <option value="Devuelto" {{ old('EstadoPedido') == 'Devuelto' ? 'selected' : '' }}>Devuelto</option>
                </select>
                @error('EstadoPedido')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div id="detalles-container">
                <div class="detalle-row flex space-x-4 mb-4">
                    <select name="detalles[0][idProducto]" class="producto-select w-1/3 border-gray-300 rounded-md shadow-sm" required>
                        <option value="">Seleccione un producto</option>
                        @foreach($productos as $producto)
                            <option value="{{ $producto->id }}" 
                                data-precio="{{ $producto->precios->isNotEmpty() ? $producto->precios->first()->Preciop : 0 }}"
                                {{ old('detalles.0.idProducto') == $producto->id ? 'selected' : '' }}>
                                {{ $producto->NombreProducto }}
                            </option>
                        @endforeach
                    </select>
                    <input type="number" name="detalles[0][Cantidad]" class="cantidad-input w-1/3 border-gray-300 rounded-md shadow-sm" placeholder="Cantidad" min="1" value="{{ old('detalles.0.Cantidad') }}" required>
                    <input type="number" name="detalles[0][PrecioCompra]" class="precio-input w-1/3 border-gray-300 rounded-md shadow-sm" placeholder="Precio" readonly value="{{ old('detalles.0.PrecioCompra') }}">
                </div>
            </div>

            <button type="button" id="agregar-detalle" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Agregar Producto</button>
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Guardar Pedido</button>
        </form>
    </div>

    <script>
        let detalleCount = 1;

        document.getElementById('agregar-detalle').addEventListener('click', function() {
            const detallesContainer = document.getElementById('detalles-container');
            const detalleRow = document.createElement('div');
            detalleRow.classList.add('detalle-row', 'flex', 'space-x-4', 'mb-4');

            let opcionesProductos = `@foreach($productos as $producto)
                <option value="{{ $producto->id }}" 
                    data-precio="{{ $producto->precios->isNotEmpty() ? $producto->precios->first()->Preciop : 0 }}">
                    {{ $producto->NombreProducto }}
                </option>
            @endforeach`;

            detalleRow.innerHTML = `
                <select name="detalles[${detalleCount}][idProducto]" class="producto-select w-1/3 border-gray-300 rounded-md shadow-sm" required>
                    <option value="">Seleccione un producto</option>
                    ${opcionesProductos}
                </select>
                <input type="number" name="detalles[${detalleCount}][Cantidad]" class="cantidad-input w-1/3 border-gray-300 rounded-md shadow-sm" placeholder="Cantidad" min="1" required>
                <input type="number" name="detalles[${detalleCount}][PrecioCompra]" class="precio-input w-1/3 border-gray-300 rounded-md shadow-sm" placeholder="Precio" readonly>
            `;

            detallesContainer.appendChild(detalleRow);
            detalleCount++;
        });

        document.addEventListener('input', function(event) {
            if (event.target.classList.contains('cantidad-input')) {
                actualizarPrecio(event.target);
            }
        });

        document.addEventListener('change', function(event) {
            if (event.target.classList.contains('producto-select')) {
                actualizarPrecio(event.target.closest('.detalle-row').querySelector('.cantidad-input'));
            }
        });

        function actualizarPrecio(cantidadInput) {
            const detalleRow = cantidadInput.closest('.detalle-row');
            const productoSelect = detalleRow.querySelector('.producto-select');
            const precioInput = detalleRow.querySelector('.precio-input');

            const precioBase = parseFloat(productoSelect.selectedOptions[0].dataset.precio) || 0;
            const cantidad = parseInt(cantidadInput.value) || 0;
            precioInput.value = (precioBase * cantidad).toFixed(2);
        }
    </script>
</x-app-layout>
