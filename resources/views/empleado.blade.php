<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Registrar nuevo Empleado
        </h2>
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                <p class="font-bold">¡Éxito!</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto pb-3">
            <a href="{{ route('cargo.create') }}" class="bg-indigo-700 text-white rounded-lg p-3" >Registrar cargo</a>
        </div>
        <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md mt-2">
            <form action="{{ route('empleado.store') }}" method="POST">
                @csrf
                <!-- Nombre de Persona -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre del empleado</label>
                    <input type="text" id="name" name="NombreEmpleado" 
                        value="{{ old('NombreEmpleado') }}"
                        class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                        placeholder="Jorge" " required>
                </div>

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Apellido Paterno</label>
                    <input type="text" id="name" name="ApellidoPaterno" 
                        value="{{ old('ApellidoPaterno') }}"
                        class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                        placeholder="Ejemplo: Perez" required>
                </div>

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Apellido Materno</label>
                    <input type="text" id="name" name="ApellidoMaterno" 
                        value="{{ old('ApellidoMaterno') }}"
                        class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                        placeholder="Ejemplo: Vellido" required>
                </div>

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Documento identidad</label>
                    <input type="text" id="name" name="DocumentoIdentidad" 
                        value="{{ old('DocumentoIdentidad') }}"
                        class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                        placeholder="89613218" required>
                </div>

                <select id="idCargo" name="idCargo" class="mt-1 mb-8 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                    <option value="">Seleccione un cargo</option>
                    @foreach($cargo as $c)
                        <option class="text-black" value="{{ $c->id }}">{{ $c->NombreCargo }}</option>
                    @endforeach
                </select>

                <!-- Botón de Enviar -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Guardar Persona
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
                    <th class="py-3 px-6 border-b">Nombre</th>
                    <th class="py-3 px-6 border-b">Apellido Paterno</th>
                    <th class="py-3 px-6 border-b">Cargo</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm">
                @foreach ($empleados as $empleado)
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="py-3 px-6">{{ $empleado->id }}</td>
                        <td class="py-3 px-6">{{ $empleado->NombreEmpleado }}</td>
                        <td class="py-3 px-6">{{ $empleado->ApellidoPaterno }}</td>
                        <td class="py-3 px-6">{{ $empleado->cargo->NombreCargo }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    
</x-app-layout>
