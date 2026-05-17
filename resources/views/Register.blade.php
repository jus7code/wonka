<!DOCTYPE html>

<html class="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>{{ __('Registro | CocoaMaster') }}</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "outline": "#81756e",
                        "on-primary": "#ffffff",
                        "primary-fixed-dim": "#dec1af",
                        "on-primary-container": "#ac9181",
                        "secondary-fixed": "#ffdf9d",
                        "surface-container": "#fdeadf",
                        "primary": "#26170c",
                        "on-tertiary-fixed-variant": "#484743",
                        "surface-bright": "#fff8f5",
                        "on-primary-fixed": "#28180d",
                        "tertiary-fixed": "#e6e2dd",
                        "on-secondary-fixed-variant": "#5b4300",
                        "outline-variant": "#d2c4bc",
                        "on-tertiary-fixed": "#1c1c19",
                        "secondary": "#785a00",
                        "on-secondary": "#ffffff",
                        "surface-dim": "#e9d7cb",
                        "on-tertiary": "#ffffff",
                        "inverse-on-surface": "#ffede3",
                        "surface-container-lowest": "#ffffff",
                        "surface-variant": "#f1dfd4",
                        "secondary-fixed-dim": "#ebc162",
                        "inverse-primary": "#dec1af",
                        "on-secondary-container": "#775800",
                        "on-tertiary-container": "#999692",
                        "on-surface": "#231a13",
                        "tertiary": "#1b1a18",
                        "on-surface-variant": "#4f453f",
                        "background": "#fff8f5",
                        "on-error-container": "#93000a",
                        "tertiary-fixed-dim": "#c9c6c1",
                        "surface-container-high": "#f7e5d9",
                        "surface-container-low": "#fff1e9",
                        "primary-container": "#3d2b1f",
                        "tertiary-container": "#302f2c",
                        "error-container": "#ffdad6",
                        "on-background": "#231a13",
                        "error": "#ba1a1a",
                        "secondary-container": "#fdd170",
                        "surface-tint": "#705a4c",
                        "surface-container-highest": "#f1dfd4",
                        "surface": "#fff8f5",
                        "inverse-surface": "#392e27",
                        "on-primary-fixed-variant": "#574335",
                        "on-error": "#ffffff",
                        "primary-fixed": "#fbddca",
                        "on-secondary-fixed": "#251a00"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "sm": "12px",
                        "base": "8px",
                        "lg": "48px",
                        "gutter": "24px",
                        "xl": "80px",
                        "xs": "4px",
                        "md": "24px",
                        "margin": "32px"
                    },
                    "fontFamily": {
                        "label-md": ["Inter"],
                        "body-md": ["Inter"],
                        "headline-lg": ["Inter"],
                        "body-lg": ["Inter"],
                        "display-xl": ["Inter"],
                        "headline-md": ["Inter"],
                        "label-sm": ["Inter"]
                    },
                    "fontSize": {
                        "label-md": ["14px", { "lineHeight": "20px", "letterSpacing": "0.01em", "fontWeight": "500" }],
                        "body-md": ["16px", { "lineHeight": "24px", "fontWeight": "400" }],
                        "headline-lg": ["32px", { "lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "600" }],
                        "body-lg": ["18px", { "lineHeight": "28px", "fontWeight": "400" }],
                        "display-xl": ["48px", { "lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                        "headline-md": ["24px", { "lineHeight": "32px", "fontWeight": "600" }],
                        "label-sm": ["12px", { "lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "600" }]
                    }
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
        }

        .cocoa-gradient {
            background: linear-gradient(135deg, #3d2b1f 0%, #26170c 100%);
        }
    </style>
</head>

<body class="bg-surface font-body-md text-on-surface overflow-hidden">
    <div class="flex min-h-screen w-full">
        <!-- Visual Sidebar: The Artisanal Legacy -->
        <div class="hidden lg:flex lg:w-1/2 cocoa-gradient relative flex-col justify-between p-xl text-on-primary">
            <div class="z-10">
                <div class="flex items-center gap-sm">
                    <span class="material-symbols-outlined text-display-xl" data-icon="coffee_maker">coffee_maker</span>
                    <h1 class="font-display-xl text-display-xl tracking-tighter">WonkaFabric</h1>
                </div>
                <p class="font-headline-md text-headline-md mt-base opacity-80">{{ __('Fabrica chocolatera #1 en santander') }}</p>
            </div>
            <div class="z-10 max-w-md">
                <blockquote class="mb-lg">
                    <p class="font-body-lg text-body-lg italic opacity-90 leading-relaxed">
                        "{{ __('La marca lider en santander #1 en el corazón de los colombianos') }}"
                    </p>
                </blockquote>
                <div class="flex items-center gap-base">
                    <div class="h-px w-12 bg-on-primary opacity-40"></div>
                    <span class="font-label-md text-label-md tracking-widest opacity-60">{{ __('Wonka Limited SAS') }}</span>
                </div>
            </div>
            <!-- Background Texture Image -->
            <img alt="Detailed macro texture of high-quality dark chocolate shavings with professional studio lighting and warm tones"
                class="absolute inset-0 w-full h-full object-cover opacity-30 mix-blend-overlay"
                data-alt="Detailed macro texture of high-quality dark chocolate shavings with professional studio lighting and warm tones"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDCq37vot5BWynf_KnW4jOdA-_NBW7d7GWm37UZsEMxnsHGhchoV9a7LYH1R5nMUrEAznQJufHa024lh2UrTgkl3pFtAotyQK01k0_Q2Bmk2Qsm1ujxkVhlhSwbzmM_0KpYmmaJEv0unAJy0RhyLdcsAI38XvolI9aUqqa5XM5I8mq45BA5MCqPTzUiBsJWmCTuvahTZ_Lvb-0meh2i-Y8BGtHM88B_c7V8GOWbBnA_lMnfiLLZLBPu_rac4bL-68K5VLtqM1pv9Q" />
        </div>
        <!-- Register Form Canvas -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-gutter bg-surface-bright">
            <div class="w-full max-w-md space-y-lg">
                <!-- Mobile Logo (Hidden on Desktop) -->
                <div class="lg:hidden flex flex-col items-center mb-xl">
                    <span class="material-symbols-outlined text-primary text-display-xl"
                        data-icon="coffee_maker">coffee_maker</span>
                    <h1 class="font-display-xl text-display-xl text-primary tracking-tighter">CocoaMaster</h1>
                </div>
                <div class="space-y-base">
                    <h2 class="font-headline-lg text-headline-lg text-on-surface">{{ __('Crea una cuenta') }}</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant">{{ __('regístrate para acceder al sistema WonkaFabric') }}</p>
                </div>

                <!-- Validation Alerts -->
                @if ($errors->any())
                    <div class="p-sm rounded-xl bg-error-container text-on-error-container border border-error/20 flex flex-col gap-xs">
                        <div class="flex items-center gap-xs font-semibold">
                            <span class="material-symbols-outlined text-[20px]" data-icon="error">error</span>
                            <span>{{ __('Error al registrarse') }}</span>
                        </div>
                        <ul class="text-xs list-disc list-inside opacity-90 pl-xs">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('register') }}" method="POST" class="space-y-md">
                    @csrf
                    <!-- Username Field -->
                    <div class="space-y-xs">
                        <label class="font-label-md text-label-md text-on-surface-variant ml-xs"
                            for="name">{{ __('Usuario (Nombre)') }}</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-sm flex items-center pointer-events-none">
                                <span
                                    class="material-symbols-outlined text-outline group-focus-within:text-secondary transition-colors"
                                    data-icon="person">person</span>
                            </div>
                            <input
                                class="block w-full pl-xl pr-md py-4 bg-surface-container-lowest border border-outline-variant rounded-xl text-on-surface placeholder-outline-variant focus:outline-none focus:ring-2 focus:ring-secondary/20 focus:border-secondary transition-all"
                                id="name" name="name" placeholder="{{ __('ej. charlie_bucket') }}"
                                value="{{ old('name') }}" type="text" required />
                        </div>
                    </div>

                    <!-- Email Field -->
                    <div class="space-y-xs">
                        <label class="font-label-md text-label-md text-on-surface-variant ml-xs"
                            for="email">{{ __('Correo Electrónico') }}</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-sm flex items-center pointer-events-none">
                                <span
                                    class="material-symbols-outlined text-outline group-focus-within:text-secondary transition-colors"
                                    data-icon="mail">mail</span>
                            </div>
                            <input
                                class="block w-full pl-xl pr-md py-4 bg-surface-container-lowest border border-outline-variant rounded-xl text-on-surface placeholder-outline-variant focus:outline-none focus:ring-2 focus:ring-secondary/20 focus:border-secondary transition-all"
                                id="email" name="email" placeholder="{{ __('charlie@wonka.com') }}"
                                value="{{ old('email') }}" type="email" required />
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div class="space-y-xs">
                        <label class="font-label-md text-label-md text-on-surface-variant ml-xs"
                            for="password">{{ __('Contraseña') }}</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-sm flex items-center pointer-events-none">
                                <span
                                    class="material-symbols-outlined text-outline group-focus-within:text-secondary transition-colors"
                                    data-icon="lock">lock</span>
                            </div>
                            <input
                                class="block w-full pl-xl pr-md py-4 bg-surface-container-lowest border border-outline-variant rounded-xl text-on-surface placeholder-outline-variant focus:outline-none focus:ring-2 focus:ring-secondary/20 focus:border-secondary transition-all"
                                id="password" name="password" placeholder="••••••••••••" type="password" required />
                        </div>
                    </div>

                    <!-- Register Button -->
                    <div class="pt-base">
                        <button
                            class="w-full flex justify-center items-center py-4 px-md rounded-xl bg-primary-container text-on-primary font-label-md text-label-md uppercase tracking-widest hover:bg-primary transition-all shadow-sm active:scale-[0.98]"
                            type="submit">
                            {{ __('Registrarse') }}
                        </button>
                    </div>

                    <div class="text-center pt-base">
                        <p class="font-label-sm text-label-sm text-on-surface-variant">
                            {{ __('¿Ya tienes una cuenta?') }}
                            <a href="/" class="font-semibold text-secondary hover:underline ml-xs">{{ __('Inicia sesión aquí') }}</a>
                        </p>
                    </div>
                </form>

                <!-- Support Footer -->
                <div
                    class="pt-lg border-t border-surface-variant flex flex-col sm:flex-row justify-between items-center gap-md">
                    <p class="font-label-sm text-label-sm text-on-surface-variant">{{ __('¿Necesitas ayuda?') }}</p>
                    <div class="flex gap-md">
                        <button
                            class="flex items-center gap-xs font-label-sm text-label-sm text-secondary hover:opacity-80">
                            <span class="material-symbols-outlined text-label-sm"
                                data-icon="contact_support">contact_support</span>
                            {{ __('Soporte') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Background Decorative Elements -->
    <div
        class="fixed top-0 right-0 -z-10 w-64 h-64 bg-secondary-container/5 rounded-full blur-3xl transform translate-x-1/2 -translate-y-1/2">
    </div>
    <div
        class="fixed bottom-0 left-0 -z-10 w-96 h-96 bg-primary-fixed-dim/5 rounded-full blur-3xl transform -translate-x-1/2 translate-y-1/2">
    </div>
</body>

</html>
