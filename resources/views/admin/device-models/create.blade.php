<x-admin-layout>
    <div class="bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6">Nuevo Modelo de Dispositivo</h1>
        <form action="{{ route('admin.device-models.store') }}" method="POST">
            @csrf
            {{-- Campo Nombre --}}
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre del Modelo:</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
            </div>
            {{-- Dropdown de Marca --}}
            <div class="mb-4">
                <label for="brand_id" class="block text-gray-700 text-sm font-bold mb-2">Marca:</label>
                <select name="brand_id" id="brand_id" required class="shadow border rounded w-full py-2 px-3 text-gray-700">
                    <option value="">Selecciona una marca</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
            {{-- Dropdown de Categoría --}}
            <div class="mb-4">
                <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">Categoría:</label>
                <select name="category_id" id="category_id" required class="shadow border rounded w-full py-2 px-3 text-gray-700">
                    <option value="">Selecciona una categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar Modelo</button>
                <a href="{{ route('admin.device-models.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-600 hover:text-blue-800">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>