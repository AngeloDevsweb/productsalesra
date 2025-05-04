<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">📦 Lista de Productos</h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm text-left text-gray-600">
                        <thead class="bg-gray-800 text-white text-xs uppercase tracking-wider">
                            <tr>
                                <th class="px-6 py-3">🛍 Nombre</th>
                                <th class="px-6 py-3">📏 Tallas</th>
                                <th class="px-6 py-3">🎨 Colores</th>
                                <th class="px-6 py-3">💰 Precio</th>
                                <th class="px-6 py-3">📦 Stock</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($productos as $producto)
                                <tr class="hover:bg-gray-50 transition duration-200 ease-in-out">
                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        {{ $producto->NombreProducto }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-wrap gap-1">
                                            @foreach ($producto->tallas as $talla)
                                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                                    {{ $talla->Nombre }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-wrap gap-1">
                                            @foreach ($producto->colors as $color)
                                                <span class="bg-pink-100 text-pink-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                                    {{ $color->Nombre }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        @php
                                            $precio = $producto->precios->last();
                                        @endphp
                                        <span class="text-green-600 font-semibold">
                                            {{ $precio ? number_format($precio->Preciop, 2) . ' Bs' : 'No registrado' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        @php
                                            $stockTotal = $producto->almacens->sum(fn($a) => $a->pivot->CantidadExistente);
                                        @endphp
                                        <span class="text-gray-700 font-medium">
                                            {{ $stockTotal }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
