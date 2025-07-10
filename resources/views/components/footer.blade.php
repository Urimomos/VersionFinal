{{-- resources/views/components/footer.blade.php --}}
<footer class="bg-gray-800 text-gray-300">
    <div class="container mx-auto px-6 py-12">
        {{-- Contenedor principal del grid de 4 columnas --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            
            <div>
                <a href="/"  class="text-white text-2xl font-bold">
                    <img src="{{ asset('images/fixme-logo-transparente.png') }}" alt="Logo Fixme Blanco" class="h-10">
                </a>
                <p class="mt-4 text-gray-400">
                    Reparamos lo que te importa. Tu solución tecnológica de confianza desde 2023.
                </p>
                <div class="flex mt-6 space-x-4">
                    {{-- Íconos de Redes Sociales (SVG) --}}
                    <a href="https://www.facebook.com/share/18ycGHwiiz/" target="_blank" class="text-gray-400 hover:text-white">
                        <span class="sr-only">Facebook</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                    </a>


                    <a href="https://www.tiktok.com/@fixme.tlax" target="_blank" class="text-gray-400 hover:text-white">
                        <span class="sr-only">TikTok</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-2.43.05-4.84-.94-6.46-2.97-1.62-2.02-2.06-4.58-1.52-7.19.42-2.03 1.53-3.85 3.04-5.23 1.89-1.74 4.6-2.51 7.15-2.45.03 1.5.01 3 .01 4.49-.68-.1-1.36-.16-2.04-.16-1.03 0-2.02.18-2.98.51-1.02.35-1.93.9-2.71 1.6-.2.18-.38.36-.57.59-.25.31-.48.64-.67.99-.23.42-.37.89-.46 1.36-.11.56-.13 1.13-.13 1.71 0 .23.01.46.02.69.02.26.06.52.1.77.08.52.25 1.03.52 1.5.28.48.63.92 1.07 1.28.44.36.95.64 1.5.82.55.18 1.13.27 1.71.27.48 0 .95-.07 1.41-.2.45-.13.88-.32 1.28-.57.38-.24.74-.53 1.05-.87.29-.33.56-.7.76-1.1.21-.41.36-.85.45-1.3.11-.55.15-1.11.15-1.67.01-3.44-.01-6.88-.01-10.33.02-1.51-.18-3.02-.53-4.45Z" />
                        </svg>
                    </a>
                </div>
            </div>

            <div>
                <h3 class="text-white text-lg font-semibold">Navegación</h3>
                <ul class="mt-4 space-y-2">
                    <li><a href="/" class="hover:text-white transition-colors">Inicio</a></li>
                    <li><a href="{{ route('sobre-nosotros') }}" ...>Sobre Nosotros</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-white text-lg font-semibold">Nuestros Servicios</h3>
                <ul class="mt-4 space-y-2">
                    <li><a href="#" class="hover:text-white transition-colors">Reparación de Celulares</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Reparación de Laptops</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Reparación de Consolas</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-white text-lg font-semibold">Contacto</h3>
                <ul class="mt-4 space-y-2">
                    <li><p>Av. Benito Juárez, 100, sección primera, Zacatelco, Tlaxcala c.p. 90740</p></li>
                    <li><a href="tel:+522461499217" class="hover:text-white transition-colors">246-149-9217</a></li>
                    <li><a href="mailto:contacto@fixme.com" class="hover:text-white transition-colors">repara.fixme@gmail.com</a></li>
                    <li><p>Lun - Vie: 10:00  - 19:00 <br> Sáb: 10 am - 16:00</p></li>
                </ul>
            </div>
        </div>

        {{-- Barra inferior con Copyright y enlaces legales --}}
        <div class="mt-12 pt-8 border-t border-gray-700 text-center sm:text-left sm:flex sm:justify-between">
            <p class="text-sm text-gray-400">
                &copy; {{ date('Y') }} Fixme. Todos los derechos reservados.
            </p>
        </div>
    </div>
</footer>