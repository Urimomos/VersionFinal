<x-admin-layout>
    <div class="space-y-8">
          <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-800">Detalles del Usuario</h1>
            <a href="{{ route('admin.users.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded">
                ← Volver a la lista
            </a>
        </div>
        <div class="bg-white p-8 rounded-lg shadow-md">
            <div class="flex items-center space-x-4">
                <img class="h-16 w-16 rounded-full object-cover" 
                     src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : 'http://www.gravatar.com/avatar/0?d=mp' }}" 
                     alt="{{ $user->name }}">
                <div>
                    <h1 class="text-2xl font-bold">{{ $user->name }}</h1>
                    <p class="text-sm text-gray-500">{{ $user->email }}</p>
                    <p class="text-sm text-gray-500">Teléfono: {{ $user->phone_number ?? 'No proporcionado' }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-8 rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-4">Historial de Cotizaciones</h2>
            <div class="overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                            <th class="px-4 py-3">Dispositivo</th>
                            <th class="px-4 py-3">Reparación</th>
                            <th class="px-4 py-3">Precio</th>
                            <th class="px-4 py-3">Estado</th>
                            <th class="px-4 py-3">Fecha de cotizacion</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @forelse ($user->quotes as $quote)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 text-sm">{{ $quote->deviceModel->brand->name }} {{ $quote->deviceModel->name }}</td>
                                <td class="px-4 py-3 text-sm">{{ $quote->repairType->name }}</td>
                                <td class="px-4 py-3 text-sm font-semibold">${{ number_format($quote->price, 2) }}</td>
                                <td class="px-4 py-3 text-xs">
                                    <span class="px-2 py-1 font-semibold leading-tight rounded-full {{ $quote->status === 'pending' ? 'text-yellow-700 bg-yellow-100' : 'text-green-700 bg-green-100' }}">
                                        {{ ucfirst($quote->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-sm">{{ $quote->created_at->format('d/m/Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                                    Este usuario aún no tiene cotizaciones.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>