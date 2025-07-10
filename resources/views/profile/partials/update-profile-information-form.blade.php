<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    {{-- Formulario para la foto de perfil --}}
    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="photo" :value="__('Photo')" />
            <div class="mt-2 flex items-center gap-x-3">
                {{-- Muestra la foto actual o un avatar por defecto --}}
                <img id="photo-preview" class="h-16 w-16 rounded-full object-cover" 
                     src="{{ Auth::user()->profile_photo_path ? asset('storage/' . Auth::user()->profile_photo_path) : 'http://www.gravatar.com/avatar/0?d=mp' }}" 
                     alt="{{ Auth::user()->name }}">
                <input type="file" name="photo" id="photo" class="text-sm">
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('photo')" />
        </div>

        {{-- ... campos de Nombre y Correo Electrónico (ya existentes) ... --}}
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-red-600 hover:bg-red-700">{{ __('Save') }}</x-primary-button>
            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

<script>
    // Pequeño script para previsualizar la imagen seleccionada
    const photoInput = document.getElementById('photo');
    const photoPreview = document.getElementById('photo-preview');
    photoInput.addEventListener('change', event => {
        const file = event.target.files[0];
        if (file) {
            photoPreview.src = URL.createObjectURL(file);
        }
    });
</script>