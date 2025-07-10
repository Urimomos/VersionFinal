{{-- resources/views/layouts/admin.blade.php --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Admin - {{ config('app.name', 'Laravel') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">

            <nav x-data="{ open: false }" class="bg-gray-800 text-white shadow-lg">
                <div class="container mx-auto px-6">
                    <div class="flex justify-between items-center h-16">
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2">
                            <img src="{{ asset('favicon.svg') }}" alt="Logo" class="h-8 w-8">
                            <span class="text-xl font-bold">Fixme Admin</span>
                        </a>

                        <div class="hidden md:flex items-center space-x-4">
                            <a href="#" class="flex items-center px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-700">
                                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                <span>Usuarios</span>
                            </a>

                            <div x-data="{ devicesOpen: false }" class="relative">
                                <button @click="devicesOpen = !devicesOpen" class="flex items-center px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-700">
                                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                    <span>Dispositivos</span>
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>
                                <div x-show="devicesOpen" @click.away="devicesOpen = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20" style="display: none;">
                                    <a href="{{ route('admin.categories.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Categorías</a>
                                    <a href="{{ route('admin.brands.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Marcas</a>
                                    <a href="{{ route('admin.device-models.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Modelos</a>
                                    <a href="{{ route('admin.repair-types.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Tipos de reparacion</a>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" class="flex items-center px-3 py-2 rounded-md text-sm font-medium hover:bg-red-700" onclick="event.preventDefault(); this.closest('form').submit();">
                                    Cerrar Sesión
                                </a>
                            </form>
                        </div>

                        <div class="md:hidden">
                            <button @click="open = !open" class="p-2 rounded-md hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': !open, 'inline-flex': open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div x-show="open" class="md:hidden">
                    <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                        <a href="#" class="flex items-center px-3 py-2 rounded-md text-base font-medium hover:bg-gray-700">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            <span>Usuarios</span>
                        </a>

                        <div x-data="{ devicesOpen: false }">
                            <button @click="devicesOpen = !devicesOpen" class="w-full flex justify-between items-center px-3 py-2 rounded-md text-base font-medium hover:bg-gray-700">
                                <span class="flex items-center">
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                    <span>Dispositivos</span>
                                </span>
                                <svg class="w-5 h-5 transform transition-transform" :class="{'rotate-180': devicesOpen}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="devicesOpen" class="pl-8 py-1 space-y-1">
                                <a href="{{ route('admin.categories.index') }}" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-gray-700">Categorías</a>
                                <a href="{{ route('admin.brands.index') }}" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-gray-700">Marcas</a>
                                <a href="{{ route('admin.device-models.index') }}" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-gray-700">Modelos</a>
                                <a href="{{ route('admin.repair-types.index') }}" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-gray-700">Tipos de reparacion</a>
                            </div>
                        </div>esew
                        <hr class="border-gray-700 my-2">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" class="flex items-center px-3 py-2 rounded-md text-base font-medium hover:bg-red-700" onclick="event.preventDefault(); this.closest('form').submit();">
                                Cerrar Sesión
                            </a>
                        </form>
                    </div>
                </div>
            </nav>

            <main class="p-6">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>