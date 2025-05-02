<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Agregar Cargo
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('cargo.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <input type="text" required name="NombreCargo" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Ingresar nombre del cargo">
                        </div>

                        <div class="mb-4">
                            <textarea 
                                placeholder="Escribe aquí la descripcion..."
                                required
                                name="DescripcionCargo"
                                class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                rows="5"></textarea>
                        </div>
                        

                        <div class="mb-4">
                            <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="max-w-4xl mx-auto mb-1">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md mt-6">
                <thead>
                    <tr class="bg-gray-100 text-left text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 border-b">Codigo</th>
                        <th class="py-3 px-6 border-b">Nombre</th>
                        <th class="py-3 px-6 border-b">Descripcion</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm">
                    @foreach ($cargo as $carg)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-6">{{ $carg->id }}</td>
                            <td class="py-3 px-6">{{ $carg->NombreCargo }}</td>
                            <td class="py-3 px-6">{{ $carg->DescripcionCargo }}</td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
