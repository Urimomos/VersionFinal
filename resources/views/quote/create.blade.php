<x-app-layout>
     <div x-data="{ formMode: 'standard' }" class="py-12 bg-gray-50">
        <div class="container mx-auto px-6 lg:w-2/3">
            <div class="bg-white p-8 rounded-lg shadow-md">
                {{-- Formulario Estándar (el que ya teníamos) --}}
                <div x-show="formMode === 'standard'">
                    <h1 class="text-3xl font-bold mb-6 text-center">Crea tu Cotización</h1>
                
                  <form id="quote-form" action="{{ route('quote.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="device_model_id" id="hidden-model-id">
                    <div id="hidden-repairs-container"></div>

                    <div class="space-y-6">
                        <div>
                            <label for="category" class="block text-gray-700 text-sm font-bold mb-2">1. Selecciona la Categoría:</label>
                            <select id="category" name="category" class="shadow border rounded w-full py-2 px-3 text-gray-700">
                                <option value="">Selecciona...</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="brand" class="block text-gray-700 text-sm font-bold mb-2">2. Selecciona la Marca:</label>
                            <select id="brand" name="brand" class="shadow border rounded w-full py-2 px-3 text-gray-700" disabled>
                                <option value="">Selecciona una categoría primero...</option>
                            </select>
                        </div>
                        <div>
                            <label for="model" class="block text-gray-700 text-sm font-bold mb-2">3. Selecciona el Modelo:</label>
                            <select id="model" name="model" class="shadow border rounded w-full py-2 px-3 text-gray-700" disabled>
                                <option value="">Selecciona una marca primero...</option>
                            </select>
                        </div>
                        <div>
                            <label for="repair" class="block text-gray-700 text-sm font-bold mb-2">4. Selecciona el Tipo de Reparación:</label>
                            <div id="repair-list" class="mt-2 space-y-2 border rounded p-4 bg-gray-50" style="display: none;">
                                <p id="repair-placeholder" class="text-gray-500">Selecciona un modelo para ver las reparaciones disponibles.</p>
                            </div>
                        </div>
                    </div>

                    <div id="price-result" class="mt-8 p-6 bg-blue-100 border-t-4 border-blue-500 rounded-b text-blue-900 shadow-md text-center" style="display: none;">
                        <p class="text-lg">Total estimado de la reparación:</p>
                        <p id="price-display" class="text-4xl font-bold">$0.00</p>
                    </div>

                    <div class="mt-8 text-center">
                        <button id="save-quote-btn" type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-lg transition-colors disabled:bg-gray-400" disabled>
                            Guardar Cotización
                        </button>
                        @guest
                        <p class="text-sm text-gray-600 mt-2">Debes <a href="{{ route('login') }}" class="underline hover:text-red-600">iniciar sesión</a> o <a href="{{ route('register') }}" class="underline hover:text-red-600">registrarte</a> para guardar.</p>
                        @endguest
                    </div>
                  </form>
                    
                   <div class="text-center mt-4">
                        <button @click="formMode = 'custom'" type="button" class="text-sm text-blue-600 hover:underline">
                            ¿No encuentras tu dispositivo o reparación? Haz clic aquí.
                        </button>
                    </div>
                </div>

                {{-- Formulario Personalizado (el nuevo) --}}
              {{-- Formulario Personalizado (el nuevo) --}}
                    <div x-show="formMode === 'custom'" style="display: none;">
                        <h1 class="text-3xl font-bold mb-6 text-center">Solicitud Personalizada</h1>
                        <p class="text-center text-gray-600 mb-6">
                            Describe tu dispositivo y el problema que presenta. Nos pondremos en contacto contigo con una cotización a la brevedad.
                        </p>
                        <form action="{{ route('quote.store.custom') }}" method="POST">
                            @csrf
                            <div class="space-y-4">
                                <div>
                                    <label for="device_description" class="block text-gray-700 text-sm font-bold mb-2">Describe tu Dispositivo:</label>
                                    <textarea name="device_description" id="device_description" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" placeholder="Ej: Laptop HP Pavilion 15, Celular Xiaomi Redmi Note 10, etc.">{{ old('device_description') }}</textarea>
                                    {{-- AÑADIR MENSAJE DE ERROR --}}
                                    @error('device_description')
                                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                 <div>
                                    <label for="problem_description" class="block text-gray-700 text-sm font-bold mb-2">Describe el Problema:</label>
                                    <textarea name="problem_description" id="problem_description" rows="6" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" placeholder="Ej: La pantalla no enciende, se mojó y ya no prende, necesito recuperar mis datos, etc.">{{ old('problem_description') }}</textarea>
                                    {{-- AÑADIR MENSAJE DE ERROR --}}
                                    @error('problem_description')
                                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-6 flex items-center justify-between">
                                <button @click="formMode = 'standard'" type="button" class="text-sm text-blue-600 hover:underline">
                                    ← Volver al formulario estándar
                                </button>
                                @auth
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg">
                                        Enviar Solicitud
                                    </button>
                                @else
                                    <a href="{{ route('login') }}" class="bg-gray-400 text-white font-bold py-2 px-4 rounded-lg">Inicia sesión para enviar</a>
                                @endauth
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>



<script>
    // Referencias a los elementos del DOM (esto no cambia)
    const categorySelect = document.getElementById('category');
    const brandSelect = document.getElementById('brand');
    const modelSelect = document.getElementById('model');
    const repairListDiv = document.getElementById('repair-list');
    const priceResultDiv = document.getElementById('price-result');
    const priceDisplayP = document.getElementById('price-display');
    const saveQuoteBtn = document.getElementById('save-quote-btn');
    const quoteForm = document.getElementById('quote-form');
    const hiddenModelIdInput = document.getElementById('hidden-model-id');
    const hiddenRepairsContainer = document.getElementById('hidden-repairs-container');
    
     quoteForm.addEventListener('submit', function(event) {
        // Llenar los campos ocultos justo antes de enviar
        hiddenModelIdInput.value = document.getElementById('model').value;
        
        // Limpiar reparaciones anteriores
        hiddenRepairsContainer.innerHTML = '';
        
        // Añadir un input oculto por cada checkbox marcado
        const checkedRepairs = document.querySelectorAll('#repair-list input[type="checkbox"]:checked');
        checkedRepairs.forEach(checkbox => {
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'repairs[]'; // Importante: '[]' para que sea un array en el backend
            hiddenInput.value = checkbox.value;
            hiddenRepairsContainer.appendChild(hiddenInput);
        });
    });


    // La función que suma el total no necesita cambios, ya que lee el data-price
    function updateTotalPrice() {
        let total = 0;
        const checkedRepairs = repairListDiv.querySelectorAll('input[type="checkbox"]:checked');
        
        checkedRepairs.forEach(checkbox => {
            total += parseFloat(checkbox.dataset.price);
        });

        if (total > 0) {
            priceDisplayP.textContent = `$${total.toFixed(2)}`;
            priceResultDiv.style.display = 'block';
            @auth
                saveQuoteBtn.disabled = false;
            @endauth
        } else {
            priceResultDiv.style.display = 'none';
            saveQuoteBtn.disabled = true;
        }
    }

    // El listener del modelo es donde haremos el cambio principal
    modelSelect.addEventListener('change', () => {
        const modelId = modelSelect.value;
        repairListDiv.innerHTML = `<p class="text-gray-500">Cargando reparaciones...</p>`;
        repairListDiv.style.display = 'none';
        updateTotalPrice();

        if (modelId) {
            fetch(`/api/v1/repairs-by-model/${modelId}`)
                .then(response => response.json())
                .then(data => {
                    repairListDiv.innerHTML = ''; 
                    if(data.length > 0) {
                        data.forEach(repair => {
                            // --- INICIO DE LA MODIFICACIÓN ---

                            // 1. Sumamos ambos precios. Usamos '|| 0' para evitar errores si un precio es nulo.
                            const pricePart = parseFloat(repair.pivot.price || 0);
                            const priceBase = parseFloat(repair.base_price || 0);
                            const totalItemPrice = pricePart + priceBase;

                            // Creamos la estructura del checkbox
                            const wrapper = document.createElement('label');
                            wrapper.className = 'flex items-center space-x-3 p-2 hover:bg-gray-100 rounded-md cursor-pointer';
                            
                            const checkbox = document.createElement('input');
                            checkbox.type = 'checkbox';
                            checkbox.className = 'h-5 w-5 rounded border-gray-300 text-red-600 focus:ring-red-500';
                            checkbox.value = repair.id;
                            // 2. Guardamos el precio TOTAL (pieza + servicio) en el data-price
                            checkbox.dataset.price = totalItemPrice.toFixed(2);
                            
                            const nameSpan = document.createElement('span');
                            nameSpan.textContent = repair.name;

                            const priceSpan = document.createElement('span');
                            priceSpan.className = 'ml-auto font-semibold text-gray-800';
                            // 3. Mostramos el desglose del precio al usuario para mayor claridad
                            priceSpan.textContent = `$${totalItemPrice.toFixed(2)}`;

                            wrapper.appendChild(checkbox);
                            wrapper.appendChild(nameSpan);
                            wrapper.appendChild(priceSpan);
                            repairListDiv.appendChild(wrapper);

                             // --- FIN DE LA MODIFICACIÓN ---
                        });
                        repairListDiv.style.display = 'block';
                    } else {
                         repairListDiv.innerHTML = `<p class="text-gray-500">No hay reparaciones disponibles para este modelo.</p>`;
                         repairListDiv.style.display = 'block';
                    }
                });
        }
    });

    // El resto del código JS se queda igual
    repairListDiv.addEventListener('change', (event) => {
        if (event.target.type === 'checkbox') {
            updateTotalPrice();
        }
    });
    
    // ... funciones populateSelect, resetSelects y los otros listeners ...
    function populateSelect(selectElement, items, defaultOptionText) {
        selectElement.innerHTML = `<option value="">${defaultOptionText}</option>`;
        items.forEach(item => {
            const option = document.createElement('option');
            option.value = item.id;
            option.textContent = item.name;
            selectElement.appendChild(option);
        });
        selectElement.disabled = false;
    }

    function resetSelects(...selects) {
        selects.forEach(select => {
            select.innerHTML = `<option value="">Selecciona una opción anterior...</option>`;
            select.disabled = true;
        });
        repairListDiv.innerHTML = `<p id="repair-placeholder" class="text-gray-500">Selecciona un modelo para ver las reparaciones disponibles.</p>`;
        repairListDiv.style.display = 'none';
        updateTotalPrice();
    }

    categorySelect.addEventListener('change', () => {
        const categoryId = categorySelect.value;
        resetSelects(brandSelect, modelSelect);
        if (categoryId) { fetch(`/api/v1/brands-by-category/${categoryId}`).then(response => response.json()).then(data => populateSelect(brandSelect, data, 'Selecciona una marca...'));}
    });

    brandSelect.addEventListener('change', () => {
        const brandId = brandSelect.value;
        resetSelects(modelSelect);
        if (brandId) { fetch(`/api/v1/models-by-brand/${brandId}`).then(response => response.json()).then(data => populateSelect(modelSelect, data, 'Selecciona un modelo...'));}
    });
</script>
</x-app-layout>