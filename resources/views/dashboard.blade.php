{{-- resources/views/dashboard.blade.php --}}

<x-app-layout>
    {{-- Esto pone un título en la pestaña del navegador --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mi Panel
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold">¡Hola, {{ Auth::user()->name }}!</h3>
                    <p class="mt-2 text-gray-600">Bienvenido a tu panel de control. Aquí podrás ver tus cotizaciones y reparaciones guardadas.</p>

                      <div class="mt-6">
                        <a href="{{ route('quote.create') }}" class="inline-block bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-5 rounded-lg transition-colors">
                        + Realizar Nueva Cotización
                         </a>
                    </div>


                </div>
            </div>

            {{-- Alerta de éxito después de guardar una cotización --}}
            @if(session('success'))
                <div class="mt-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif


            {{-- Aquí, en el siguiente paso, mostraremos la tabla con las cotizaciones --}}
            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6">
        <h3 class="text-xl font-bold text-gray-800">Mis Cotizaciones Guardadas</h3>
        <div class="mt-4">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                        <th class="px-4 py-3">Dispositivo</th>
                        <th class="px-4 py-3">Reparación</th>
                        <th class="px-4 py-3">Precio Estimado</th>
                        <th class="px-4 py-3">Estado</th>
                        <th class="px-4 py-3">Fecha</th>
                        <th class="px-4 py-3">Acciones</th> 
                    </tr>
                </thead>
                <tbody class="bg-white divide-y">
                    @forelse ($quotes as $quote)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-sm">
                                {{ $quote->deviceModel->brand->name }} {{ $quote->deviceModel->name }}
                            </td>
                            <td class="px-4 py-3 text-sm">{{ $quote->repairType->name }}</td>
                            <td class="px-4 py-3 text-sm font-semibold">${{ number_format($quote->price, 2) }}</td>
                            <td class="px-4 py-3 text-xs">
                                <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full">
                                    {{ ucfirst($quote->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">{{ $quote->created_at->format('d/m/Y') }}</td>
                            <td class="px-4 py-3 text-sm">
                                <form action="{{ route('quote.destroy', $quote) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas cancelar esta cotización?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 font-semibold">Cancelar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                                Aún no tienes cotizaciones guardadas. ¡Crea una ahora!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
        </div>
    </div>
</x-app-layout>