{{-- resources/views/admin/dashboard.blade.php --}}
<x-admin-layout>
  <div class="bg-white p-8 rounded-lg shadow-md text-center">
    <h2 class="text-4xl font-bold text-gray-800">Bienvenido al Panel</h2>
    <p class="mt-4 text-lg text-gray-600">Este es tu centro de control. Utiliza la barra para navegar y gestionar el contenido de Fixme.</p>
    </div>
     {{-- Nueva tabla de cotizaciones --}}
    <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
            <h3 class="text-xl font-bold text-gray-800">Últimas Cotizaciones Guardadas</h3>
            <div class="mt-4">
    <table class="w-full whitespace-no-wrap">
    <thead>
        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
            <th class="px-4 py-3">Cliente</th>
            <th class="px-4 py-3">Dispositivo</th>
            <th class="px-4 py-3">Reparación</th>
            <th class="px-4 py-3">Precio</th>
            <th class="px-4 py-3">Estado</th>
            <th class="px-4 py-3">Acciones</th> </tr>
    </thead>
    <tbody class="bg-white divide-y">
        @forelse ($quotes as $quote)
            <tr class="text-gray-700">
                <td class="px-4 py-3 text-sm">{{ $quote->user->name }}</td>
                <td class="px-4 py-3 text-sm">{{ $quote->deviceModel->brand->name }} {{ $quote->deviceModel->name }}</td>
                <td class="px-4 py-3 text-sm">{{ $quote->repairType->name }}</td>
                <td class="px-4 py-3 text-sm font-semibold">${{ number_format($quote->price, 2) }}</td>
                <td class="px-4 py-3 text-xs">
                    <span class="px-2 py-1 font-semibold leading-tight {{ $quote->status === 'pending' ? 'text-yellow-700 bg-yellow-100' : 'text-green-700 bg-green-100' }} rounded-full">
                        {{ ucfirst($quote->status) }}
                    </span>
                </td>
                
                <td class="px-4 py-3 text-sm">
                 @if($quote->status === 'pending')
                <form action="{{ route('admin.quotes.complete', $quote) }}" method="POST" class="inline">
                    @csrf
                 <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-1 px-3 rounded text-xs">
                    Completar
                </button>
                </form>
                @else
                    {{-- AÑADIMOS EL BOTÓN DE ELIMINAR PARA LAS COMPLETADAS --}}
                    <form action="{{ route('admin.quotes.destroy', $quote) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta cotización?');" class="inline">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900 text-xs font-semibold">
                            Eliminar
                        </button>
                </form>
            @endif
            </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                    No hay cotizaciones registradas.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
            </div>
        </div>
    </div>

</x-admin-layout>