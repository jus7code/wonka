<!DOCTYPE html>
<html class="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
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
            font-variation-settings: 'FILL' 0, 'wght' 200, 'GRAD' 0, 'opsz' 24;
        }

        .active-nav-fill {
            font-variation-settings: 'FILL' 1;
        }
    </style>
    @yield('styles')
</head>

<body class="bg-background text-on-background font-body-md min-h-screen flex">
    @if (auth()->check() && auth()->user()->role === 'client')
        <!-- Full-screen client view layout (no sidebar) -->
    @else
        @include('layouts.sidebar')
    @endif
    
    <!-- Main Content Area -->
    <main class="flex-1 {{ auth()->check() && auth()->user()->role === 'client' ? '' : 'md:ml-[280px]' }} flex flex-col min-w-0 min-h-screen">
        @if (auth()->check() && auth()->user()->role === 'client')
            <!-- Client Top Navigation Bar -->
            <nav class="flex justify-between items-center w-full px-6 py-3 h-16 sticky top-0 z-50 bg-stone-50 dark:bg-stone-900 border-b border-stone-200 dark:border-stone-800 shadow-sm shrink-0">
                <div class="flex items-center gap-8">
                    <span class="text-xl font-bold text-amber-900 dark:text-amber-50 tracking-tight">{{ __('Artisanal Logistics') }}</span>
                    <div class="hidden md:flex gap-6">
                        <a class="font-inter text-sm font-semibold {{ request()->is('OrderChocolate') ? 'text-amber-700 dark:text-amber-300 border-b-2 border-amber-700 py-1' : 'text-stone-600 hover:text-stone-800' }}" href="/OrderChocolate">{{ __('Catalog') }}</a>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <button class="p-2 text-stone-500 hover:bg-stone-100 rounded-full transition-colors">
                        <span class="material-symbols-outlined">notifications</span>
                    </button>
                    <a href="/profile" class="p-2 text-stone-500 hover:bg-stone-100 rounded-full transition-colors flex items-center justify-center {{ request()->is('profile') ? 'text-amber-700' : '' }}" title="{{ __('Perfil') }}">
                        <span class="material-symbols-outlined">settings</span>
                    </a>
                    <a href="/logout" class="p-2 text-stone-500 hover:bg-stone-100 rounded-full transition-colors flex items-center justify-center" title="{{ __('Cerrar Sesión') }}">
                        <span class="material-symbols-outlined">logout</span>
                    </a>
                    <a href="/profile" class="h-8 w-8 rounded-full bg-amber-800 text-white font-bold flex items-center justify-center overflow-hidden border border-outline-variant shadow-inner shrink-0 text-[11px]" title="{{ __('Mi Perfil') }}">
                        @if (auth()->check() && auth()->user()->profile_image)
                            <img alt="User profile" class="w-full h-full object-cover" src="{{ auth()->user()->profile_image }}"/>
                        @else
                            {{ auth()->check() ? strtoupper(substr(auth()->user()->name, 0, 2)) : 'CL' }}
                        @endif
                    </a>
                </div>
            </nav>
        @else
            @yield('header')
        @endif
        
        @yield('content')
    </main>

    @yield('scripts')

    @if (auth()->check() && auth()->user()->role === 'admin')
        <!-- Administrative Header Decorator: Hides search and help spaces for clean sidebar workflow -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // 1. Locate and hide search input containers
                const searchInputs = document.querySelectorAll('header input[placeholder*="Search"], header input[placeholder*="search"], header input[placeholder*="Buscar"], header input[placeholder*="clientes"]');
                searchInputs.forEach(input => {
                    const container = input.closest('.relative');
                    if (container) {
                        container.style.setProperty('display', 'none', 'important');
                    } else {
                        input.style.setProperty('display', 'none', 'important');
                    }
                });

                // 2. Locate and hide "Help" buttons, spans, or links
                const headerElements = document.querySelectorAll('header button, header span, header a');
                headerElements.forEach(el => {
                    const text = el.textContent.trim().toLowerCase();
                    if (text === 'help' || text === 'ayuda') {
                        el.style.setProperty('display', 'none', 'important');
                        
                        // Hide container wrappers (like margin dividers)
                        const parent = el.parentElement;
                        if (parent && (parent.classList.contains('mr-6') || parent.classList.contains('mr-4') || parent.classList.contains('border-r') || parent.classList.contains('pr-4'))) {
                            parent.style.setProperty('display', 'none', 'important');
                        }
                    }
                });
            });
        </script>
    @endif
</body>

</html>
