<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Registro de precios
        </h2>
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                <p class="font-bold">¡Éxito!</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md mt-2">
            <form action="{{ route('precio.store') }}" method="POST">
                @csrf
                <!-- Nombre de Persona -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Ingresar precio</label>
                    <input type="text" id="name" name="Preciop" 
                        value="{{ old('Preciop') }}"
                        class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                        placeholder="99.99$" " required>
                </div>

                <select id="idCargo" name="idProducto" class="mt-1 mb-8 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                    <option value="">Seleccione un producto</option>
                    @foreach($producto as $p)
                        <option class="text-black" value="{{ $p->id }}">{{ $p->NombreProducto }}</option>
                    @endforeach
                </select>

                <!-- Botón de Enviar -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Guardar Precio
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="max-w-4xl mx-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md mt-6">
            <thead>
                <tr class="bg-gray-100 text-left text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 border-b">Codigo</th>
                    <th class="py-3 px-6 border-b">Precio</th>
                    <th class="py-3 px-6 border-b">Nombre producto</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm">
                @foreach ($precios as $precio)
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="py-3 px-6">{{ $precio->id }}</td>
                        <td class="py-3 px-6">{{ $precio->Preciop }}</td>
                        <td class="py-3 px-6">{{ $precio->producto->NombreProducto }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    
</x-app-layout>
