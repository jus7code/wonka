@extends('layouts.app')

@section('styles')
    <style>
        .cocoa-shadow {
            box-shadow: 0 10px 30px -10px rgba(61, 43, 31, 0.08);
        }
    </style>
@endsection

@section('content')
    <!-- Header -->
            <header class="max-w-5xl mx-auto mb-lg">
                <a href="/inventory" class="flex items-center gap-2 text-outline mb-base hover:text-primary transition-colors">
                    <span class="material-symbols-outlined text-sm">arrow_back</span>
                    <span class="font-label-md text-label-md">{{ __('Back to Inventory') }}</span>
                </a>
                <h2 class="font-headline-lg text-headline-lg text-primary mb-xs">{{ __('Register New Batch') }}</h2>
                <p class="font-body-md text-body-md text-on-surface-variant">{{ __('Log production details and generate tracking
                    assets for the new artisan series.') }}</p>
            </header>
            <!-- Validation Alerts -->
            @if ($errors->any())
                <div class="max-w-5xl mx-auto p-4 rounded-xl bg-error-container text-on-error-container border border-error/20 flex flex-col gap-xs shadow-sm mb-lg animate-in fade-in duration-300">
                    <div class="flex items-center gap-xs font-semibold text-sm">
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

            <!-- Form Layout (Bento-style Grid) -->
            <form action="{{ route('batchregister.store') }}" method="POST" enctype="multipart/form-data" class="max-w-5xl mx-auto grid grid-cols-12 gap-gutter">
                @csrf
                <!-- Left Column: Primary Details -->
                <div class="col-span-12 lg:col-span-7 flex flex-col gap-gutter">
                    <!-- Main Info Card -->
                    <div class="bg-surface-container-lowest p-md rounded-xl cocoa-shadow border border-outline-variant/30">
                        <div class="flex items-center gap-2 mb-md">
                            <span class="material-symbols-outlined text-secondary">info</span>
                            <h3 class="font-headline-md text-headline-md text-primary">{{ __('Batch Identity') }}</h3>
                        </div>
                        <div class="space-y-md">
                            <!-- Product Selection Option -->
                            <div class="flex flex-col gap-xs">
                                <label class="font-label-md text-label-md text-on-surface text-stone-700 font-medium" for="id_producto">{{ __('Producto Asociado') }}</label>
                                <select
                                    name="id_producto"
                                    id="id_producto"
                                    class="w-full bg-white border border-outline-variant rounded-lg p-3 text-sm focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all"
                                    required>
                                    <option value="new" selected>{{ __('+ Registrar un nuevo producto...') }}</option>
                                    @foreach ($productos as $producto)
                                        <option value="{{ $producto->id }}" data-price="{{ $producto->precio_unitario }}">{{ $producto->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Product Name Input (Visible when "new" product is selected) -->
                            <div id="new_product_name_container" class="flex flex-col gap-xs animate-in fade-in slide-in-from-top-2 duration-200">
                                <label class="font-label-md text-label-md text-on-surface text-stone-700 font-medium" for="nombre">{{ __('Nombre del Nuevo Producto') }}</label>
                                <input
                                    name="nombre"
                                    id="nombre"
                                    class="w-full bg-white border border-outline-variant rounded-lg p-3 text-sm focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all"
                                    placeholder="{{ __('e.g. Tanzanian Single Origin Dark 70%') }}"
                                    type="text"
                                    required
                                    value="{{ old('nombre') }}" />
                            </div>
                            <div class="grid grid-cols-2 gap-md">
                                <div class="flex flex-col gap-xs">
                                    <label class="font-label-md text-label-md text-on-surface" for="precio_unitario">{{ __('Unit Price ($)') }}</label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-outline text-sm">$</span>
                                        <input
                                            name="precio_unitario"
                                            id="precio_unitario"
                                            step="0.01"
                                            class="w-full bg-white border border-outline-variant rounded-lg p-3 pl-8 focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all text-sm"
                                            placeholder="0.00" type="number" required value="{{ old('precio_unitario') }}" />
                                    </div>
                                </div>
                                <div class="flex flex-col gap-xs">
                                    <label class="font-label-md text-label-md text-on-surface" for="cantidad">{{ __('Batch Quantity (boxes)') }}</label>
                                    <input
                                        name="cantidad"
                                        id="cantidad"
                                        class="w-full bg-white border border-outline-variant rounded-lg p-3 focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all text-sm"
                                        placeholder="100" type="number" required value="{{ old('cantidad') }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Logistics & Details -->
                    <div class="bg-surface-container-lowest p-md rounded-xl cocoa-shadow border border-outline-variant/30">
                        <div class="flex items-center gap-2 mb-md">
                            <span class="material-symbols-outlined text-secondary">factory</span>
                            <h3 class="font-headline-md text-headline-md text-primary">{{ __('Manufacturing Metadata') }}</h3>
                        </div>
                        <div class="space-y-md">
                            <div class="grid grid-cols-2 gap-md">
                                <div class="flex flex-col gap-xs">
                                    <label class="font-label-md text-label-md text-on-surface" for="id_linea_produccion">{{ __('Processing Line') }}</label>
                                    <select
                                        name="id_linea_produccion"
                                        id="id_linea_produccion"
                                        class="w-full bg-white border border-outline-variant rounded-lg p-3 text-sm focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all">
                                        <option value="">{{ __('Ninguna (Sin línea)') }}</option>
                                        @foreach ($lineas as $linea)
                                            <option value="{{ $linea->id }}">{{ $linea->nombre }}</option>
                                        @endforeach
                                        <option value="new" class="text-secondary font-semibold font-bold">+ {{ __('Crear nueva línea de procesamiento...') }}</option>
                                    </select>
                                </div>
                                <div class="flex flex-col gap-xs">
                                    <label class="font-label-md text-label-md text-on-surface" for="fecha_ingreso">{{ __('Fecha de Ingreso') }}</label>
                                    <input
                                        name="fecha_ingreso"
                                        id="fecha_ingreso"
                                        class="w-full bg-white border border-outline-variant rounded-lg p-3 text-sm focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all"
                                        type="date" required value="{{ old('fecha_ingreso', date('Y-m-d')) }}" />
                                </div>
                            </div>
                            
                            <!-- Input container for creating a new line (hidden by default) -->
                            <div id="new_line_input_container" class="flex flex-col gap-xs hidden animate-in fade-in slide-in-from-top-2 duration-200">
                                <label class="font-label-md text-label-md text-on-surface text-stone-700 font-medium" for="nueva_linea_nombre">{{ __('Nombre de la Nueva Línea de Procesamiento') }}</label>
                                <input
                                    name="nueva_linea_nombre"
                                    id="nueva_linea_nombre"
                                    class="w-full bg-white border border-outline-variant rounded-lg p-3 text-sm focus:ring-2 focus:ring-secondary focus:border-secondary outline-none transition-all"
                                    placeholder="{{ __('ej. Línea de Conche Especializado D') }}"
                                    type="text" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right Column: Media & Actions -->
                <div class="col-span-12 lg:col-span-5 flex flex-col gap-gutter">
                    <!-- Media Upload Card -->
                    <div
                        class="bg-surface-container-lowest p-md rounded-xl cocoa-shadow border border-outline-variant/30 flex-1">
                        <div class="flex items-center gap-2 mb-md">
                            <span class="material-symbols-outlined text-secondary">image</span>
                            <h3 class="font-headline-md text-headline-md text-primary">{{ __('Product Visuals') }}</h3>
                        </div>
                        <div
                            id="dropzone"
                            class="relative w-full aspect-square bg-surface-container rounded-lg border-2 border-dashed border-outline-variant flex flex-col items-center justify-center gap-base hover:bg-surface-container-high transition-all duration-300 cursor-pointer group overflow-hidden">
                            <!-- Hidden File Input -->
                            <input type="file" name="imagen" id="imagen" accept="image/*" class="hidden" />
                            
                            <!-- Real-time Preview Image -->
                            <img 
                                id="preview_image"
                                alt="Chocolate Artisan Product"
                                class="absolute inset-0 w-full h-full object-cover rounded-lg opacity-20 group-hover:opacity-40 transition-all duration-300"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCBpoEIEPPpLow4Qjyh1mKdRHIh0rR7K-4luCGNFQwKNWrLOc7FMnTNYnsMNVWDix-Q0drtoggl3g41yggz404uitXT5hERE2k3e4vhMBNhtejW2aPU-vbuAyNhc2MfjOFOUF4DuqtUY6HavBG24aFjwXrZtg9XKLdjjIWWg90zz_kkN1H4F9P62Uiw7glLa8Vsgh5qErK_5c20iqEvMMkXAvmmcfO696nEy3mOsUKhe-noxUhuQAL0MVnjQ69Py0Vvl0RH7Gt9zQ" />
                            
                            <!-- Drag and Drop Text/Icon Guidelines -->
                            <div id="upload_instructions" class="flex flex-col items-center gap-base relative z-10 transition-all duration-300 pointer-events-none">
                                <span class="material-symbols-outlined text-display-xl text-primary">cloud_upload</span>
                                <div class="text-center">
                                    <p class="font-label-md text-label-md text-primary">{{ __('Drag and drop or click to upload') }}</p>
                                    <p class="text-xs text-outline">{{ __('High-res PNG or JPG (Max 5MB)') }}</p>
                                </div>
                            </div>
                            
                            <!-- Change Overlay (Only visible on hover once image is uploaded) -->
                            <div id="hover_overlay" class="absolute inset-0 bg-stone-900/60 flex items-center justify-center text-white opacity-0 transition-opacity duration-300 z-20">
                                <div class="flex items-center gap-2 font-semibold text-sm">
                                    <span class="material-symbols-outlined">cached</span>
                                    <span>{{ __('Click to change image') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Final Actions Card -->
                    <div class="bg-primary-container p-md rounded-xl cocoa-shadow text-on-primary">
                        <div class="flex items-center gap-2 mb-md">
                            <span class="material-symbols-outlined text-secondary-fixed">qr_code_2</span>
                            <h3 class="font-headline-md text-headline-md text-on-primary">{{ __('Batch Fulfillment') }}</h3>
                        </div>
                        <p class="text-on-primary-container text-sm mb-lg">{{ __('Ready to finalize? This will register the batch
                            and generate unique tracking identifiers for each unit.') }}</p>
                        <div class="flex flex-col gap-base">
                            <button
                                class="w-full py-4 bg-secondary-container text-on-secondary-container font-bold rounded-lg flex items-center justify-center gap-2 hover:bg-secondary-fixed transition-colors"
                                type="submit">
                                <span class="material-symbols-outlined">qr_code_scanner</span>
                                {{ __('Generate &amp; Download QRs') }}
                            </button>
                            <button
                                class="w-full py-3 text-on-primary-container font-semibold rounded-lg border border-on-primary-container/20 hover:bg-white/5 transition-colors"
                                type="button">
                                {{ __('Save as Draft') }}
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Full Width Notification/Status Area -->
                <div class="col-span-12">
                    <div
                        class="bg-surface-container-low p-md rounded-xl flex items-center justify-between border border-outline-variant/20">
                        <div class="flex items-center gap-md">
                            <div
                                class="w-12 h-12 rounded-full bg-secondary/10 flex items-center justify-center text-secondary">
                                <span class="material-symbols-outlined">inventory</span>
                            </div>
                            <div>
                                <h4 class="font-label-md text-label-md text-primary">{{ __('Current Inventory Status') }}</h4>
                                <p class="text-sm text-on-surface-variant">{{ __("Once registered, this batch will increase total
                                    stock of 'Artisan Series' by") }} <span class="font-bold text-secondary">100 boxes</span>.
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center gap-base">
                            <span class="inline-block w-2 h-2 rounded-full bg-secondary"></span>
                            <span class="text-xs font-semibold text-outline tracking-widest uppercase">{{ __('Awaiting Submission') }}</span>
                        </div>
                    </div>
                </div>
            </form>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // 1. Processing Line Toggler
                    const selectElement = document.getElementById('id_linea_produccion');
                    const container = document.getElementById('new_line_input_container');
                    const inputElement = document.getElementById('nueva_linea_nombre');

                    if (selectElement && container && inputElement) {
                        selectElement.addEventListener('change', function() {
                            if (this.value === 'new') {
                                container.classList.remove('hidden');
                                inputElement.setAttribute('required', 'required');
                                inputElement.focus();
                            } else {
                                container.classList.add('hidden');
                                inputElement.removeAttribute('required');
                                inputElement.value = '';
                            }
                        });
                    }

                    // 1.5. Product Selector Toggler & Autofill
                    const selectProduct = document.getElementById('id_producto');
                    const newProductContainer = document.getElementById('new_product_name_container');
                    const productNameInput = document.getElementById('nombre');
                    const priceInput = document.getElementById('precio_unitario');

                    if (selectProduct && newProductContainer && productNameInput && priceInput) {
                        selectProduct.addEventListener('change', function() {
                            if (this.value === 'new') {
                                newProductContainer.classList.remove('hidden');
                                productNameInput.setAttribute('required', 'required');
                                productNameInput.value = '';
                                priceInput.value = '';
                                priceInput.removeAttribute('readonly');
                                productNameInput.focus();
                            } else {
                                newProductContainer.classList.add('hidden');
                                productNameInput.removeAttribute('required');
                                productNameInput.value = '';
                                
                                // Auto-fill existing product price
                                const selectedOption = this.options[this.selectedIndex];
                                const price = selectedOption.getAttribute('data-price');
                                if (price) {
                                    priceInput.value = price;
                                }
                            }
                        });
                    }

                    // 2. Interactive Image Upload Dropzone
                    const dropzone = document.getElementById('dropzone');
                    const fileInput = document.getElementById('imagen');
                    const previewImage = document.getElementById('preview_image');
                    const instructions = document.getElementById('upload_instructions');
                    const hoverOverlay = document.getElementById('hover_overlay');

                    if (dropzone && fileInput && previewImage && instructions && hoverOverlay) {
                        // Click dropzone to trigger hidden file selector
                        dropzone.addEventListener('click', () => {
                            fileInput.click();
                        });

                        // File selection change
                        fileInput.addEventListener('change', function() {
                            handleFiles(this.files);
                        });

                        // Drag over highlight
                        ['dragenter', 'dragover'].forEach(eventName => {
                            dropzone.addEventListener(eventName, (e) => {
                                e.preventDefault();
                                dropzone.classList.add('border-secondary', 'bg-surface-container-high');
                            }, false);
                        });

                        // Drag leave remove highlight
                        ['dragleave', 'drop'].forEach(eventName => {
                            dropzone.addEventListener(eventName, (e) => {
                                e.preventDefault();
                                dropzone.classList.remove('border-secondary', 'bg-surface-container-high');
                            }, false);
                        });

                        // Drop file
                        dropzone.addEventListener('drop', (e) => {
                            const dt = e.dataTransfer;
                            const files = dt.files;
                            
                            if (files.length > 0) {
                                fileInput.files = files; // Bind file to standard form submission
                                handleFiles(files);
                            }
                        });

                        function handleFiles(files) {
                            if (files.length > 0) {
                                const file = files[0];
                                if (file.type.startsWith('image/')) {
                                    const reader = new FileReader();
                                    reader.onload = function(e) {
                                        // Update preview image
                                        previewImage.src = e.target.result;
                                        previewImage.classList.remove('opacity-20', 'group-hover:opacity-40');
                                        previewImage.classList.add('opacity-100');
                                        
                                        // Hide instructions
                                        instructions.classList.add('opacity-0', 'pointer-events-none');
                                        
                                        // Activate hover overlay class
                                        dropzone.addEventListener('mouseenter', () => {
                                            hoverOverlay.classList.remove('opacity-0');
                                            hoverOverlay.classList.add('opacity-100');
                                        });
                                        dropzone.addEventListener('mouseleave', () => {
                                            hoverOverlay.classList.remove('opacity-100');
                                            hoverOverlay.classList.add('opacity-0');
                                        });
                                    };
                                    reader.readAsDataURL(file);
                                }
                            }
                        }
                    }
                });
            </script>
@endsection
