<x-admin-layout>
    <div class="bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6">Gestión de Usuarios</h1>

        <div class="mb-4">
            <a href="{{ route('admin.users.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                + Nuevo Administrador
            </a>
        </div>

        {{-- Alertas de éxito o error --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                    <th class="px-4 py-3">Nombre</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Rol</th>
                    <th class="px-4 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y">
                @foreach($users as $user)
                    <tr class="text-gray-700">
                        <td class="px-4 py-3 text-sm">{{ $user->name }}</td>
                        <td class="px-4 py-3 text-sm">{{ $user->email }}</td>
                        <td class="px-4 py-3 text-xs">
                            <span class="px-2 py-1 font-semibold leading-tight rounded-full {{ $user->role === 'admin' ? 'text-green-700 bg-green-100' : 'text-gray-700 bg-gray-100' }}">
                                {{ $user->role }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            @if($user->role !== "admin")
                             <a href="{{ route('admin.users.show', $user) }}" class="text-blue-600 hover:text-blue-900">
                                Ver Detalles
                            </a>
                            @endif
                            {{-- El botón de eliminar solo aparece si no es el admin principal (ID 1) --}}
                            @if($user->id !== 1)
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('¿Estás seguro?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>