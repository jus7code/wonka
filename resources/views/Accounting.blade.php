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
    <div class="flex">
            <!-- SideNavBar -->
            <aside
                class="bg-stone-50 dark:bg-stone-950 fixed left-0 top-0 h-full w-[280px] border-r border-stone-200 dark:border-stone-800 flex flex-col h-full py-6 px-4 gap-4 z-40">
                <div class="mb-6 px-2 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg overflow-hidden bg-primary-container flex items-center justify-center">
                        <span class="material-symbols-outlined text-secondary"
                            style="font-variation-settings: 'FILL' 1;">bakery_dining</span>
                    </div>
                    <div>
                        <h1 class="text-lg font-black text-amber-900 dark:text-amber-50 leading-tight">{{ __('CocoaMaster') }}</h1>
                        <p class="text-xs text-stone-600 dark:text-stone-400">{{ __('Reliable Craftsmanship') }}</p>
                    </div>
                </div>
                <nav class="flex-1 space-y-1">
                    <a class="flex items-center gap-3 px-4 py-3 rounded-lg text-stone-600 dark:text-stone-400 hover:bg-stone-200 dark:hover:bg-stone-800 transition-all duration-200 ease-in-out font-inter text-sm font-medium"
                        href="/dashboard">
                        <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
                        {{ __('Dashboard') }}
                    </a>
                    <a class="flex items-center gap-3 px-4 py-3 rounded-lg text-stone-600 dark:text-stone-400 hover:bg-stone-200 dark:hover:bg-stone-800 transition-all duration-200 ease-in-out font-inter text-sm font-medium"
                        href="/inventory">
                        <span class="material-symbols-outlined" data-icon="inventory_2">inventory_2</span>
                        {{ __('Inventory') }}
                    </a>
                    <a class="flex items-center gap-3 px-4 py-3 rounded-lg text-amber-900 dark:text-amber-100 font-semibold border-r-4 border-amber-700 bg-stone-100 dark:bg-stone-900 transition-all duration-200 ease-in-out font-inter text-sm"
                        href="/Accounting">
                        <span class="material-symbols-outlined" data-icon="payments"
                            style="font-variation-settings: 'FILL' 1;">payments</span>
                        {{ __('Accounting') }}
                    </a>
                    <a class="flex items-center gap-3 px-4 py-3 rounded-lg text-stone-600 dark:text-stone-400 hover:bg-stone-200 dark:hover:bg-stone-800 transition-all duration-200 ease-in-out font-inter text-sm font-medium"
                        href="/humanresources">
                        <span class="material-symbols-outlined" data-icon="badge">badge</span>
                        {{ __('Human Resources') }}
                    </a>
                    <a class="flex items-center gap-3 px-4 py-3 rounded-lg text-stone-600 dark:text-stone-400 hover:bg-stone-200 dark:hover:bg-stone-800 transition-all duration-200 ease-in-out font-inter text-sm font-medium"
                        href="/Clients">
                        <span class="material-symbols-outlined" data-icon="groups">groups</span>
                        {{ __('Clients') }}
                    </a>
                </nav>
                <div class="mt-auto pt-6 border-t border-stone-200 dark:border-stone-800 space-y-1">
                    <a href="/batchregister"
                        class="w-full bg-primary text-on-primary py-3 rounded-xl font-semibold mb-4 hover:opacity-90 transition-opacity">
                        {{ __('New Batch') }}
                    </a>
                    <a class="flex items-center gap-3 px-4 py-3 rounded-lg text-stone-600 dark:text-stone-400 hover:bg-stone-200 dark:hover:bg-stone-800 transition-all duration-200 ease-in-out font-inter text-sm font-medium"
                        href="#">
                        <span class="material-symbols-outlined" data-icon="contact_support">contact_support</span>
                        {{ __('Support') }}
                    </a>
                    <a class="flex items-center gap-3 px-4 py-3 rounded-lg text-stone-600 dark:text-stone-400 hover:bg-stone-200 dark:hover:bg-stone-800 transition-all duration-200 ease-in-out font-inter text-sm font-medium"
                        href="/">
                        <span class="material-symbols-outlined" data-icon="logout">logout</span>
                        {{ __('Log Out') }}
                    </a>
                </div>
            </aside>
            <!-- Main Content Canvas -->
            <main class="ml-[280px] w-full min-h-screen bg-background p-margin">
                <!-- Page Header -->
                <div class="flex flex-col md:flex-row md:items-center justify-between mb-lg gap-gutter">
                    <div>
                        <h2 class="font-headline-lg text-headline-lg text-primary mb-xs">{{ __('Contabilidad') }}</h2>
                        <p class="font-body-md text-on-surface-variant">{{ __('Información financiera de la producción del chocolate.') }}</p>
                    </div>
                    <div class="flex gap-base">
                        <button onclick="document.getElementById('sellOrderModal').classList.remove('hidden')"
                            class="px-6 py-3 bg-amber-900 text-white rounded-lg font-semibold flex items-center gap-2 shadow-sm hover:opacity-90 transition-opacity">
                            <span class="material-symbols-outlined text-lg">shopping_cart</span>
                            {{ __('Nuevo Pedido de Venta') }}
                        </button>
                    </div>
                </div>
                <!-- Dashboard Highlights (Bento Grid Style) -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter mb-lg">
                    <div
                        class="p-md bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant flex flex-col justify-between">
                        <div>
                            <p class="text-label-sm font-label-sm text-outline uppercase tracking-wider mb-sm">{{ __('Ingresos Totales') }}
                            </p>
                            <p class="text-headline-md font-headline-md text-primary">${{ number_format($totalIngresos, 2) }}</p>
                        </div>
                        <div class="mt-sm flex items-center gap-xs text-secondary">
                            <span class="material-symbols-outlined text-sm">trending_up</span>
                            <span class="text-label-sm font-label-sm">+100% {{ __('este mes') }}</span>
                        </div>
                    </div>
                    <div
                        class="p-md bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant flex flex-col justify-between">
                        <div>
                            <p class="text-label-sm font-label-sm text-outline uppercase tracking-wider mb-sm">{{ __('Gastos Operativos') }}
                            </p>
                            <p class="text-headline-md font-headline-md text-primary">${{ number_format($totalEgresos, 2) }}</p>
                        </div>
                        <div class="mt-sm flex items-center gap-xs text-error">
                            <span class="material-symbols-outlined text-sm">trending_down</span>
                            <span class="text-label-sm font-label-sm">{{ __('Gastos de producción y lotes') }}</span>
                        </div>
                    </div>
                    <div
                        class="p-md bg-primary-container rounded-xl shadow-sm flex flex-col justify-between overflow-hidden relative">
                        <div class="relative z-10">
                            <p class="text-label-sm font-label-sm text-primary-fixed uppercase tracking-wider mb-sm">{{ __('Margen Neto') }}
                            </p>
                            <p class="text-headline-md font-headline-md text-white">${{ number_format($margenNeto, 2) }}</p>
                        </div>
                        <div class="mt-sm relative z-10 flex items-center gap-xs text-secondary-fixed">
                            <span class="material-symbols-outlined text-sm">verified</span>
                            <span class="text-label-sm font-label-sm">{{ __('Salud financiera: Excelente') }}</span>
                        </div>
                        <div class="absolute -right-4 -bottom-4 opacity-10">
                            <span class="material-symbols-outlined text-9xl text-white">payments</span>
                        </div>
                    </div>
                </div>
                <!-- Main Ledger Table -->
                <div class="bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant overflow-hidden">
                    <div
                        class="p-gutter border-b border-outline-variant flex justify-between items-center bg-surface-container-low/30">
                        <div class="flex items-center gap-md">
                            <h3 class="font-headline-md text-headline-md text-primary">{{ __('Transacciones') }}</h3>
                            <div class="flex gap-xs">
                                <span
                                    class="px-3 py-1 bg-secondary-container text-on-secondary-container text-label-sm rounded-full">{{ __('Todas las cuentas') }}</span>
                                <span
                                    class="px-3 py-1 bg-surface-variant text-on-surface-variant text-label-sm rounded-full">{{ __('Tercer Trimestre 2025') }}</span>
                            </div>
                        </div>
                        <div class="flex gap-sm">
                            <div class="relative">
                                <span
                                    class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-lg">search</span>
                                <input
                                    class="pl-10 pr-4 py-2 border border-outline-variant rounded-lg bg-surface focus:border-secondary focus:ring-0 text-sm font-body-md w-64"
                                    placeholder="{{ __('Buscar transacciones...') }}" type="text" />
                            </div>
                            <button
                                class="p-2 border border-outline-variant rounded-lg hover:bg-surface-variant transition-colors">
                                <span class="material-symbols-outlined">filter_list</span>
                            </button>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-surface-container-low/50">
                                <tr>
                                    <th
                                        class="px-gutter py-md text-label-sm text-outline font-label-sm uppercase tracking-wider">
                                        {{ __('Fecha') }}</th>
                                    <th
                                        class="px-gutter py-md text-label-sm text-outline font-label-sm uppercase tracking-wider">
                                        {{ __('Detalles de la Transacción') }}</th>
                                    <th
                                        class="px-gutter py-md text-label-sm text-outline font-label-sm uppercase tracking-wider">
                                        {{ __('Categoría') }}</th>
                                    <th
                                        class="px-gutter py-md text-label-sm text-outline font-label-sm uppercase tracking-wider">
                                        {{ __('Monto') }}</th>
                                    <th
                                        class="px-gutter py-md text-label-sm text-outline font-label-sm uppercase tracking-wider text-right">
                                        {{ __('Acciones') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-outline-variant">
                                @forelse ($movimientos as $mov)
                                    <tr class="hover:bg-surface-container-low/40 transition-colors">
                                        <td class="px-gutter py-md font-label-md text-primary">{{ \Carbon\Carbon::parse($mov->fecha)->format('d/m/Y') }}</td>
                                        <td class="px-gutter py-md">
                                            <div class="flex items-center gap-sm">
                                                <div class="w-8 h-8 rounded bg-surface-container flex items-center justify-center">
                                                    @if ($mov->tipo === 'ingreso')
                                                        <span class="material-symbols-outlined text-secondary text-sm">trending_up</span>
                                                    @else
                                                        <span class="material-symbols-outlined text-error text-sm">receipt</span>
                                                    @endif
                                                </div>
                                                <div>
                                                    <p class="font-body-md font-semibold text-primary">{{ $mov->descripcion }}</p>
                                                    <p class="text-label-sm text-outline">TXN-{{ str_pad($mov->id, 6, '0', STR_PAD_LEFT) }} • Wonka Fabric Ledger</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-gutter py-md">
                                            @if ($mov->tipo === 'ingreso')
                                                <span class="px-3 py-1 bg-green-100 text-green-800 text-[11px] font-bold rounded-full uppercase tracking-tighter">{{ __('Sales Income') }}</span>
                                            @else
                                                <span class="px-3 py-1 bg-amber-100 text-amber-800 text-[11px] font-bold rounded-full uppercase tracking-tighter">{{ __('Production Cost') }}</span>
                                            @endif
                                        </td>
                                        <td class="px-gutter py-md font-body-md font-semibold {{ $mov->tipo === 'ingreso' ? 'text-secondary' : 'text-error' }}">
                                            {{ $mov->tipo === 'ingreso' ? '+' : '-' }}${{ number_format($mov->monto, 2) }}
                                        </td>
                                        <td class="px-gutter py-md text-right text-xs text-outline italic">
                                            {{ __('Verificado') }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-gutter py-8 text-center text-outline italic text-sm">
                                            {{ __('No hay transacciones registradas actualmente') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination info -->
                    <div class="p-gutter flex items-center justify-between bg-surface-container-low/30 border-t border-outline-variant">
                        <p class="text-label-sm text-outline font-label-sm">{{ __('Total:') }} {{ $movimientos->count() }} {{ __('transacciones registradas') }}</p>
                        <div class="flex gap-base">
                            <span class="text-xs text-outline font-mono italic">{{ __('Ledger Sincronizado') }}</span>
                        </div>
                    </div>
                </div>
                <!-- Pedidos de Venta Panel -->
                <div class="mt-lg p-md bg-white rounded-xl border border-outline-variant shadow-sm flex flex-col gap-sm">
                    <div class="flex justify-between items-center mb-md">
                        <div>
                            <h4 class="font-headline-md text-primary text-xl font-bold flex items-center gap-2">
                                <span class="material-symbols-outlined text-secondary">shopping_cart</span>
                                {{ __('Pedidos de Venta Registrados') }}
                            </h4>
                            <p class="text-xs text-outline">{{ __('Monitorea las órdenes de venta pendientes y completadas en el sistema.') }}</p>
                        </div>
                        <button onclick="document.getElementById('sellOrderModal').classList.remove('hidden')"
                            class="px-4 py-2 bg-amber-900 text-white rounded-lg text-xs font-bold hover:bg-amber-800 transition-colors flex items-center gap-1 shadow-sm">
                            <span class="material-symbols-outlined text-xs">add</span> {{ __('Nuevo Pedido') }}
                        </button>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-surface-container-low border-b border-outline-variant">
                                    <th class="px-4 py-3 font-semibold text-xs text-stone-600 uppercase">{{ __('Pedido ID') }}</th>
                                    <th class="px-4 py-3 font-semibold text-xs text-stone-600 uppercase">{{ __('Fecha') }}</th>
                                    <th class="px-4 py-3 font-semibold text-xs text-stone-600 uppercase">{{ __('Cliente') }}</th>
                                    <th class="px-4 py-3 font-semibold text-xs text-stone-600 uppercase">{{ __('Total') }}</th>
                                    <th class="px-4 py-3 font-semibold text-xs text-stone-600 uppercase">{{ __('Estado') }}</th>
                                    <th class="px-4 py-3 font-semibold text-xs text-stone-600 uppercase text-right">{{ __('Fulfillment') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-outline-variant">
                                @forelse ($pedidos as $ped)
                                    <tr class="hover:bg-stone-50 transition-colors text-sm">
                                        <td class="px-4 py-3 font-mono font-bold text-stone-700">#{{ $ped->id }}</td>
                                        <td class="px-4 py-3 text-stone-600">{{ \Carbon\Carbon::parse($ped->fecha)->format('d/m/Y') }}</td>
                                        <td class="px-4 py-3 text-primary font-medium">{{ $ped->cliente->nombre }} {{ $ped->cliente->apellido }}</td>
                                        <td class="px-4 py-3 font-bold text-stone-800">${{ number_format($ped->total, 2) }}</td>
                                        <td class="px-4 py-3">
                                            @if ($ped->estado === 'pendiente')
                                                <span class="px-2.5 py-1 bg-amber-100 text-amber-800 text-[10px] font-bold rounded-full uppercase tracking-tighter">{{ __('Pendiente') }}</span>
                                            @elseif ($ped->estado === 'completado')
                                                <span class="px-2.5 py-1 bg-green-100 text-green-800 text-[10px] font-bold rounded-full uppercase tracking-tighter">{{ __('Completado') }}</span>
                                            @else
                                                <span class="px-2.5 py-1 bg-stone-100 text-stone-800 text-[10px] font-bold rounded-full uppercase tracking-tighter">{{ $ped->estado }}</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-right font-bold text-stone-700">
                                            @if ($ped->estado === 'pendiente')
                                                <a href="/inventory" class="text-xs text-amber-900 hover:text-amber-700 font-bold underline flex items-center gap-0.5 justify-end">
                                                    <span class="material-symbols-outlined text-[14px]">outbox</span> {{ __('Despachar en Inventario') }}
                                                </a>
                                            @else
                                                <span class="text-xs text-green-600 font-semibold italic flex items-center gap-0.5 justify-end">
                                                    <span class="material-symbols-outlined text-[14px]">check_circle</span> {{ __('Completado') }}
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-4 py-8 text-center text-outline italic text-xs">
                                            {{ __('No hay pedidos de venta registrados en la contabilidad actualmente') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

    <!-- New Sales Order Modal overlay -->
    <div id="sellOrderModal" class="fixed inset-0 z-[100] flex items-center justify-center hidden bg-stone-900/60 backdrop-blur-sm p-4">
        <div class="bg-white rounded-2xl border border-stone-200 max-w-md w-full p-6 shadow-xl relative animate-in fade-in zoom-in duration-200">
            <!-- Modal Close button -->
            <button type="button" onclick="document.getElementById('sellOrderModal').classList.add('hidden')" class="absolute top-4 right-4 text-stone-400 hover:text-stone-600 transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>

            <!-- Modal Header -->
            <div class="flex items-center gap-2 mb-4">
                <span class="material-symbols-outlined text-amber-900 text-2xl">shopping_cart</span>
                <h3 class="text-xl font-bold text-primary">{{ __('Crear Pedido de Venta') }}</h3>
            </div>
            
            <p class="text-sm text-outline mb-6 leading-relaxed">
                {{ __('Genera una nueva orden de venta pendiente. Recuerda que no afectará tu saldo contable hasta que despaches (retires) las cajas del inventario asignándolas a este pedido.') }}
            </p>

            <!-- Sell Order Form -->
            <form action="{{ route('accounting.order') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Client Dropdown -->
                <div class="flex flex-col gap-xs">
                    <label class="text-sm font-semibold text-stone-700 mb-1" for="id_cliente">{{ __('Cliente') }}</label>
                    <select name="id_cliente" id="id_cliente" class="w-full bg-white border border-stone-200 rounded-xl p-3 text-sm outline-none focus:border-amber-700 transition-all" required>
                        @foreach ($clientes as $cli)
                            <option value="{{ $cli->id }}">
                                {{ $cli->nombre }} {{ $cli->apellido }} ({{ $cli->usuario }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Product Dropdown -->
                <div class="flex flex-col gap-xs">
                    <label class="text-sm font-semibold text-stone-700 mb-1" for="id_producto">{{ __('Producto a Vender') }}</label>
                    <select name="id_producto" id="id_producto" onchange="updateDefaultPrice(this)" class="w-full bg-white border border-stone-200 rounded-xl p-3 text-sm outline-none focus:border-amber-700 transition-all" required>
                        <option value="" disabled selected>{{ __('Seleccione un producto del catálogo') }}</option>
                        @foreach ($productos as $prod)
                            <option value="{{ $prod->id }}" data-price="{{ $prod->precio_unitario }}">
                                {{ $prod->nombre }} — ${{ number_format($prod->precio_unitario, 2) }} por caja
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Quantity and Unit Price Side-by-side -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex flex-col gap-xs">
                        <label class="text-sm font-semibold text-stone-700 mb-1" for="order_cantidad">{{ __('Cantidad (Cajas)') }}</label>
                        <input name="cantidad" id="order_cantidad" type="number" min="1" placeholder="ej. 5" oninput="calculateOrderTotal()" class="w-full bg-white border border-stone-200 rounded-xl p-3 text-sm outline-none focus:border-amber-700 transition-all" required />
                    </div>
                    <div class="flex flex-col gap-xs">
                        <label class="text-sm font-semibold text-stone-700 mb-1" for="order_precio">{{ __('Precio por Caja') }}</label>
                        <input name="precio_unitario" id="order_precio" type="number" step="0.01" min="0" placeholder="0.00" oninput="calculateOrderTotal()" class="w-full bg-white border border-stone-200 rounded-xl p-3 text-sm outline-none focus:border-amber-700 transition-all" required />
                    </div>
                </div>

                <!-- Order Total Preview -->
                <div class="p-3 bg-stone-50 rounded-xl border border-stone-100 flex justify-between items-center text-sm font-semibold mt-2">
                    <span class="text-stone-600">{{ __('Total Estimado del Pedido:') }}</span>
                    <span id="order_total_preview" class="text-primary text-md font-bold">$0.00</span>
                </div>

                <!-- Actions -->
                <div class="pt-4 flex gap-4">
                    <button type="button" onclick="document.getElementById('sellOrderModal').classList.add('hidden')" class="w-1/2 py-3 border border-stone-200 text-stone-600 rounded-xl font-bold hover:bg-stone-50 transition-colors text-sm">
                        {{ __('Cancelar') }}
                    </button>
                    <button type="submit" class="w-1/2 py-3 bg-amber-900 text-white rounded-xl font-bold shadow-lg shadow-amber-900/10 hover:opacity-95 transition-opacity text-sm flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-md">check_circle</span>
                        {{ __('Guardar Pedido') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script to dynamically handle default prices and order calculations -->
    <script>
        function updateDefaultPrice(selectElement) {
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            const price = selectedOption.getAttribute('data-price');
            if (price) {
                document.getElementById('order_precio').value = parseFloat(price).toFixed(2);
            }
            calculateOrderTotal();
        }

        function calculateOrderTotal() {
            const cantidad = parseInt(document.getElementById('order_cantidad').value) || 0;
            const precio = parseFloat(document.getElementById('order_precio').value) || 0;
            const total = cantidad * precio;
            document.getElementById('order_total_preview').innerText = '$' + total.toFixed(2);
        }
    </script>
@endsection
