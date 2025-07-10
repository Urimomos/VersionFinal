<x-app-layout>
    {{-- El contenido dentro de x-app-layout se inyectará en la variable $slot del layout --}}

    <div class="hero">
        <div class="hero-content">
            <h1>LA REPARACIÓN ES LIBERTAD</h1>
            <p>Cuando reparas un dispositivo electrónico evitas la contaminación del suelo, de ríos y mares.</p>
            {{-- Enlazamos a una futura ruta llamada 'cotizacion' --}}
            <a href="{{ route('quote.create') }}" class="btn btn-secondary">Hacer cotización</a>
        </div>
    </div>

    <section class="features">
        <div class="container">
            <h2>Repara con los profesionales</h2>
            <div class="features-grid">
                <div class="feature-item">
                    <img src="{{ asset('images/repara-1.jpg') }}" alt="Reparación de laptop">
                </div>
                <div class="feature-item">
                    <img src="{{ asset('images/repara-2.jpg') }}" alt="Componentes electrónicos">
                </div>
            </div>
        </div>
    </section>

    {{-- INICIO DE LA NUEVA SECCIÓN "NUESTROS SERVICIOS" --}}
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-6">
        
        {{-- Título de la Sección --}}
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">
            Nuestros Servicios
        </h2>

        {{-- PRIMER SERVICIO: Computadoras (Imagen a la Izquierda) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-16">
            <div>
                {{-- Asegúrate de tener una imagen llamada 'servicio-laptops.jpg' en tu carpeta public/images --}}
                <img src="{{ asset('images/servicio-laptops.jpg') }}" alt="Reparación de computadoras" class="rounded-lg shadow-xl">
            </div>
            <div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Reparación de Computadoras</h3>
                <ul class="space-y-3 text-gray-600">
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-red-600 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Cambios de display</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-red-600 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Cambios de teclado</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-red-600 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Cambios de batería</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-red-600 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Mantenimiento preventivo y correctivo</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-red-600 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Instalación de software y sistemas operativos</span>
                    </li>
                </ul>
            </div>
        </div>

        {{-- SEGUNDO SERVICIO: Celulares y Tablets (Imagen a la Derecha) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-16">
            {{-- En pantallas de escritorio, md:order-last mueve la imagen a la derecha --}}
            <div class="md:order-last">
                 {{-- Asegúrate de tener una imagen llamada 'servicio-celulares.jpg' en tu carpeta public/images --}}
                <img src="{{ asset('images/servicio-celulares.jpg') }}" alt="Reparación de celulares y tablets" class="rounded-lg shadow-xl">
            </div>
            <div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Reparación de Celulares y Tablets</h3>
                <ul class="space-y-3 text-gray-600">
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-red-600 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Cambio de display</span>
                    </li>
                     <li class="flex items-start">
                        <svg class="w-6 h-6 text-red-600 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Cambio de centro de carga, micrófono y batería</span>
                    </li>
                     <li class="flex items-start">
                        <svg class="w-6 h-6 text-red-600 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Cambio de tapas y carcasas</span>
                    </li>
                     <li class="flex items-start">
                        <svg class="w-6 h-6 text-red-600 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Micro soldadura y reparaciones a nivel componente</span>
                    </li>
                     <li class="flex items-start">
                        <svg class="w-6 h-6 text-red-600 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Desbloqueos y software</span>
                    </li>
                </ul>
            </div>
        </div>

        {{-- TERCERA SECCIÓN: Venta de Accesorios --}}
        <div class="text-center bg-white p-10 rounded-lg shadow-lg border">
            <h3 class="text-2xl font-bold text-gray-800 mb-2">Y Mucho Más...</h3>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Además de nuestras reparaciones expertas, contamos con una amplia gama de accesorios para tus dispositivos. Visítanos y encuentra fundas, micas, cargadores de todo tipo e incluso tinta para tu impresora.
            </p>
        </div>

    </div>
</section>
{{-- FIN DE LA NUEVA SECCIÓN --}}

</x-app-layout>