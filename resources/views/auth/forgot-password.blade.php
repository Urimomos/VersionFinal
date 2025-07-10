<x-app-layout>
     <div class="py-12 bg-gray-50">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            {{-- Tarjeta blanca con sombra --}}
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg border border-gray-200">
                <div class="p-8">
                    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Recuperar Contraseña</h2>

                    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        <!-- #region --></div>

    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('password.email') }}">
                     @csrf

        <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ml-3 bg-red-600 hover:bg-red-700">
                            {{ __('Email Password Reset Link') }}
                        </x-primary-button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
     </div>                
</x-app-layout>