<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{-- ... tu head se queda igual ... --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Fixme') }} - Expertos en Reparación</title>
    
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon-96x96.png') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">


    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-white">
        
        {{-- INICIO DE LA BARRA DE NAVEGACIÓN ACTUALIZADA --}}
        {{-- x-data inicializa Alpine.js. 'open' es nuestro interruptor para el menú. --}}
        {{-- INICIO DE LA BARRA DE NAVEGACIÓN ACTUALIZADA --}}
<header x-data="{ open: false }" class="navbar">
    <div class="container">
       <a href="/" class="logo">
            {{-- Cambia el nombre del archivo aquí --}}
        <img src="{{ asset('images/fixme-logo-transparente.png') }}" alt="Logo Fixme">
        </a>
        
        {{-- 1. MENÚ PARA ESCRITORIO --}}
        <nav class="hidden md:flex nav-links">
            <ul>
                <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Inicio</a></li>
                <li><a href="{{ route('sobre-nosotros') }}">Sobre Nosotros</a></li>
            </ul>
        </nav>

        {{-- INICIO DE LA MODIFICACIÓN: GRUPO DE BOTONES PARA ESCRITORIO --}}
       <div class="hidden md:flex items-center space-x-4">
    @guest
        {{-- ESTO SE MUESTRA SI EL USUARIO NO HA INICIADO SESIÓN --}}
        <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900 font-semibold">
            Iniciar sesión
        </a>
        <a href="{{ route('register') }}" class="btn btn-primary">
            Registrarse
        </a>
    @endguest

    @auth
        {{-- ESTO SE MUESTRA SI EL USUARIO SÍ HA INICIADO SESIÓN --}}
        <div x-data="{ open: false }" class="relative">
            {{-- Botón con la foto de perfil o iniciales --}}
            <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                <span class="font-semibold text-sm">{{ Auth::user()->name }}</span>
                @if (Auth::user()->profile_photo_path)
                    <img class="h-8 w-8 rounded-full object-cover" src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="{{ Auth::user()->name }}">
                @else
                    {{-- Fallback a las iniciales del usuario si no hay foto --}}
                    <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-gray-600">
                        <span class="text-sm font-medium leading-none text-white">{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</span>
                    </span>
                @endif
            </button>

            {{-- Menú desplegable --}}
            <div x-show="open" 
                 @click.away="open = false" 
                 x-transition 
                 class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20" 
                 style="display: none;">

                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Mi Panel</a>
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Mi Perfil</a>

                <hr class="border-gray-200">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" 
                       class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" 
                       onclick="event.preventDefault(); this.closest('form').submit();">
                        Cerrar Sesión
                    </a>
                </form>
            </div>
        </div>
    @endauth
</div>
        {{-- FIN DE LA MODIFICACIÓN --}}


        {{-- 2. BOTÓN DE HAMBURGUESA PARA MÓVIL --}}
        <div class="md:hidden">
            <button @click="open = !open" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path :class="{'hidden': !open, 'inline-flex': open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    {{-- 3. PANEL DE MENÚ MÓVIL --}}
    {{-- Menú Colapsable para Móvil --}}
<div x-show="open" class="md:hidden" style="display: none;">
    <div class="pt-2 pb-3 space-y-1 px-2">
        <a href="/" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-50">Inicio</a>
        <a href="{{ route('sobre-nosotros') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-50">Sobre Nosotros</a>
    </div>

    {{-- Borde Separador --}}
    <div class="pt-4 pb-3 border-t border-gray-200">
        @guest
            {{-- SE MUESTRA SI ES INVITADO --}}
            <div class="px-2 space-y-1">
                <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-50">Iniciar sesión</a>
                <a href="{{ route('register') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-50">Registrarse</a>
            </div>
        @endguest

        @auth
            {{-- SE MUESTRA SI ESTÁ LOGEADO --}}
            <div class="px-5 flex items-center">
                <div>
                    @if (Auth::user()->profile_photo_path)
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="{{ Auth::user()->name }}">
                    @else
                        <span class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-gray-600">
                            <span class="text-md font-medium leading-none text-white">{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</span>
                        </span>
                    @endif
                </div>
                <div class="ml-3">
                    <div class="font-bold text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 px-2 space-y-1">
                <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-50">Mi Panel</a>
                <a href="{{ route('profile.edit') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-50">Mi Perfil</a>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" 
                       class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-gray-50" 
                       onclick="event.preventDefault(); this.closest('form').submit();">
                        Cerrar Sesión
                    </a>
                </form>
            </div>
        @endauth
    </div>
</div>
</header>
{{-- FIN DE LA BARRA DE NAVEGACIÓN ACTUALIZADA --}}
        <main>
            {{ $slot }}
        </main>

        <x-footer />
    </div>
</body>
</html>