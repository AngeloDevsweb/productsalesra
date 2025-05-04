<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Productos con Realidad Virtual
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                {{-- CARD 1 --}}
                <div class="bg-white shadow-lg rounded-xl p-6 text-center transition-transform transform hover:scale-105 duration-300 ease-in-out
">
                    <img src="{{ asset('faldablanca.png') }}" alt="QR" class="w-40 h-40 mx-auto mb-4">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Vestido Blanco</h3>
                    <p class="text-sm text-indigo-600 italic">Escanea el QR y mira la magia.</p>
                </div>

                {{-- CARD 2 --}}
                <div class="bg-white shadow-lg rounded-xl p-6 text-center transition-transform transform hover:scale-105 duration-300 ease-in-out
">
                    <img src="{{ asset('camisablanca.png') }}" alt="QR" class="w-40 h-40 mx-auto mb-4">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Camisa de Gala</h3>
                    <p class="text-sm text-indigo-600 italic">Escanea el QR y mira la magia.</p>
                </div>

                {{-- CARD 3 --}}
                <div class="bg-white shadow-lg rounded-xl p-6 text-center transition-transform transform hover:scale-105 duration-300 ease-in-out
">
                    <img src="{{ asset('camisa.png') }}" alt="QR" class="w-40 h-40 mx-auto mb-4">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Camisa Elegante</h3>
                    <p class="text-sm text-indigo-600 italic">Escanea el QR y mira la magia.</p>
                </div>

                {{-- CARD 4 --}}
                <div class="bg-white shadow-lg rounded-xl p-6 text-center transition-transform transform hover:scale-105 duration-300 ease-in-out
">
                    <img src="{{ asset('vestidonegro.png') }}" alt="QR" class="w-40 h-40 mx-auto mb-4">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Vestido Negro Gala</h3>
                    <p class="text-sm text-indigo-600 italic">Escanea el QR y mira la magia.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
