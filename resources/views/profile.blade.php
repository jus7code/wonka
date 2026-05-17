@extends('layouts.app')

@section('header')
    <header class="sticky top-0 z-40 bg-stone-50 dark:bg-stone-900 border-b border-stone-200 dark:border-stone-800 shadow-sm flex justify-between items-center w-full px-6 py-3 h-16">
        <div class="flex items-center gap-6 flex-1">
            <h2 class="text-lg font-bold text-stone-800 dark:text-stone-100 flex items-center gap-2">
                <span class="material-symbols-outlined text-amber-900">settings</span>
                {{ __('Configuración de Perfil') }}
            </h2>
        </div>
        <div class="flex items-center gap-4">
            <span class="text-xs font-mono bg-stone-100 px-3 py-1.5 rounded-full text-stone-600 dark:bg-stone-800 dark:text-stone-400">
                Rol: {{ strtoupper($user->role) }}
            </span>
        </div>
    </header>
@endsection

@section('content')
<div class="p-margin flex-1 max-w-2xl mx-auto py-10">
    <!-- Breadcrumbs -->
    <nav class="flex items-center gap-2 text-label-sm text-outline mb-base uppercase tracking-widest">
        <span>{{ __('Configuración') }}</span>
        <span class="material-symbols-outlined text-xs" data-icon="chevron_right">chevron_right</span>
        <span class="text-secondary font-bold">{{ __('Mi Perfil') }}</span>
    </nav>

    <h1 class="text-display-xl font-display-xl text-primary mb-md">{{ __('Ajustes de Cuenta') }}</h1>
    <p class="text-sm text-on-surface-variant mb-8 leading-relaxed">
        {{ __('Administra los detalles de tu cuenta de acceso a la fábrica de chocolate Wonka, actualiza tus credenciales de seguridad o personaliza tu foto de perfil.') }}
    </p>

    <!-- Success & Error Alerts -->
    @if (session('success'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl flex items-center gap-3 text-green-800 text-sm font-semibold">
            <span class="material-symbols-outlined text-green-600 text-lg">check_circle</span>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl text-red-800 text-sm space-y-1">
            <div class="flex items-center gap-2 font-bold mb-1">
                <span class="material-symbols-outlined text-red-600 text-lg">error</span>
                <span>{{ __('Por favor corrija los siguientes errores:') }}</span>
            </div>
            <ul class="list-disc list-inside pl-4 space-y-0.5 font-medium">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Profile Settings Card -->
    <div class="bg-white rounded-2xl border border-stone-200 p-8 shadow-sm">
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Profile Image Section -->
            <div class="flex flex-col sm:flex-row items-center gap-6 pb-6 border-b border-stone-100">
                <div class="relative w-24 h-24 rounded-full overflow-hidden border-2 border-amber-900 bg-amber-50 flex items-center justify-center shadow-inner group">
                    @if ($user->profile_image)
                        <img id="avatar_preview" src="{{ $user->profile_image }}" alt="Avatar Preview" class="w-full h-full object-cover" />
                    @else
                        <div id="avatar_fallback" class="text-display-xl font-bold text-amber-900">
                            {{ strtoupper(substr($user->name, 0, 2)) }}
                        </div>
                        <img id="avatar_preview" src="" alt="Avatar Preview" class="w-full h-full object-cover hidden" />
                    @endif
                </div>

                <div class="flex-1 text-center sm:text-left space-y-2">
                    <h3 class="text-md font-bold text-stone-800">{{ __('Foto de Perfil') }}</h3>
                    <p class="text-xs text-stone-500 leading-relaxed max-w-sm">
                        {{ __('Sube una imagen cuadrada de tipo JPG, PNG o WebP de hasta 2MB para personalizar tu avatar.') }}
                    </p>
                    <label class="inline-flex items-center gap-2 px-4 py-2 border border-stone-200 hover:bg-stone-50 text-stone-700 rounded-xl text-xs font-bold cursor-pointer transition-all">
                        <span class="material-symbols-outlined text-md">upload_file</span>
                        {{ __('Seleccionar Imagen') }}
                        <input type="file" name="profile_image" id="profile_image_input" accept="image/*" class="hidden" onchange="previewImage(this)" />
                    </label>
                </div>
            </div>

            <!-- Username (Name) & Email fields -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col gap-xs">
                    <label class="text-sm font-semibold text-stone-700 mb-1" for="profile_name">{{ __('Nombre de Usuario') }}</label>
                    <input name="name" id="profile_name" type="text" value="{{ old('name', $user->name) }}" class="w-full bg-white border border-stone-200 rounded-xl p-3 text-sm outline-none focus:border-amber-700 transition-all" required />
                </div>
                <div class="flex flex-col gap-xs">
                    <label class="text-sm font-semibold text-stone-700 mb-1" for="profile_email">{{ __('Correo Electrónico') }}</label>
                    <input name="email" id="profile_email" type="email" value="{{ old('email', $user->email) }}" class="w-full bg-white border border-stone-200 rounded-xl p-3 text-sm outline-none focus:border-amber-700 transition-all" required />
                </div>
            </div>

            <!-- Change Password field -->
            <div class="flex flex-col gap-xs pt-2">
                <label class="text-sm font-semibold text-stone-700 mb-1" for="profile_password">
                    {{ __('Nueva Contraseña') }} <span class="text-xs text-stone-400 font-normal">({{ __('Dejar en blanco si no desea cambiarla') }})</span>
                </label>
                <input name="password" id="profile_password" type="password" placeholder="••••••••" class="w-full bg-white border border-stone-200 rounded-xl p-3 text-sm outline-none focus:border-amber-700 transition-all" />
            </div>

            <!-- Action Buttons -->
            <div class="pt-6 flex justify-end gap-4 border-t border-stone-100">
                @if ($user->role === 'client')
                    <a href="/OrderChocolate" class="px-6 py-3 border border-stone-200 text-stone-600 rounded-xl font-bold hover:bg-stone-50 transition-colors text-sm">
                        {{ __('Volver al Portal') }}
                    </a>
                @else
                    <a href="/dashboard" class="px-6 py-3 border border-stone-200 text-stone-600 rounded-xl font-bold hover:bg-stone-50 transition-colors text-sm">
                        {{ __('Volver al Dashboard') }}
                    </a>
                @endif
                <button type="submit" class="px-8 py-3 bg-amber-900 text-white rounded-xl font-bold hover:bg-amber-800 transition-colors text-sm flex items-center gap-2 shadow-md shadow-amber-900/10">
                    <span class="material-symbols-outlined text-md">save</span>
                    {{ __('Guardar Cambios') }}
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('avatar_preview');
                const fallback = document.getElementById('avatar_fallback');
                
                if (preview) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                }
                if (fallback) {
                    fallback.classList.add('hidden');
                }
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
