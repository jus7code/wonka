<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>{{ __('Client Purchase Portal | Artisanal Logistics') }}</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
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
                    "label-md": ["14px", {"lineHeight": "20px", "letterSpacing": "0.01em", "fontWeight": "500"}],
                    "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                    "headline-lg": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                    "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                    "display-xl": ["48px", {"lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                    "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                    "label-sm": ["12px", {"lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "600"}]
            }
          },
        },
      }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        body {
            background-color: #fff8f5;
        }
    </style>
</head>
<body class="font-body-md text-on-background">
<!-- TopNavBar -->
<nav class="flex justify-between items-center w-full px-6 py-3 h-16 sticky top-0 z-50 bg-stone-50 dark:bg-stone-900 border-b border-stone-200 dark:border-stone-800 shadow-sm">
<div class="flex items-center gap-8">
<span class="text-xl font-bold text-amber-900 dark:text-amber-50 tracking-tight">{{ __('Artisanal Logistics') }}</span>
<div class="hidden md:flex gap-6">
<a class="font-inter text-sm font-semibold text-amber-700 dark:text-amber-300 border-b-2 border-amber-700 py-1" href="/OrderChocolate">{{ __('Catalog') }}</a>

</div>
</div>
<div class="flex items-center gap-4">
<button class="p-2 text-stone-500 hover:bg-stone-100 rounded-full transition-colors">
<span class="material-symbols-outlined" data-icon="notifications">notifications</span>
</button>
<a href="/profile" class="p-2 text-stone-500 hover:bg-stone-100 rounded-full transition-colors flex items-center justify-center" title="{{ __('Perfil') }}">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
</a>
<a href="/logout" class="p-2 text-stone-500 hover:bg-stone-100 rounded-full transition-colors flex items-center justify-center" title="{{ __('Cerrar Sesión') }}">
<span class="material-symbols-outlined" data-icon="logout">logout</span>
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
<main class="max-w-[1400px] mx-auto px-margin py-lg">
    <!-- Dynamic Success/Error Alerts -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl flex items-center gap-3 text-green-800 text-sm font-semibold animate-in fade-in duration-200">
            <span class="material-symbols-outlined text-green-600 text-lg">check_circle</span>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl flex items-center gap-3 text-red-800 text-sm font-semibold animate-in fade-in duration-200">
            <span class="material-symbols-outlined text-red-600 text-lg">error</span>
            <div>{{ session('error') }}</div>
        </div>
    @endif
    
    @if($errors->any())
        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl text-red-800 text-sm space-y-1">
            <div class="flex items-center gap-2 font-bold mb-1">
                <span class="material-symbols-outlined text-red-600 text-lg">error</span>
                <span>{{ __('Por favor corrija lo siguiente:') }}</span>
            </div>
            <ul class="list-disc list-inside pl-4 font-medium">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


<!-- Product Catalog Header -->
<section class="flex flex-col md:flex-row justify-between items-end mb-md gap-4">
<div>
<h2 class="font-headline-lg text-primary">{{ __('Current Batch Offerings') }}</h2>
<p class="font-body-md text-on-surface-variant">{{ __('Filter by origin, percentage, or volume.') }}</p>
</div>
<div class="flex gap-base">
<button class="flex items-center gap-2 px-4 py-2 bg-white border border-outline-variant rounded-lg text-label-md">
<span class="material-symbols-outlined" data-icon="filter_list">filter_list</span>
                    {{ __('Filters') }}
                </button>
<button class="flex items-center gap-2 px-4 py-2 bg-white border border-outline-variant rounded-lg text-label-md">
<span class="material-symbols-outlined" data-icon="sort">sort</span>
                    {{ __('Sort by Price') }}
                </button>
</div>
</section>
<!-- Main Portal Columns -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
    
    <!-- Left Column: Products Grid (Spans 2 columns on large screens) -->
    <div class="lg:col-span-2 space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse ($productos as $p)
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-stone-200 group transition-all hover:shadow-md flex flex-col justify-between h-[450px]">
                    <div class="h-48 relative overflow-hidden bg-stone-100 shrink-0">
                        @if ($p->imagen)
                            <img alt="{{ $p->nombre }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ $p->imagen }}"/>
                        @else
                            <img alt="{{ $p->nombre }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAgF7fSk6fDz9vIlnml-CFQSpw863jKTKUZQD-m-Q2R-UiI6Qoeyv-e0p5LdCytUpQZRE2UJL9HfK7gZloKGs7ZU91dgvoq7qX6W2lSotzkNbBv7rPAPPWOLONcVX0m1wM4Fb8RrGJMl91rGdsSQTBp3wzuOhzjWrNx8ClWLvMSatcUkTJFTfsu-9v2GRHEqKcW0SFC-7lmNRdDzZPIqmByGos_VjKJIl3QeiP-X2WKc8W_GMDHV0CqdKCY_sHVuCR_FtNXmJ-l-A"/>
                        @endif
                        <div class="absolute top-4 left-4">
                            <span class="bg-amber-100 text-amber-900 text-[10px] px-3 py-1 rounded-full font-black uppercase tracking-wider border border-amber-200">{{ $p->categoria ? $p->categoria->nombre : __('Fórmula') }}</span>
                        </div>
                    </div>
                    <div class="p-5 flex-1 flex flex-col justify-between">
                        <div class="space-y-2">
                            <div class="flex justify-between items-start gap-2">
                                <h3 class="font-bold text-stone-800 text-md truncate" title="{{ $p->nombre }}">{{ $p->nombre }}</h3>
                                <span class="font-black text-amber-900 text-md shrink-0">${{ number_format($p->precio_unitario, 2) }}</span>
                            </div>
                            <div class="text-[11px] text-stone-500 flex items-center gap-1">
                                <span class="material-symbols-outlined text-xs">package_2</span>
                                <span>Empaque: <strong>{{ $p->tipo_empaque ?? __('Estándar') }}</strong></span>
                            </div>
                            <p class="text-xs text-stone-500 leading-relaxed line-clamp-3" title="{{ $p->descripcion ?? __('Esta es una formulación exclusiva de la fábrica Wonka, combinando granos finos de aroma seleccionados y tostados con maestría para lograr un sabor inigualable.') }}">
                                {{ $p->descripcion ?? __('Esta es una formulación exclusiva de la fábrica Wonka, combinando granos finos de aroma seleccionados y tostados con maestría para lograr un sabor inigualable.') }}
                            </p>
                        </div>
                        
                        <div class="pt-4 border-t border-stone-100 flex items-center justify-between text-xs text-stone-400">
                            <span>Unidad: {{ $p->unidad_medida ?? __('Cajas') }}</span>
                            <button onclick="openOrderModal({{ json_encode($p) }})" class="px-4 py-2 bg-amber-900 hover:bg-amber-850 text-white rounded-xl text-[11px] font-bold transition-colors flex items-center gap-1 shadow-sm">
                                <span class="material-symbols-outlined text-xs">shopping_bag</span>
                                {{ __('Pedir Chocolate') }}
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-2 bg-white rounded-2xl p-12 text-center border border-stone-200">
                    <span class="material-symbols-outlined text-display-xl text-stone-300 mb-4" data-icon="sentiment_dissatisfied">sentiment_dissatisfied</span>
                    <h3 class="text-md font-bold text-stone-800 mb-1">{{ __('No hay chocolates disponibles') }}</h3>
                    <p class="text-xs text-stone-500">{{ __('No se encontraron productos compuestos de chocolate activos para la venta actualmente.') }}</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Right Column: Recent Sales Orders History (Bento Panel) -->
    <div class="bg-white rounded-2xl border border-stone-200 p-6 shadow-sm space-y-6 lg:col-span-1 shrink-0">
        <div class="flex items-center gap-2 pb-4 border-b border-stone-100">
            <span class="material-symbols-outlined text-amber-900 text-xl">history</span>
            <h3 class="text-md font-bold text-stone-800">{{ __('Mis Pedidos Recientes') }}</h3>
        </div>
        
        <div class="space-y-4">
            @forelse ($pedidos as $pedido)
                <div class="p-4 rounded-xl border border-stone-100 hover:border-amber-900/20 bg-stone-50/50 transition-all space-y-3">
                    <div class="flex justify-between items-center text-xs">
                        <span class="font-mono font-bold text-stone-600">PEDIDO #{{ $pedido->id }}</span>
                        @if ($pedido->estado === 'completado')
                            <span class="px-2.5 py-1 bg-green-100 text-green-800 font-black text-[9px] uppercase rounded-full border border-green-200">{{ __('Completado') }}</span>
                        @else
                            <span class="px-2.5 py-1 bg-amber-100 text-amber-800 font-black text-[9px] uppercase rounded-full border border-amber-200">{{ __('Pendiente') }}</span>
                        @endif
                    </div>
                    
                    <div class="flex justify-between items-center text-xs font-semibold">
                        <span class="text-stone-500 font-normal">{{ \Carbon\Carbon::parse($pedido->fecha)->format('d M, Y') }}</span>
                        <span class="text-stone-800">${{ number_format($pedido->total, 2) }}</span>
                    </div>
                </div>
            @empty
                <div class="text-center py-8 text-stone-400 italic text-xs">
                    <span class="material-symbols-outlined text-display-lg block mb-2 opacity-50" data-icon="receipt_long">receipt_long</span>
                    {{ __('Aún no has realizado pedidos de venta.') }}
                </div>
            @endforelse
        </div>

        <div class="pt-4 border-t border-stone-100 text-center">
            <p class="text-[10px] text-stone-400 leading-relaxed uppercase tracking-wider font-mono">
                {{ __('Los pedidos pendientes serán despachados e integrados al balance contable por el área de almacén.') }}
            </p>
        </div>
    </div>

</div>
<!-- Support Section -->

</main>
<footer class="bg-stone-50 border-t border-stone-200 mt-xl py-xl">

<div class="max-w-[1400px] mx-auto px-margin mt-xl pt-md border-t border-stone-200 flex flex-col md:flex-row justify-between text-label-sm text-outline">
<span>© 2023 Artisanal Logistics. All rights reserved.</span>
<div class="flex gap-md">
<a href="#">{{ __('Privacy Policy') }}</a>
<a href="#">{{ __('Terms of Service') }}</a>
</div>
</div>
</footer>

    <!-- Order Placement Modal Overlay -->
    <div id="placeOrderModal" class="fixed inset-0 z-[100] flex items-center justify-center hidden bg-stone-900/60 backdrop-blur-sm p-4 animate-in fade-in duration-200">
        <div class="bg-white rounded-2xl border border-stone-200 max-w-md w-full p-6 shadow-xl relative animate-in fade-in zoom-in duration-200">
            <!-- Modal Close button -->
            <button type="button" onclick="document.getElementById('placeOrderModal').classList.add('hidden')" class="absolute top-4 right-4 text-stone-400 hover:text-stone-600 transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>

            <!-- Modal Header -->
            <div class="flex items-center gap-2 mb-4">
                <span class="material-symbols-outlined text-amber-900 text-2xl">shopping_cart_checkout</span>
                <h3 class="text-xl font-bold text-primary">{{ __('Realizar Pedido') }}</h3>
            </div>
            
            <p class="text-xs text-stone-500 mb-6 leading-relaxed">
                {{ __('Ingresa la cantidad de cajas de chocolate que deseas solicitar para esta formulación artesanal.') }}
            </p>

            <!-- Order Form -->
            <form action="{{ route('order.place') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="id_producto" id="modal_id_producto" />
                <input type="hidden" name="precio_unitario" id="modal_precio_unitario" />

                <!-- Product Details Info Card -->
                <div class="p-4 bg-amber-900/5 border border-amber-900/10 rounded-xl space-y-1">
                    <div class="text-[10px] text-amber-900 font-mono uppercase tracking-wider">{{ __('Chocolate Compuesto') }}</div>
                    <div id="modal_product_name" class="text-sm font-bold text-stone-800"></div>
                    <div class="text-xs text-stone-500 flex justify-between">
                        <span>Precio Unitario: <strong id="modal_product_price_label"></strong></span>
                        <span id="modal_product_unit_label"></span>
                    </div>
                </div>

                <!-- Quantity Input -->
                <div class="flex flex-col gap-xs">
                    <label class="text-sm font-semibold text-stone-700 mb-1" for="modal_cantidad">{{ __('Cantidad (Cajas)') }}</label>
                    <input name="cantidad" id="modal_cantidad" type="number" min="1" value="1" step="1" oninput="calculateTotal()" class="w-full bg-white border border-stone-200 rounded-xl p-3 text-sm outline-none focus:border-amber-700 transition-all font-bold" required />
                </div>

                <!-- Total Estimado Card -->
                <div class="pt-4 border-t border-stone-100 flex justify-between items-center text-sm">
                    <span class="font-bold text-stone-700">{{ __('Total Estimado') }}</span>
                    <span id="modal_total_estimate" class="text-md font-black text-amber-900">$0.00</span>
                </div>

                <!-- Actions -->
                <div class="pt-4 flex gap-4">
                    <button type="button" onclick="document.getElementById('placeOrderModal').classList.add('hidden')" class="w-1/2 py-3 border border-stone-200 text-stone-600 rounded-xl font-bold hover:bg-stone-50 transition-colors text-sm">
                        {{ __('Cancelar') }}
                    </button>
                    <button type="submit" class="w-1/2 py-3 bg-amber-900 text-white rounded-xl font-bold shadow-lg shadow-amber-900/10 hover:opacity-95 transition-opacity text-sm flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-md">check_circle</span>
                        {{ __('Enviar Pedido') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Javascript modal calculation helpers -->
    <script>
        let currentProductPrice = 0;

        function openOrderModal(product) {
            currentProductPrice = parseFloat(product.precio_unitario) || 0;

            // Populates values
            document.getElementById('modal_id_producto').value = product.id;
            document.getElementById('modal_precio_unitario').value = currentProductPrice;
            document.getElementById('modal_product_name').innerText = product.nombre;
            document.getElementById('modal_product_price_label').innerText = '$' + currentProductPrice.toFixed(2);
            document.getElementById('modal_product_unit_label').innerText = 'Unidad: ' + (product.unidad_medida || 'Cajas');

            // Reset quantity and total
            document.getElementById('modal_cantidad').value = 1;
            calculateTotal();

            // Display modal overlay
            document.getElementById('placeOrderModal').classList.remove('hidden');
        }

        function calculateTotal() {
            const qtyInput = document.getElementById('modal_cantidad');
            let qty = parseInt(qtyInput.value) || 0;
            if (qty < 1) qty = 1;
            
            const total = qty * currentProductPrice;
            document.getElementById('modal_total_estimate').innerText = '$' + total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        }
    </script>
</body></html>