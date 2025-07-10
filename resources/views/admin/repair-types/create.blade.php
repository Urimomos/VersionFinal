<x-admin-layout>
   <div class="bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6">Nuevo Tipo de Reparación</h1>
        <form action="{{ route('admin.repair-types.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descripción (Opcional):</label>
                <textarea name="description" id="description" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">{{ old('description') }}</textarea>
            </div>
            <div class="mb-4">
                <label for="base_price" class="block text-gray-700 text-sm font-bold mb-2">Precio Base (Opcional):</label>
                <input type="number" name="base_price" id="base_price" value="{{ old('base_price') }}" step="0.01" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
                <a href="{{ route('admin.repair-types.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-600 hover:text-blue-800">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>