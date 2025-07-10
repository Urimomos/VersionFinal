{{-- resources/views/sobre-nosotros.blade.php --}}

<x-app-layout>
    <div class="py-12 bg-white">
        <div class="container mx-auto px-6">

            {{-- Título de la página --}}
            <h1 class="text-4xl font-bold text-center text-gray-800 mb-10">
                Sobre Nosotros
            </h1>

            {{-- Contenedor principal con dos columnas (texto y mapa) --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                <div class="text-lg text-gray-700 space-y-4">
                    <h2 class="text-2xl font-semibold text-gray-800">Nuestra Historia</h2>
                    <p>
                        Fixme nació en 2023 con la misión de ofrecer un servicio de reparación honesto, rápido y profesional. Entendemos lo importante que son tus dispositivos en tu día a día, por eso nuestro equipo de técnicos expertos se dedica a darles una segunda vida.
                    </p>
                    <p>
                        Creemos en la reparación como un acto de libertad y sostenibilidad. Cada dispositivo que arreglamos es un dispositivo menos que contamina nuestro planeta. Nos enorgullece ser tu aliado tecnológico de confianza.
                    </p>
                    <h2 class="text-2xl font-semibold text-gray-800 mt-6">Nuestra Misión</h2>
                    <p>
                        Ofrecer soluciones tecnológicas accesibles y de alta calidad, garantizando la satisfacción de nuestros clientes a través de un servicio excepcional y un profundo conocimiento técnico.
                    </p>
                </div>

                <div>
                    <div class="w-full h-96 rounded-lg shadow-xl overflow-hidden border-2 border-gray-200">
                       
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3767.402302583633!2d-98.2428599!3d19.221291!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cfdbcb0a63ccbb%3A0xfbbe3516e2dfd67d!2sFixme%20reparaci%C3%B3n%20de%20celulares!5e0!3m2!1ses-419!2smx!4v1751320325601!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                        </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>