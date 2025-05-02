<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Crear Producto</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('productos.store') }}" method="POST" class="space-y-4">
                        @csrf
                        
                        <div>
                            <label for="NombreProducto" class="block text-sm font-medium text-gray-700">Nombre del Producto</label>
                            <input type="text" id="NombreProducto" name="NombreProducto" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        
                        <div>
                            <label for="DescripcionProducto" class="block text-sm font-medium text-gray-700">Descripción</label>
                            <textarea id="DescripcionProducto" name="DescripcionProducto" rows="3" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                        </div>
                        
                        <div>
                            <label for="idCategoria" class="block text-sm font-medium text-gray-700">Categoría</label>
                            <select id="idCategoria" name="idCategoria" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->NombreCategoria }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Colores</label>
                            <div class="grid grid-cols-2 gap-2">
                                @foreach ($colores as $color)
                                    <label class="flex items-center">
                                        <input type="checkbox" name="colores[]" value="{{ $color->id }}" class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        <span class="ml-2 text-gray-700">{{ $color->Nombre }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tallas</label>
                            <div class="grid grid-cols-2 gap-2">
                                @foreach ($tallas as $talla)
                                    <label class="flex items-center">
                                        <input type="checkbox" name="tallas[]" value="{{ $talla->id }}" class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        <span class="ml-2 text-gray-700">{{ $talla->Nombre }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        
                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Guardar Producto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
