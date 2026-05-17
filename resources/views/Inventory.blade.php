@extends('layouts.app')

@section('header')
    <header
            class="bg-stone-50 dark:bg-stone-900 border-b border-stone-200 dark:border-stone-800 shadow-sm flex justify-between items-center w-full px-6 py-3 h-16 sticky top-0 z-50">
            <div class="flex items-center gap-md">
                <span class="text-xl font-bold text-amber-900 dark:text-amber-50 tracking-tight">{{ __('Artisanal Logistics') }}</span>
            </div>
            <div class="flex items-center gap-sm">
            </div>
        </header>
@endsection

@section('content')
    <!-- Page Canvas -->
    <div class="p-8 lg:p-12 space-y-10">
    
    <!-- Notifications and Alerts -->
    @if (session('success'))
        <div class="p-sm rounded-xl bg-green-50 text-green-800 border border-green-200 flex items-center gap-xs shadow-sm animate-in fade-in duration-300">
            <span class="material-symbols-outlined text-[20px]">check_circle</span>
            <span class="font-label-md text-label-md font-medium">{{ session('success') }}</span>
        </div>
    @endif
    @if ($errors->any())
        <div class="p-sm rounded-xl bg-error-container text-on-error-container border border-error/20 flex flex-col gap-xs shadow-sm animate-in fade-in duration-300">
            <div class="flex items-center gap-xs font-semibold">
                <span class="material-symbols-outlined text-[20px]">warning</span>
                <span>{{ __('Atención') }}</span>
            </div>
            <ul class="text-xs list-disc list-inside opacity-90 pl-xs">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Header Section -->
    <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6">
    <div class="space-y-2">
    <div class="flex items-center gap-2 text-secondary font-semibold text-sm tracking-wide uppercase">
    <span class="material-symbols-outlined text-sm" data-icon="analytics">analytics</span>
                            {{ __('Catálogo Maestro') }}
                        </div>
    <h2 class="text-4xl font-bold text-primary tracking-tight">{{ __('Gestión de Inventario') }}</h2>
    <p class="text-outline max-w-2xl">{{ __('Monitorea el stock en tiempo real de los lotes de chocolate artesanal, gestiona el inventario activo y coordina la distribución logística en la fábrica.') }}</p>
    </div>
    <div class="flex items-center gap-4 shrink-0">
    <button onclick="document.getElementById('craftModal').classList.remove('hidden'); initLabelDesigner();" class="flex items-center gap-2 px-5 py-3 border-2 border-amber-800 text-amber-800 rounded-xl font-bold text-sm hover:bg-amber-50/50 transition-colors active:opacity-80">
    <span class="material-symbols-outlined text-lg">palette</span>
                            {{ __('Diseñar & Fabricar') }}
                        </button>
    <button onclick="document.getElementById('withdrawModal').classList.remove('hidden')" class="flex items-center gap-2 px-5 py-3 border-2 border-secondary text-secondary rounded-xl font-bold text-sm hover:bg-secondary-container/20 transition-colors active:opacity-80">
    <span class="material-symbols-outlined text-lg" data-icon="outbox">outbox</span>
                            {{ __('Retirar Lote') }}
                        </button>
    <a href="/batchregister" class="flex items-center gap-2 px-5 py-3 bg-primary text-on-primary rounded-xl font-bold text-sm shadow-lg shadow-primary/20 hover:scale-[1.02] transition-all active:scale-[0.98]">
    <span class="material-symbols-outlined text-lg" data-icon="assignment_add">assignment_add</span>
                            {{ __('Registrar Lote') }}
                        </a>
    </div>
    </div>

    <!-- Dashboard Stats Summary -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-100 flex flex-col justify-between hover:shadow-md transition-shadow">
    <div class="flex justify-between items-start">
    <span class="text-outline text-xs font-bold uppercase tracking-wider">{{ __('Inventario Total') }}</span>
    <span class="p-2 bg-surface-container rounded-lg"><span class="material-symbols-outlined text-primary text-xl" data-icon="inventory">inventory</span></span>
    </div>
    <div class="mt-4">
    <div class="text-3xl font-black text-primary">{{ number_format($totalInventory) }} cajas</div>
    <div class="text-xs text-green-600 font-bold mt-1 flex items-center gap-1">
    <span class="material-symbols-outlined text-sm" data-icon="trending_up">trending_up</span>
                                En stock disponible
                            </div>
    </div>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-100 flex flex-col justify-between hover:shadow-md transition-shadow">
    <div class="flex justify-between items-start">
    <span class="text-outline text-xs font-bold uppercase tracking-wider">{{ __('Lotes Activos') }}</span>
    <span class="p-2 bg-surface-container rounded-lg"><span class="material-symbols-outlined text-primary text-xl" data-icon="layers">layers</span></span>
    </div>
    <div class="mt-4">
    <div class="text-3xl font-black text-primary">{{ $activeBatches }}</div>
    <div class="text-xs text-outline font-bold mt-1">Lotes listos en almacén</div>
    </div>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-100 flex flex-col justify-between hover:shadow-md transition-shadow">
    <div class="flex justify-between items-start">
    <span class="text-outline text-xs font-bold uppercase tracking-wider">{{ __('Alertas Stock Bajo') }}</span>
    <span class="p-2 bg-error-container/30 rounded-lg"><span class="material-symbols-outlined text-error text-xl" data-icon="warning">warning</span></span>
    </div>
    <div class="mt-4">
    <div class="text-3xl font-black text-error">{{ str_pad($lowStockAlerts, 2, '0', STR_PAD_LEFT) }}</div>
    <div class="text-xs text-error font-bold mt-1">Lotes con stock < 10 cajas</div>
    </div>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-100 flex flex-col justify-between hover:shadow-md transition-shadow">
    <div class="flex justify-between items-start">
    <span class="text-outline text-xs font-bold uppercase tracking-wider">{{ __('Capacidad Ocupada') }}</span>
    <span class="p-2 bg-surface-container rounded-lg"><span class="material-symbols-outlined text-primary text-xl" data-icon="warehouse">warehouse</span></span>
    </div>
    <div class="mt-4">
    <div class="text-3xl font-black text-primary">{{ $storageCapacity }}%</div>
    <div class="w-full bg-stone-100 h-1.5 rounded-full mt-2">
    <div class="bg-secondary h-full rounded-full" style="width: {{ $storageCapacity }}%"></div>
    </div>
    </div>
    </div>
    </div>

    <!-- CRUD Table Section -->
    <div class="bg-white rounded-2xl shadow-sm border border-stone-100 overflow-hidden">
    <div class="p-6 border-b border-stone-100 flex flex-col md:flex-row justify-between items-center gap-4">
    <div class="flex items-center gap-4 w-full md:w-auto">
    <div class="relative w-full md:w-80">
    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-lg" data-icon="filter_list">filter_list</span>
    <select class="w-full appearance-none bg-stone-50 border border-stone-200 rounded-lg pl-10 pr-8 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-secondary/20">
    <option>{{ __('Todas las Categorías') }}</option>
    </select>
    </div>
    </div>
    <div class="flex items-center gap-2 text-xs font-bold text-outline">
                            {{ __('Total de lotes en base de datos: ') }} {{ count($lotes) }}
    </div>
    </div>
    <div class="overflow-x-auto">
    <table class="w-full text-left border-collapse">
    <thead>
    <tr class="bg-stone-50 border-b border-stone-200 text-outline text-[10px] uppercase tracking-widest font-black">
    <th class="px-6 py-4 w-12"><input class="rounded border-stone-300 text-primary focus:ring-primary" type="checkbox"/></th>
    <th class="px-6 py-4">{{ __('Detalles del Producto') }}</th>
    <th class="px-6 py-4">{{ __('Categoría') }}</th>
    <th class="px-6 py-4">{{ __('Stock Actual') }}</th>
    <th class="px-6 py-4">{{ __('Código QR de Lote') }}</th>
    <th class="px-6 py-4">{{ __('Estado') }}</th>
    <th class="px-6 py-4 text-right">{{ __('Acciones') }}</th>
    </tr>
    </thead>
    <tbody class="divide-y divide-stone-100">
    @forelse ($lotes as $lote)
        <tr class="table-row-hover group">
        <td class="px-6 py-5"><input class="rounded border-stone-300 text-primary focus:ring-primary" type="checkbox"/></td>
        <td class="px-6 py-5">
        <div class="flex items-center gap-4">
        <div class="w-12 h-12 rounded-lg overflow-hidden flex-shrink-0 flex items-center justify-center text-secondary border border-stone-200/50 bg-stone-50">
            @if ($lote->producto->imagen)
                <img src="{{ asset($lote->producto->imagen) }}" class="w-full h-full object-cover" alt="{{ $lote->producto->nombre }}" />
            @else
                <span class="material-symbols-outlined text-2xl">coffee</span>
            @endif
        </div>
        <div>
        <div class="font-bold text-primary">{{ $lote->producto->nombre }}</div>
        <div class="text-xs text-outline flex items-center gap-1.5 flex-wrap">
            <span>SKU: PROD-{{ str_pad($lote->producto->id, 4, '0', STR_PAD_LEFT) }}</span>
            @if ($lote->lineaProduccion)
                <span class="text-stone-300">|</span>
                <span class="px-1.5 py-0.5 rounded bg-secondary/10 text-secondary font-semibold text-[10px]">{{ $lote->lineaProduccion->nombre }}</span>
            @endif
        </div>
        </div>
        </div>
        </td>
        <td class="px-6 py-5">
        <span class="text-sm text-on-surface">{{ $lote->producto->categoria->nombre }}</span>
        </td>
        <td class="px-6 py-5">
        <div class="text-sm font-bold text-primary">{{ number_format($lote->cantidad) }} cajas</div>
        @if ($lote->cantidad < 10)
            <div class="text-[10px] text-error uppercase font-black tracking-tight font-semibold">{{ __('Bajo Stock') }}</div>
        @else
            <div class="text-[10px] text-green-600 uppercase font-black tracking-tight font-semibold">{{ __('Nivel Óptimo') }}</div>
        @endif
        </td>
        <td class="px-6 py-5">
        <div class="flex items-center gap-1.5">
            <span class="font-mono text-xs text-outline bg-stone-50 px-2 py-1 rounded border border-stone-200">{{ $lote->qr_code }}</span>
            <button type="button" onclick="openStickerModal('{{ $lote->id }}', '{{ addslashes($lote->producto->nombre) }}', '{{ $lote->fecha_ingreso }}', '{{ $lote->qr_code }}')" class="p-1 hover:bg-secondary/15 rounded text-secondary transition-colors inline-flex items-center justify-center" title="{{ __('Imprimir Sticker QR') }}">
                <span class="material-symbols-outlined text-[18px]">qr_code_2</span>
            </button>
        </div>
        </td>
        <td class="px-6 py-5">
        @if ($lote->estado === 'en_stock')
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
            <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-1.5 animate-pulse"></span>
                                                    {{ __('Disponible') }}
                                                </span>
        @elseif ($lote->estado === 'reservado')
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800 border border-amber-200">
            <span class="w-1.5 h-1.5 rounded-full bg-amber-500 mr-1.5"></span>
                                                    {{ __('Reservado') }}
                                                </span>
        @else
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-stone-100 text-stone-800 border border-stone-200">
            <span class="w-1.5 h-1.5 rounded-full bg-stone-500 mr-1.5"></span>
                                                    {{ __('Agotado') }}
                                                </span>
        @endif
        </td>
        <td class="px-6 py-5 text-right">
        <div class="flex items-center justify-end gap-2">
            <!-- Delete Action with CSRF -->
            <form action="{{ route('inventory.destroy', $lote->id) }}" method="POST" onsubmit="return confirm('¿Estás completamente seguro de eliminar permanentemente este lote de producción?');" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="p-2 text-stone-400 hover:text-error transition-colors" title="{{ __('Eliminar Lote') }}">
                    <span class="material-symbols-outlined text-lg" data-icon="delete">delete</span>
                </button>
            </form>
        </div>
        </td>
        </tr>
    @empty
        <!-- Sin Datos Disponibles Fallback -->
        <tr>
            <td colspan="7" class="px-6 py-16 text-center text-outline">
                <div class="flex flex-col items-center justify-center gap-3">
                    <span class="material-symbols-outlined text-[64px] text-stone-300">inventory_2</span>
                    <p class="font-headline-md text-headline-md text-stone-600 font-semibold">{{ __('No hay lotes disponibles') }}</p>
                    <p class="text-xs text-outline max-w-sm mx-auto leading-relaxed">{{ __('Actualmente no tienes lotes de producción registrados en la base de datos de la fábrica. Registra un nuevo lote para comenzar a poblar el catálogo maestro.') }}</p>
                    <a href="/batchregister" class="mt-2 inline-flex items-center gap-1.5 px-5 py-2.5 bg-primary text-on-primary rounded-xl font-bold text-xs hover:opacity-95 transition-opacity">
                        <span class="material-symbols-outlined text-[16px]">assignment_add</span>
                        {{ __('Registrar Primer Lote') }}
                    </a>
                </div>
            </td>
        </tr>
    @endforelse
    </tbody>
    </table>
    </div>
    <div class="p-6 bg-stone-50 border-t border-stone-200 flex justify-between items-center">
    <button class="text-sm font-bold text-outline hover:text-primary flex items-center gap-2">
    <span class="material-symbols-outlined text-sm" data-icon="download">download</span>
                            {{ __('Exportar Catálogo (CSV)') }}
                        </button>
    </div>
    </div>

    <!-- Craft / Manufacture Batch Modal overlay -->
    <div id="craftModal" class="fixed inset-0 z-[100] flex items-center justify-center hidden bg-stone-900/60 backdrop-blur-sm p-4 overflow-y-auto">
        <div class="bg-white rounded-3xl border border-stone-200 max-w-4xl w-full p-8 shadow-2xl relative animate-in fade-in zoom-in duration-200 my-8">
            <!-- Modal Close button -->
            <button type="button" onclick="document.getElementById('craftModal').classList.add('hidden')" class="absolute top-6 right-6 text-stone-400 hover:text-stone-600 transition-colors">
                <span class="material-symbols-outlined text-2xl">close</span>
            </button>

            <!-- Modal Header -->
            <div class="flex items-center gap-3 mb-6">
                <span class="p-3 bg-amber-100 rounded-2xl"><span class="material-symbols-outlined text-amber-900 text-3xl">palette</span></span>
                <div>
                    <h3 class="text-2xl font-bold text-primary">{{ __('Diseño y Fabricación de Productos Compuestos') }}</h3>
                    <p class="text-sm text-outline">{{ __('Crea un producto de venta combinando ingredientes, define su precio, y diseña su envoltura premium en tiempo real.') }}</p>
                </div>
            </div>

            <!-- Crafting Form -->
            <form action="{{ route('inventory.craft') }}" method="POST" enctype="multipart/form-data" id="craftForm" class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                @csrf

                <!-- Left Column: Product Information & Recipe Ingredients (7 cols) -->
                <div class="lg:col-span-7 space-y-6">
                    <h4 class="font-bold text-stone-700 text-md pb-2 border-b border-stone-100 flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">recipe</span>
                        {{ __('1. Receta y Detalles del Producto') }}
                    </h4>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex flex-col gap-1">
                            <label class="text-sm font-semibold text-stone-700" for="craft_nombre">{{ __('Nombre del Nuevo Producto') }}</label>
                            <input required type="text" name="nombre" id="craft_nombre" oninput="updateLabelText(this.value)" placeholder="e.g. Wonka Gold Blend" class="px-4 py-3 border border-stone-200 rounded-xl bg-stone-50 focus:bg-white focus:border-amber-700 focus:ring-0 text-sm transition-all">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="text-sm font-semibold text-stone-700" for="craft_precio">{{ __('Precio de Venta ($ por caja)') }}</label>
                            <input required type="number" step="0.01" min="0" name="precio_unitario" id="craft_precio" placeholder="e.g. 29.99" class="px-4 py-3 border border-stone-200 rounded-xl bg-stone-50 focus:bg-white focus:border-amber-700 focus:ring-0 text-sm transition-all">
                        </div>
                    </div>

                    <div class="flex flex-col gap-1">
                        <label class="text-sm font-semibold text-stone-700" for="craft_cantidad">{{ __('Cantidad a Fabricar (cajas a producir)') }}</label>
                        <input required type="number" min="1" name="cantidad" id="craft_cantidad" placeholder="e.g. 10" class="px-4 py-3 border border-stone-200 rounded-xl bg-stone-50 focus:bg-white focus:border-amber-700 focus:ring-0 text-sm transition-all">
                        <p class="text-xs text-outline italic">{{ __('Esta cantidad multiplicará las proporciones de ingredientes para consumir del almacén.') }}</p>
                    </div>

                    <div class="flex flex-col gap-1">
                        <label class="text-sm font-semibold text-stone-700" for="craft_descripcion">{{ __('Descripción del Producto Compuesto') }}</label>
                        <textarea name="descripcion" id="craft_descripcion" rows="3" placeholder="{{ __('e.g. Una deliciosa combinación de chocolate oscuro con trozos de almendra tostada y un toque de sal marina de Madagascar.') }}" class="px-4 py-3 border border-stone-200 rounded-xl bg-stone-50 focus:bg-white focus:border-amber-700 focus:ring-0 text-sm transition-all"></textarea>
                    </div>

                    <!-- Recipe Ingredients Selector -->
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <label class="text-sm font-semibold text-stone-700">{{ __('Seleccionar Ingredientes del Inventario') }}</label>
                            <button type="button" onclick="addIngredientRow()" class="px-3 py-1.5 bg-amber-50 hover:bg-amber-100 text-amber-800 text-xs font-bold rounded-lg transition-colors flex items-center gap-1">
                                <span class="material-symbols-outlined text-xs">add</span> {{ __('Añadir Ingrediente') }}
                            </button>
                        </div>

                        <!-- Ingredients Rows Container -->
                        <div id="ingredients_container" class="space-y-3 max-h-[180px] overflow-y-auto pr-1">
                            <!-- Rows will be added dynamically by JS -->
                        </div>
                    </div>
                </div>

                <!-- Right Column: Visual Label Designer Studio (5 cols) -->
                <div class="lg:col-span-5 space-y-6">
                    <h4 class="font-bold text-stone-700 text-md pb-2 border-b border-stone-100 flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">palette</span>
                        {{ __('2. Envoltura e Imagen') }}
                    </h4>

                    <!-- Toggle: upload or design -->
                    <div class="flex bg-stone-100 p-1.5 rounded-xl gap-1">
                        <button type="button" id="toggle_design_btn" onclick="setImageOption('design')" class="flex-1 py-2 text-xs font-bold rounded-lg bg-white text-amber-900 shadow-sm transition-all">
                            {{ __('Diseñador Wonka') }}
                        </button>
                        <button type="button" id="toggle_upload_btn" onclick="setImageOption('upload')" class="flex-1 py-2 text-xs font-bold rounded-lg text-stone-600 hover:text-stone-800 transition-all">
                            {{ __('Subir Foto') }}
                        </button>
                    </div>
                    <input type="hidden" name="imagen_opcion" id="imagen_opcion" value="design">

                    <!-- Option A: Studio Canvas Wrapper Designer -->
                    <div id="option_design_container" class="space-y-4">
                        <!-- Wrapper Preview Screen -->
                        <div class="relative overflow-hidden w-full h-[200px] rounded-2xl shadow-inner border border-stone-100 flex items-center justify-center bg-stone-100">
                            <!-- Beautiful Candy Bar Mockup -->
                            <div id="wrapper_preview" class="w-[280px] h-[160px] rounded-xl shadow-lg relative flex flex-col justify-between p-4 text-white overflow-hidden transition-all duration-300" style="background: linear-gradient(135deg, #5c3d2e 0%, #3d251e 100%);">
                                <div class="absolute inset-y-0 left-0 w-3 bg-black/10 blur-[1px]"></div>
                                <div class="absolute inset-y-0 right-0 w-3 bg-black/15 blur-[1px]"></div>
                                <div class="absolute inset-x-0 top-0 h-3 bg-white/10 blur-[1px]"></div>
                                <div class="absolute inset-x-0 bottom-0 h-3 bg-black/20 blur-[1px]"></div>
                                
                                <div id="wrapper_pattern_layer" class="absolute inset-0 opacity-15 pointer-events-none" style="background-image: radial-gradient(circle, #fff 10%, transparent 11%); background-size: 15px 15px;"></div>

                                <div class="text-[9px] uppercase tracking-[0.25em] text-center font-bold opacity-80 mt-1 drop-shadow-sm font-mono text-amber-200">
                                    {{ __('THE CHOCOLATE FACTORY') }}
                                </div>

                                <div class="my-auto text-center z-10 px-2 py-1.5 border border-white/20 bg-black/25 backdrop-blur-[2px] rounded-lg">
                                    <h5 id="wrapper_brand_title" class="font-serif italic text-lg leading-tight tracking-wide font-black text-amber-200">{{ __('Nuevo Producto') }}</h5>
                                    <p id="wrapper_subtitle" class="text-[9px] uppercase tracking-wider text-stone-200 font-bold mt-0.5">Gold Selection</p>
                                </div>

                                <div class="flex justify-between items-end z-10 text-[9px] font-bold opacity-90 font-mono">
                                    <span id="wrapper_cacao_badge" class="px-2 py-0.5 bg-white/20 rounded">85% {{ __('Cocoa') }}</span>
                                    <span class="text-amber-300">★ {{ __('Artesanal') }} ★</span>
                                </div>
                            </div>
                        </div>

                        <!-- Designer Controls -->
                        <div class="grid grid-cols-2 gap-3 text-xs">
                            <div class="flex flex-col gap-1.5">
                                <label class="font-semibold text-stone-600">{{ __('Fondo / Paleta') }}</label>
                                <select id="wrapper_color" onchange="updateWrapperStyles()" class="px-3 py-2 border border-stone-200 rounded-lg bg-stone-50 text-xs">
                                    <option value="classic" data-bg="linear-gradient(135deg, #5c3d2e 0%, #3d251e 100%)" data-text="#ffdfb0" data-accent="#e6c594">{{ __('Classic Chocolate') }}</option>
                                    <option value="royal" data-bg="linear-gradient(135deg, #1e3c72 0%, #2a5298 100%)" data-text="#ffffff" data-accent="#f5d061">{{ __('Royal Gold Blue') }}</option>
                                    <option value="crimson" data-bg="linear-gradient(135deg, #780206 0%, #061109 100%)" data-text="#e0a96d" data-accent="#ffffff">{{ __('Crimson Velvet') }}</option>
                                    <option value="mint" data-bg="linear-gradient(135deg, #0f2027 0%, #2c5364 100%)" data-text="#a8ff78" data-accent="#ffffff">{{ __('Emerald Dark') }}</option>
                                    <option value="pink" data-bg="linear-gradient(135deg, #ec008c 0%, #fc6767 100%)" data-text="#ffffff" data-accent="#fff275">{{ __('Wild Berry Pink') }}</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label class="font-semibold text-stone-600">{{ __('Patrón visual') }}</label>
                                <select id="wrapper_pattern" onchange="updateWrapperStyles()" class="px-3 py-2 border border-stone-200 rounded-lg bg-stone-50 text-xs">
                                    <option value="dots">{{ __('Puntos Minimalistas') }}</option>
                                    <option value="stripes">{{ __('Líneas de Lujo') }}</option>
                                    <option value="stars">{{ __('Estrellas Mágicas') }}</option>
                                    <option value="clean">{{ __('Liso / Elegante') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-3 text-xs">
                            <div class="flex flex-col gap-1.5">
                                <label class="font-semibold text-stone-600">{{ __('Subtítulo del Chocolate') }}</label>
                                <input type="text" id="wrapper_subtitle_input" oninput="updateWrapperSubtitle(this.value)" placeholder="e.g. Edición Limitada" value="Edición Limitada" class="px-3 py-2 border border-stone-200 rounded-lg bg-stone-50 text-xs">
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label class="font-semibold text-stone-600">{{ __('Porcentaje de Cacao') }}</label>
                                <select id="wrapper_cacao" onchange="updateWrapperCacao(this.value)" class="px-3 py-2 border border-stone-200 rounded-lg bg-stone-50 text-xs">
                                    <option value="55%">55% Cacao</option>
                                    <option value="70%">70% Cacao</option>
                                    <option value="85%" selected>85% Cacao</option>
                                    <option value="99%">99% Cacao</option>
                                </select>
                            </div>
                        </div>

                        <!-- Canvas Hidden Generator and Data URL input -->
                        <canvas id="designCanvas" width="400" height="300" class="hidden"></canvas>
                        <input type="hidden" name="diseno_envoltura_png" id="diseno_envoltura_png">
                    </div>

                    <!-- Option B: Dropzone File Upload -->
                    <div id="option_upload_container" class="hidden space-y-4">
                        <div id="craft_dropzone" class="border-2 border-dashed border-stone-200 hover:border-amber-700/60 rounded-2xl p-6 transition-colors duration-200 text-center cursor-pointer bg-stone-50 relative flex flex-col items-center justify-center h-[200px]">
                            <input type="file" name="imagen" id="craft_image_input" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer" onchange="handleCraftPreview(this)">
                            <div id="craft_dropzone_placeholder" class="space-y-2">
                                <span class="material-symbols-outlined text-4xl text-stone-400">upload_file</span>
                                <p class="text-sm font-semibold text-stone-600">{{ __('Arrastra tu foto o haz clic para buscar') }}</p>
                                <p class="text-xs text-stone-400">PNG, JPG o WEBP (máx. 5MB)</p>
                            </div>
                            <div id="craft_dropzone_preview" class="hidden absolute inset-0 rounded-2xl overflow-hidden bg-white">
                                <img src="" alt="Vista previa" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
                                    <span class="text-white text-xs font-bold flex items-center gap-1"><span class="material-symbols-outlined text-sm">edit</span>{{ __('Cambiar foto') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Actions -->
                    <div class="pt-6 border-t border-stone-100 flex gap-4">
                        <button type="button" onclick="document.getElementById('craftModal').classList.add('hidden')" class="w-1/2 py-3 border border-stone-200 text-stone-600 rounded-xl font-bold hover:bg-stone-50 transition-colors text-sm">
                            {{ __('Cancelar') }}
                        </button>
                        <button type="submit" class="w-1/2 py-3 bg-amber-900 text-white rounded-xl font-bold shadow-lg shadow-amber-900/10 hover:opacity-95 transition-opacity text-sm flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-md">rocket_launch</span>
                            {{ __('Fabricar & Guardar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Withdraw Batch Modal overlay -->
    <div id="withdrawModal" class="fixed inset-0 z-[100] flex items-center justify-center hidden bg-stone-900/60 backdrop-blur-sm p-4">
        <div class="bg-white rounded-2xl border border-stone-200 max-w-md w-full p-6 shadow-xl relative animate-in fade-in zoom-in duration-200">
            <!-- Modal Close button -->
            <button type="button" onclick="document.getElementById('withdrawModal').classList.add('hidden')" class="absolute top-4 right-4 text-stone-400 hover:text-stone-600 transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>

            <!-- Modal Header -->
            <div class="flex items-center gap-2 mb-4">
                <span class="material-symbols-outlined text-secondary text-2xl">outbox</span>
                <h3 class="font-headline-md text-headline-md text-primary">{{ __('Retirar Stock de Lote') }}</h3>
            </div>
            
            <p class="text-sm text-outline mb-6 leading-relaxed">
                {{ __('Deduce una cantidad del stock en cajas de un lote activo. Si la cantidad llega a cero, el estado se marcará como Agotado.') }}
            </p>

            <!-- Withdraw Form -->
            <form action="{{ route('inventory.withdraw') }}" method="POST" class="space-y-4">
                @csrf

                @if (!$lotes->where('estado', 'en_stock')->isEmpty())
                <!-- Search Box for choosing by product name -->
                <div class="flex flex-col gap-xs mb-3">
                    <label class="font-label-md text-label-md text-on-surface text-stone-700 font-medium mb-1" for="withdraw_search">{{ __('Buscar por Nombre o Código') }}</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-stone-400 text-sm material-symbols-outlined">search</span>
                        <input id="withdraw_search" type="text" placeholder="ej. Tanzaniano o BATCH..." class="w-full bg-white border border-outline-variant rounded-lg p-3 pl-9 text-sm focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all" />
                    </div>
                </div>

                <!-- QR Scan Actions -->
                <div class="flex items-center gap-2 mb-3">
                    <button type="button" id="btn-toggle-camera" class="flex-1 py-2 px-3 border border-secondary text-secondary hover:bg-secondary-container/20 rounded-lg text-xs font-bold transition-all flex items-center justify-center gap-1">
                        <span class="material-symbols-outlined text-base">photo_camera</span>
                        {{ __('Escanear QR') }}
                    </button>
                    <button type="button" id="btn-upload-qr" class="flex-1 py-2 px-3 border border-stone-200 text-stone-600 hover:bg-stone-50 rounded-lg text-xs font-bold transition-all flex items-center justify-center gap-1">
                        <span class="material-symbols-outlined text-base">upload_file</span>
                        {{ __('Subir QR') }}
                    </button>
                </div>
                
                <!-- File Input for QR image upload -->
                <input type="file" id="qr-file-selector" accept="image/*" class="hidden" />

                <!-- Live Camera scanner viewport -->
                <div id="camera-scanner-container" class="hidden w-full overflow-hidden border border-outline-variant/30 rounded-xl bg-stone-900 mb-4 animate-in fade-in duration-300 relative">
                    <div id="interactive-reader" class="w-full aspect-video"></div>
                    <div class="absolute bottom-2 left-1/2 -translate-x-1/2 z-10">
                        <button type="button" id="btn-stop-camera" class="px-4 py-1.5 bg-red-600 text-white font-bold text-[10px] rounded-full uppercase shadow hover:bg-red-700 transition-colors">
                            {{ __('Apagar Cámara') }}
                        </button>
                    </div>
                </div>

                <!-- Status alert for QR scans -->
                <div id="qr-scan-feedback" class="hidden p-3 rounded-lg text-xs font-semibold mb-3"></div>
                @endif

                <!-- QR Code Select/Input -->
                <div class="flex flex-col gap-xs">
                    <label class="font-label-md text-label-md text-on-surface text-stone-700 font-medium mb-1" for="qr_code">{{ __('Seleccionar Lote Activo') }}</label>
                    @if ($lotes->where('estado', 'en_stock')->isEmpty())
                        <input class="w-full bg-stone-100 border border-stone-200 text-stone-400 rounded-lg p-3 text-sm cursor-not-allowed" value="{{ __('No hay lotes disponibles en stock') }}" disabled />
                    @else
                        <select name="qr_code" id="qr_code" class="w-full bg-white border border-outline-variant rounded-lg p-3 text-sm focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all" required>
                            <option value="" disabled selected>{{ __('Seleccione un lote activo de la lista') }}</option>
                            @foreach ($lotes->where('estado', 'en_stock') as $l)
                                <option value="{{ $l->qr_code }}">
                                    {{ $l->producto->nombre }} ({{ $l->qr_code }}) — {{ $l->cantidad }} cajas disponibles
                                </option>
                            @endforeach
                        </select>
                    @endif
                </div>

                <!-- Quantity -->
                <div class="flex flex-col gap-xs">
                    <label class="font-label-md text-label-md text-on-surface text-stone-700 font-medium mb-1" for="withdraw_cantidad">{{ __('Cantidad a Retirar (cajas)') }}</label>
                    <input name="cantidad" id="withdraw_cantidad" type="number" min="1" placeholder="ej. 5" class="w-full bg-white border border-outline-variant rounded-lg p-3 text-sm focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all" required />
                </div>

                <!-- Motivo de Retiro -->
                <div class="flex flex-col gap-xs">
                    <label class="font-label-md text-label-md text-on-surface text-stone-700 font-medium mb-1" for="withdraw_motivo">{{ __('Motivo del Retiro') }}</label>
                    <select name="motivo" id="withdraw_motivo" onchange="toggleSellOrderSelection(this.value)" class="w-full bg-white border border-outline-variant rounded-lg p-3 text-sm focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all" required>
                        <option value="venta" selected>{{ __('Despacho por Venta') }}</option>
                        <option value="dañado">{{ __('Lote Dañado / Merma (Pérdida contable)') }}</option>
                        <option value="perdido">{{ __('Lote Perdido / Robo (Pérdida contable)') }}</option>
                    </select>
                </div>

                <!-- Pedido de Venta (Visible only when motivo is venta) -->
                <div id="sell_order_selection_container" class="flex flex-col gap-xs transition-all duration-200">
                    <label class="font-label-md text-label-md text-on-surface text-stone-700 font-medium mb-1" for="id_pedido">{{ __('Seleccionar Pedido de Venta Pendiente') }}</label>
                    @if ($pedidosPendientes->isEmpty())
                        <div class="text-xs text-red-600 bg-red-50 p-3 rounded-lg font-semibold">
                            {{ __('No hay pedidos de venta PENDIENTES. Por favor crea uno primero en la página de Contabilidad.') }}
                        </div>
                    @else
                        <select name="id_pedido" id="id_pedido" class="w-full bg-white border border-outline-variant rounded-lg p-3 text-sm focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all">
                            <option value="" disabled selected>{{ __('Seleccione el pedido de venta pendiente') }}</option>
                            @foreach ($pedidosPendientes as $ped)
                                <option value="{{ $ped->id }}">
                                    Pedido #{{ $ped->id }} — {{ $ped->cliente->nombre }} {{ $ped->cliente->apellido }} (${{ number_format($ped->total, 2) }})
                                </option>
                            @endforeach
                        </select>
                    @endif
                </div>

                <!-- Actions -->
                <div class="pt-4 flex gap-2">
                    <button type="button" onclick="document.getElementById('withdrawModal').classList.add('hidden')" class="w-1/2 py-3 border border-stone-200 text-stone-600 rounded-lg font-bold hover:bg-stone-50 transition-colors text-sm">
                        {{ __('Cancelar') }}
                    </button>
                    <button type="submit" class="w-1/2 py-3 bg-secondary text-on-secondary rounded-lg font-bold hover:bg-secondary-fixed transition-colors flex items-center justify-center gap-1 text-sm shadow-md" {{ $lotes->where('estado', 'en_stock')->isEmpty() ? 'disabled' : '' }}>
                        <span class="material-symbols-outlined text-[18px]">outbox</span>
                        {{ __('Confirmar') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer spacing for mobile -->
    <div class="h-12 md:hidden text-stone-500"></div>

    <!-- Sticker Modal Overlay -->
    <div id="stickerModal" class="fixed inset-0 z-[120] flex items-center justify-center hidden bg-stone-900/80 backdrop-blur-sm p-4 no-print-overlay">
        <div class="bg-white rounded-2xl border border-stone-200 max-w-sm w-full p-6 shadow-2xl relative animate-in fade-in zoom-in duration-200 label-modal-container">
            <!-- Close button -->
            <button type="button" onclick="document.getElementById('stickerModal').classList.add('hidden')" class="absolute top-4 right-4 text-stone-400 hover:text-stone-600 transition-colors no-print">
                <span class="material-symbols-outlined">close</span>
            </button>

            <!-- Printable Sticker Box -->
            <div id="printableSticker" class="border-2 border-double border-amber-900/30 p-6 rounded-xl bg-amber-50/20 text-center flex flex-col items-center justify-center">
                <!-- Brand Header -->
                <div class="text-[10px] font-black tracking-widest text-amber-900/60 uppercase mb-2">WONKA FABRIC • ARTISAN SERIES</div>
                <div class="w-full border-b border-dashed border-amber-900/20 mb-4"></div>

                <!-- Product Title -->
                <h4 id="stickerProduct" class="font-headline-md text-headline-md text-amber-950 font-bold mb-1 break-words max-w-full text-lg">Product Name</h4>
                
                <!-- Date -->
                <p id="stickerDate" class="text-xs text-outline mb-1">Fecha: YYYY-MM-DD</p>
                
                <!-- Batch ID -->
                <p id="stickerBatch" class="font-mono text-sm font-black text-amber-900 mb-4">BATCH-XXX</p>
                
                <!-- QR Code Box -->
                <div class="p-3 bg-white rounded-xl shadow-sm border border-stone-200 flex items-center justify-center mb-4">
                    <img id="stickerQR" src="" alt="QR Code" class="w-40 h-40 object-contain" />
                </div>

                <!-- Footer Guideline -->
                <p class="text-[10px] text-outline italic">Escanee para verificar autenticidad y trazabilidad</p>
            </div>

            <!-- Action Buttons -->
            <div class="mt-6 flex gap-3 no-print">
                <button type="button" onclick="printSticker()" class="flex-1 py-3 bg-primary text-on-primary font-bold rounded-xl flex items-center justify-center gap-2 hover:bg-primary-container hover:text-on-primary-container transition-all">
                    <span class="material-symbols-outlined text-lg">print</span>
                    {{ __('Imprimir Sticker') }}
                </button>
                <button type="button" onclick="document.getElementById('stickerModal').classList.add('hidden')" class="px-4 py-3 bg-stone-100 hover:bg-stone-200 text-stone-700 font-bold rounded-xl transition-colors">
                    {{ __('Cancelar') }}
                </button>
            </div>
        </div>
    </div>

    <!-- Print styling and helper script -->
    <style>
        @media print {
            body * {
                visibility: hidden !important;
            }
            #stickerModal, #stickerModal * {
                visibility: visible !important;
            }
            #stickerModal {
                position: fixed !important;
                left: 0 !important;
                top: 0 !important;
                width: 100% !important;
                height: 100% !important;
                background: white !important;
                backdrop-filter: none !important;
                display: flex !important;
                justify-content: center !important;
                align-items: center !important;
                z-index: 999999 !important;
            }
            .no-print {
                display: none !important;
            }
            .label-modal-container {
                border: none !important;
                box-shadow: none !important;
                padding: 0 !important;
                margin: 0 !important;
                max-width: 100% !important;
            }
            #printableSticker {
                border: 2px solid #5c3d2e !important;
                background: white !important;
                padding: 30px !important;
                box-shadow: none !important;
                width: 100% !important;
                max-width: 320px !important;
                margin: 0 auto !important;
            }
        }
    </style>

    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

    <script>
        // 1. Printable Sticker Modal
        function openStickerModal(id, producto, fecha, qrCode) {
            document.getElementById('stickerProduct').innerText = producto;
            document.getElementById('stickerDate').innerText = 'Fecha de Ingreso: ' + fecha;
            document.getElementById('stickerBatch').innerText = qrCode;
            
            // Build high-resolution QR using free public API
            const qrUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=250x250&margin=10&data=' + encodeURIComponent(qrCode);
            document.getElementById('stickerQR').src = qrUrl;
            
            document.getElementById('stickerModal').classList.remove('hidden');
        }

        function printSticker() {
            window.print();
        }

        // 2. Searchable Batch Filter and Live QR Scanning
        document.addEventListener('DOMContentLoaded', function() {
            // Search filter by product name or code
            const searchInput = document.getElementById('withdraw_search');
            const selectElement = document.getElementById('qr_code');

            if (searchInput && selectElement) {
                const originalOptions = Array.from(selectElement.options);
                
                searchInput.addEventListener('input', function() {
                    const query = this.value.toLowerCase().trim();
                    selectElement.innerHTML = '';
                    
                    originalOptions.forEach(opt => {
                        if (opt.disabled || opt.value === "" || opt.text.toLowerCase().includes(query)) {
                            selectElement.appendChild(opt);
                        }
                    });
                });
            }

            // QR Scanner variables
            let html5QrScanner = null;
            const feedbackEl = document.getElementById('qr-scan-feedback');
            const selectDropdown = document.getElementById('qr_code');
            const cameraContainer = document.getElementById('camera-scanner-container');

            function showFeedback(message, type) {
                if (!feedbackEl) return;
                feedbackEl.classList.remove('hidden', 'bg-green-100', 'text-green-800', 'bg-red-100', 'text-red-800');
                if (type === 'success') {
                    feedbackEl.classList.add('bg-green-100', 'text-green-800');
                } else {
                    feedbackEl.classList.add('bg-red-100', 'text-red-800');
                }
                feedbackEl.innerText = message;
                feedbackEl.classList.remove('hidden');
            }

            function selectBatchByCode(code) {
                if (!selectDropdown) return false;
                let found = false;
                for (let i = 0; i < selectDropdown.options.length; i++) {
                    if (selectDropdown.options[i].value === code) {
                        selectDropdown.selectedIndex = i;
                        found = true;
                        break;
                    }
                }
                return found;
            }

            // Camera Scanner toggler
            const btnToggleCamera = document.getElementById('btn-toggle-camera');
            const btnStopCamera = document.getElementById('btn-stop-camera');

            if (btnToggleCamera && cameraContainer) {
                btnToggleCamera.addEventListener('click', function() {
                    // Show camera viewport
                    cameraContainer.classList.remove('hidden');
                    feedbackEl.classList.add('hidden');

                    if (!html5QrScanner) {
                        html5QrScanner = new Html5Qrcode("interactive-reader");
                    }

                    const config = { fps: 15, qrbox: { width: 220, height: 220 } };

                    html5QrScanner.start(
                        { facingMode: "environment" },
                        config,
                        (decodedText) => {
                            // On Success
                            const success = selectBatchByCode(decodedText);
                            if (success) {
                                showFeedback('¡Código QR escaneado con éxito! Lote seleccionado.', 'success');
                                stopCameraScan();
                            } else {
                                showFeedback('Código detectado (' + decodedText + '), pero el lote no está activo o no existe.', 'error');
                            }
                        },
                        (errorMessage) => {
                            // Verbose/Internal scanner loop errors, ignore to keep scanning smoothly
                        }
                    ).catch(err => {
                        showFeedback('No se pudo acceder a la cámara. Por favor otorgue permisos.', 'error');
                    });
                });
            }

            function stopCameraScan() {
                if (html5QrScanner && html5QrScanner.isScanning) {
                    html5QrScanner.stop().then(() => {
                        if (cameraContainer) {
                            cameraContainer.classList.add('hidden');
                        }
                    }).catch(err => console.error(err));
                } else if (cameraContainer) {
                    cameraContainer.classList.add('hidden');
                }
            }

            if (btnStopCamera) {
                btnStopCamera.addEventListener('click', stopCameraScan);
            }

            // Upload QR Image File scanner
            const btnUploadQr = document.getElementById('btn-upload-qr');
            const qrFileSelector = document.getElementById('qr-file-selector');

            if (btnUploadQr && qrFileSelector) {
                btnUploadQr.addEventListener('click', () => {
                    qrFileSelector.click();
                });

                qrFileSelector.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (!file) return;

                    feedbackEl.classList.add('hidden');
                    const uploadScanner = new Html5Qrcode("interactive-reader");

                    uploadScanner.scanFile(file, true)
                        .then(decodedText => {
                            const success = selectBatchByCode(decodedText);
                            if (success) {
                                showFeedback('¡QR en archivo leído con éxito! Lote seleccionado.', 'success');
                            } else {
                                showFeedback('Código leído (' + decodedText + '), pero el lote no está activo.', 'error');
                            }
                        })
                        .catch(err => {
                            showFeedback('No se pudo detectar ningún código QR en la imagen subida.', 'error');
                        });
                });
            }

            // Automatically shut down live camera if modal is closed
            const withdrawModal = document.getElementById('withdrawModal');
            if (withdrawModal) {
                // We observe style classes or simple interval to stop camera if hidden
                const observer = new MutationObserver((mutations) => {
                    mutations.forEach((mutation) => {
                        if (mutation.attributeName === 'class' && withdrawModal.classList.contains('hidden')) {
                            stopCameraScan();
                        }
                    });
                });
                observer.observe(withdrawModal, { attributes: true });
            }

            // COMPOSITE PRODUCT MANUFACTURING SCRIPTS
            const productsList = @json($productos);

            window.addIngredientRow = function() {
                const container = document.getElementById('ingredients_container');
                if (!container) return;

                const rowId = 'ing_row_' + Date.now();
                const div = document.createElement('div');
                div.id = rowId;
                div.className = 'flex items-center gap-3 bg-stone-50 p-3 rounded-xl border border-stone-100 animate-in fade-in slide-in-from-top-1 duration-150';

                let selectHtml = `<select name="ingrediente_id[]" required class="flex-1 px-3 py-2 border border-stone-200 rounded-lg bg-white text-xs">`;
                selectHtml += `<option value="" disabled selected>{{ __('Seleccionar ingrediente...') }}</option>`;
                productsList.forEach(p => {
                    selectHtml += `<option value="${p.id}">${p.nombre} ($${p.precio_unitario}/caja)</option>`;
                });
                selectHtml += `</select>`;

                div.innerHTML = `
                    ${selectHtml}
                    <div class="flex items-center gap-1.5 w-32">
                        <input type="number" required min="0.1" step="0.1" name="ingrediente_cant[]" placeholder="Cant." class="w-full px-3 py-2 border border-stone-200 rounded-lg bg-white text-xs text-center">
                        <span class="text-[10px] text-stone-500 font-bold uppercase">{{ __('Cajas') }}</span>
                    </div>
                    <button type="button" onclick="document.getElementById('${rowId}').remove()" class="p-2 text-stone-400 hover:text-red-600 transition-colors">
                        <span class="material-symbols-outlined text-md">delete</span>
                    </button>
                `;
                container.appendChild(div);
            };

            window.setImageOption = function(option) {
                document.getElementById('imagen_opcion').value = option;
                
                const btnDesign = document.getElementById('toggle_design_btn');
                const btnUpload = document.getElementById('toggle_upload_btn');
                const containerDesign = document.getElementById('option_design_container');
                const containerUpload = document.getElementById('option_upload_container');

                if (option === 'design') {
                    btnDesign.className = 'flex-1 py-2 text-xs font-bold rounded-lg bg-white text-amber-900 shadow-sm transition-all';
                    btnUpload.className = 'flex-1 py-2 text-xs font-bold rounded-lg text-stone-600 hover:text-stone-800 transition-all';
                    containerDesign.classList.remove('hidden');
                    containerUpload.classList.add('hidden');
                } else {
                    btnUpload.className = 'flex-1 py-2 text-xs font-bold rounded-lg bg-white text-amber-900 shadow-sm transition-all';
                    btnDesign.className = 'flex-1 py-2 text-xs font-bold rounded-lg text-stone-600 hover:text-stone-800 transition-all';
                    containerUpload.classList.remove('hidden');
                    containerDesign.classList.add('hidden');
                }
            };

            window.updateLabelText = function(val) {
                const label = document.getElementById('wrapper_brand_title');
                if (label) label.innerText = val || 'Nuevo Producto';
                renderDesignToCanvas();
            };

            window.updateWrapperSubtitle = function(val) {
                const sub = document.getElementById('wrapper_subtitle');
                if (sub) sub.innerText = val || 'Gold Selection';
                renderDesignToCanvas();
            };

            window.updateWrapperCacao = function(val) {
                const badge = document.getElementById('wrapper_cacao_badge');
                if (badge) badge.innerText = val + ' Cocoa';
                renderDesignToCanvas();
            };

            window.updateWrapperStyles = function() {
                const preview = document.getElementById('wrapper_preview');
                const patternLayer = document.getElementById('wrapper_pattern_layer');
                const brand = document.getElementById('wrapper_brand_title');
                const badge = document.getElementById('wrapper_cacao_badge');

                const colorSelect = document.getElementById('wrapper_color');
                const opt = colorSelect.options[colorSelect.selectedIndex];
                const bg = opt.getAttribute('data-bg');
                const text = opt.getAttribute('data-text');
                const accent = opt.getAttribute('data-accent');

                if (preview) preview.style.background = bg;
                if (brand) brand.style.color = text;
                if (badge) badge.style.color = text;

                const pattern = document.getElementById('wrapper_pattern').value;
                if (patternLayer) {
                    if (pattern === 'dots') {
                        patternLayer.style.backgroundImage = 'radial-gradient(circle, #fff 10%, transparent 11%)';
                        patternLayer.style.backgroundSize = '15px 15px';
                        patternLayer.style.opacity = '0.12';
                    } else if (pattern === 'stripes') {
                        patternLayer.style.backgroundImage = 'repeating-linear-gradient(45deg, rgba(255,255,255,0.07) 0px, rgba(255,255,255,0.07) 2px, transparent 2px, transparent 10px)';
                        patternLayer.style.backgroundSize = 'auto';
                        patternLayer.style.opacity = '0.2';
                    } else if (pattern === 'stars') {
                        patternLayer.style.backgroundImage = 'radial-gradient(circle, #fff 6%, transparent 7%), radial-gradient(circle, #fff 3%, transparent 4%)';
                        patternLayer.style.backgroundSize = '30px 30px';
                        patternLayer.style.backgroundPosition = '0 0, 15px 15px';
                        patternLayer.style.opacity = '0.15';
                    } else {
                        patternLayer.style.backgroundImage = 'none';
                        patternLayer.style.opacity = '0';
                    }
                }

                renderDesignToCanvas();
            };

            window.handleCraftPreview = function(input) {
                const file = input.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.querySelector('#craft_dropzone_preview img').src = e.target.result;
                        document.getElementById('craft_dropzone_placeholder').classList.add('hidden');
                        document.getElementById('craft_dropzone_preview').classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            };

            window.initLabelDesigner = function() {
                const container = document.getElementById('ingredients_container');
                if (container && container.children.length === 0) {
                    addIngredientRow();
                }
                updateWrapperStyles();
            };

            function renderDesignToCanvas() {
                const canvas = document.getElementById('designCanvas');
                if (!canvas) return;
                const ctx = canvas.getContext('2d');
                
                const colorSelect = document.getElementById('wrapper_color');
                if (!colorSelect) return;
                const opt = colorSelect.options[colorSelect.selectedIndex];
                const theme = colorSelect.value;
                const pattern = document.getElementById('wrapper_pattern').value;
                const brandText = document.getElementById('craft_nombre').value || 'Nuevo Producto';
                const subtitleText = document.getElementById('wrapper_subtitle_input').value || 'Gold Selection';
                const cacaoText = document.getElementById('wrapper_cacao').value || '85%';

                let bgGradient = ctx.createLinearGradient(0, 0, 400, 300);
                let textColor = '#e6c594';
                let accentColor = '#ffdfb0';

                if (theme === 'classic') {
                    bgGradient.addColorStop(0, '#5c3d2e');
                    bgGradient.addColorStop(1, '#3d251e');
                    textColor = '#ffdfb0';
                    accentColor = '#e6c594';
                } else if (theme === 'royal') {
                    bgGradient.addColorStop(0, '#1e3c72');
                    bgGradient.addColorStop(1, '#2a5298');
                    textColor = '#ffffff';
                    accentColor = '#f5d061';
                } else if (theme === 'crimson') {
                    bgGradient.addColorStop(0, '#780206');
                    bgGradient.addColorStop(1, '#061109');
                    textColor = '#e0a96d';
                    accentColor = '#ffffff';
                } else if (theme === 'mint') {
                    bgGradient.addColorStop(0, '#0f2027');
                    bgGradient.addColorStop(1, '#2c5364');
                    textColor = '#a8ff78';
                    accentColor = '#ffffff';
                } else if (theme === 'pink') {
                    bgGradient.addColorStop(0, '#ec008c');
                    bgGradient.addColorStop(1, '#fc6767');
                    textColor = '#ffffff';
                    accentColor = '#fff275';
                }

                ctx.fillStyle = bgGradient;
                ctx.fillRect(0, 0, 400, 300);

                ctx.fillStyle = 'rgba(255, 255, 255, 0.08)';
                if (pattern === 'dots') {
                    for (let x = 10; x < 400; x += 20) {
                        for (let y = 10; y < 300; y += 20) {
                            ctx.beginPath();
                            ctx.arc(x, y, 2, 0, Math.PI * 2);
                            ctx.fill();
                        }
                    }
                } else if (pattern === 'stripes') {
                    ctx.strokeStyle = 'rgba(255, 255, 255, 0.08)';
                    ctx.lineWidth = 4;
                    for (let x = -300; x < 400; x += 30) {
                        ctx.beginPath();
                        ctx.moveTo(x, 0);
                        ctx.lineTo(x + 300, 300);
                        ctx.stroke();
                    }
                } else if (pattern === 'stars') {
                    ctx.fillStyle = 'rgba(255, 255, 255, 0.12)';
                    for (let x = 15; x < 400; x += 40) {
                        for (let y = 15; y < 300; y += 40) {
                            ctx.beginPath();
                            ctx.arc(x, y, 1.5, 0, Math.PI * 2);
                            ctx.fill();
                            if ((x+y)%3===0) {
                                ctx.beginPath();
                                ctx.arc(x + 20, y + 20, 2.5, 0, Math.PI * 2);
                                ctx.fill();
                            }
                        }
                    }
                }

                ctx.fillStyle = 'rgba(0, 0, 0, 0.15)';
                ctx.fillRect(0, 0, 15, 300);
                ctx.fillStyle = 'rgba(0, 0, 0, 0.2)';
                ctx.fillRect(385, 0, 15, 300);
                ctx.fillStyle = 'rgba(255, 255, 255, 0.1)';
                ctx.fillRect(0, 0, 400, 15);
                ctx.fillStyle = 'rgba(0, 0, 0, 0.25)';
                ctx.fillRect(0, 285, 400, 15);

                ctx.strokeStyle = accentColor;
                ctx.lineWidth = 2;
                ctx.fillStyle = 'rgba(0, 0, 0, 0.35)';
                ctx.beginPath();
                ctx.rect(50, 50, 300, 200);
                ctx.fill();
                ctx.stroke();

                ctx.fillStyle = accentColor;
                ctx.font = 'bold 11px monospace';
                ctx.textAlign = 'center';
                ctx.fillText('THE CHOCOLATE FACTORY', 200, 85);

                ctx.fillStyle = textColor;
                ctx.font = 'italic bold 22px Georgia, serif';
                ctx.fillText(brandText, 200, 128);

                ctx.fillStyle = 'rgba(255, 255, 255, 0.8)';
                ctx.font = 'bold 9px sans-serif';
                ctx.fillText(subtitleText.toUpperCase(), 200, 155);

                ctx.fillStyle = 'rgba(255, 255, 255, 0.15)';
                ctx.beginPath();
                ctx.rect(140, 180, 120, 26);
                ctx.fill();
                ctx.strokeStyle = 'rgba(255, 255, 255, 0.3)';
                ctx.stroke();

                ctx.fillStyle = textColor;
                ctx.font = 'bold 11px monospace';
                ctx.fillText(cacaoText + ' COCOA', 200, 197);

                document.getElementById('diseno_envoltura_png').value = canvas.toDataURL('image/png');
            }

            window.toggleSellOrderSelection = function(value) {
                const container = document.getElementById('sell_order_selection_container');
                const idPedidoSelect = document.getElementById('id_pedido');
                if (!container) return;
                
                if (value === 'venta') {
                    container.classList.remove('hidden');
                    if (idPedidoSelect) idPedidoSelect.required = true;
                } else {
                    container.classList.add('hidden');
                    if (idPedidoSelect) idPedidoSelect.required = false;
                }
            };

            // Initialize correct state
            const motiveSelect = document.getElementById('withdraw_motivo');
            if (motiveSelect) {
                toggleSellOrderSelection(motiveSelect.value);
            }
        });
    </script>
@endsection
