<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Asignar Stock a un Producto</h2>
    </x-slot>

    <div class="py-10 max-w-3xl mx-auto">
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('producto-stock.store') }}" class="bg-white p-6 rounded shadow">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Producto:</label>
                <select name="producto_id" class="w-full border-gray-300 rounded">
                    @foreach ($productos as $producto)
                        <option value="{{ $producto->id }}">{{ $producto->NombreProducto }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Almacén:</label>
                <select name="almacen_id" class="w-full border-gray-300 rounded">
                    @foreach ($almacenes as $almacen)
                        <option value="{{ $almacen->id }}">{{ $almacen->NombreAlmacen }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Cantidad a asignar:</label>
                <input type="number" name="cantidad" class="w-full border-gray-300 rounded" min="0" required>
            </div>

            <div class="flex justify-end">
                <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700" type="submit">
                    Asignar Stock
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
