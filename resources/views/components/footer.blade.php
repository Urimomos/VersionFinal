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
                    Reparamos lo que te importa. Tu solución tecnológica de confianza desde 2025.
                </p>
                <div class="flex mt-6 space-x-4">
                    {{-- Íconos de Redes Sociales (SVG) --}}
                    <a href="https://www.facebook.com/share/18ycGHwiiz/" target="_blank" class="text-gray-400 hover:text-white">
                        <span class="sr-only">Facebook</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                    </a>
                    <a href="#" target="_blank" class="text-gray-400 hover:text-white">
                        <span class="sr-only">Instagram</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 012.153 1.153 4.902 4.902 0 011.153 2.153c.247.636.416 1.363.465 2.427.048 1.024.06 1.378.06 3.808s-.012 2.784-.06 3.808c-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 2.153 4.902 4.902 0 01-2.153 1.153c-.636.247-1.363.416-2.427.465-1.024.048-1.378.06-3.808.06s-2.784-.013-3.808-.06c-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-2.153-1.153 4.902 4.902 0 01-1.153-2.153c-.247-.636-.416-1.363-.465-2.427-.048-1.024-.06-1.378-.06-3.808s.012-2.784.06-3.808c.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-2.153A4.902 4.902 0 016.08 2.465c.636-.247 1.363-.416 2.427-.465C9.53 2.013 9.884 2 12.315 2zm-1.161 10.595a3.112 3.112 0 116.224 0 3.112 3.112 0 01-6.224 0z" clip-rule="evenodd" /><path d="M16.965 6.57a1.25 1.25 0 100 2.5 1.25 1.25 0 000-2.5z" /></svg>
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