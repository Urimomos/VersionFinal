<x-admin-layout>
     {{-- SECCIÓN 1: Formulario para editar el modelo (como estaba antes) --}}
    <div class="bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6">Editar Modelo de Dispositivo</h1>
        <form action="{{ route('admin.device-models.update', $deviceModel) }}" method="POST">
            @csrf
            @method('PUT')
            {{-- Campo Nombre --}}
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre del Modelo:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $deviceModel->name) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
            </div>
            {{-- Dropdown de Marca --}}
            <div class="mb-4">
                <label for="brand_id" class="block text-gray-700 text-sm font-bold mb-2">Marca:</label>
                <select name="brand_id" id="brand_id" required class="shadow border rounded w-full py-2 px-3 text-gray-700">
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" @selected(old('brand_id', $deviceModel->brand_id) == $brand->id)>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            {{-- Dropdown de Categoría --}}
            <div class="mb-4">
                <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">Categoría:</label>
                <select name="category_id" id="category_id" required class="shadow border rounded w-full py-2 px-3 text-gray-700">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id', $deviceModel->category_id) == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Actualizar Modelo</button>
                <a href="{{ route('admin.device-models.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-600 hover:text-blue-800">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
<br>
    {{-- SECCIÓN 2: Nueva sección para gestionar reparaciones y precios --}}
    <div class="bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6">Reparaciones y Precios para este Modelo</h2>

        {{-- Alerta de éxito --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <form action="{{ route('admin.device-models.repairs.attach', $deviceModel) }}" method="POST" class="mb-6 border-b pb-6">
            @csrf
            <div class="flex items-end space-x-4">
                <div class="flex-1">
                    <label for="repair_type_id" class="block text-gray-700 text-sm font-bold mb-2">Tipo de Reparación:</label>
                    <select name="repair_type_id" id="repair_type_id" required class="shadow border rounded w-full py-2 px-3 text-gray-700">
                        <option value="">Selecciona una reparación...</option>
                        @foreach ($availableRepairTypes as $repair)
                            <option value="{{ $repair->id }}">{{ $repair->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex-1">
                    <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Precio ($):</label>
                    <input type="number" name="price" id="price" required step="0.01" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                </div>
                <div>
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Añadir</button>
                </div>
            </div>
        </form>

        <h3 class="text-xl font-bold mb-4">Reparaciones Asociadas</h3>
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                    <th class="px-4 py-3">Nombre de la Reparación</th>
                    <th class="px-4 py-3">Precio Asignado</th>
                    <th class="px-4 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y">
                @forelse ($deviceModel->repairTypes as $repair)
                    <tr class="text-gray-700">
                        <td class="px-4 py-3 text-sm">{{ $repair->name }}</td>
                        <td class="px-4 py-3 text-sm">${{ number_format($repair->pivot->price, 2) }}</td>
                        <td class="px-4 py-3 text-sm">
                            <form action="{{ route('admin.device-models.repairs.detach', [$deviceModel, $repair]) }}" method="POST" onsubmit="return confirm('¿Estás seguro?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Quitar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-3 text-center text-gray-500">Aún no hay reparaciones asociadas a este modelo.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>