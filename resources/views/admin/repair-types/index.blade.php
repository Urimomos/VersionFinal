<x-admin-layout>
     <div class="bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6">Gestión de Tipos de Reparación</h1>
        <a href="{{ route('admin.repair-types.create') }}" class="inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4">
            + Nuevo Tipo de Reparación
        </a>

        {{-- ... Alerta de éxito ... --}}

        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                    <th class="px-4 py-3">Nombre</th>
                    <th class="px-4 py-3">Precio Base</th>
                    <th class="px-4 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y">
                @foreach($repairTypes as $repairType)
                    <tr class="text-gray-700">
                        <td class="px-4 py-3 text-sm">{{ $repairType->name }}</td>
                        <td class="px-4 py-3 text-sm">${{ number_format($repairType->base_price, 2) }}</td>
                        <td class="px-4 py-3 text-sm">
                            <a href="{{ route('admin.repair-types.edit', $repairType) }}" class="text-blue-600 hover:text-blue-900">Editar</a>
                            {{-- INICIO DEL FORMULARIO DE ELIMINAR --}}
                            <form action="{{ route('admin.repair-types.destroy', $repairType) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este tipo de reparación?');" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 ml-4">Eliminar</button>
                            </form>
                            {{-- FIN DEL FORMULARIO DE ELIMINAR --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>