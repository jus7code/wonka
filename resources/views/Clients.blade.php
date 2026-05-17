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
    <div class="p-margin flex-1">
    <!-- Breadcrumbs and Header -->
    <div class="mb-lg flex justify-between items-end">
    <div>
    <nav class="flex items-center gap-2 text-label-sm text-outline mb-base uppercase tracking-widest">
    <span>{{ __('Organization') }}</span>
    <span class="material-symbols-outlined text-xs" data-icon="chevron_right">chevron_right</span>
    <span class="text-secondary font-bold">{{ __('Clients') }}</span>
    </nav>
    <h1 class="text-display-xl font-display-xl text-primary">{{ __('Client Management') }}</h1>
    </div>
    <div class="flex gap-4">
        <button onclick="document.getElementById('newClientModal').classList.remove('hidden')" class="bg-amber-950 hover:bg-amber-900 text-white px-6 py-3 rounded-lg font-bold text-label-md flex items-center gap-2 transition-all shadow-md">
            <span class="material-symbols-outlined" data-icon="person_add">person_add</span>
            {{ __('Registrar Nuevo Cliente') }}
        </button>
       
    </div>
    </div>
    <!-- Dashboard Stats Bento Grid -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter mb-lg">
    <div class="bg-surface-container-low p-md rounded-xl border border-outline-variant/30 flex flex-col gap-2">
    <span class="text-label-sm text-outline uppercase tracking-wider">{{ __('Total Partnerships') }}</span>
    <div class="flex items-baseline gap-2">
    <span class="text-headline-lg text-primary">{{ $totalPartnerships }}</span>
    <span class="text-label-sm text-green-600 flex items-center">+100% <span class="material-symbols-outlined text-xs" data-icon="trending_up">trending_up</span></span>
    </div>
    </div>
    <div class="bg-surface-container-low p-md rounded-xl border border-outline-variant/30 flex flex-col gap-2">
    <span class="text-label-sm text-outline uppercase tracking-wider">{{ __('Active Partnerships') }}</span>
    <div class="flex items-baseline gap-2">
    <span class="text-headline-lg text-primary">{{ $activeClientsCount }}</span>
    <span class="text-label-sm text-secondary">{{ __('Habilitados') }}</span>
    </div>
    </div>
    <div class="bg-surface-container-low p-md rounded-xl border border-outline-variant/30 flex flex-col gap-2">
    <span class="text-label-sm text-outline uppercase tracking-wider">Logistics Efficiency</span>
    <div class="flex items-baseline gap-2">
    <span class="text-headline-lg text-primary">98.2%</span>
    <span class="text-label-sm text-green-600 flex items-center">+1.2% <span class="material-symbols-outlined text-xs" data-icon="trending_up">trending_up</span></span>
    </div>
    </div>
    <div class="bg-surface-container-low p-md rounded-xl border border-outline-variant/30 flex flex-col gap-2">
    <span class="text-label-sm text-outline uppercase tracking-wider">Average Order Value</span>
    <div class="flex items-baseline gap-2">
    <span class="text-headline-lg text-primary">$12.4k</span>
    <span class="text-label-sm text-outline">Per SKU</span>
    </div>
    </div>
    </div>
    <!-- Main Client Table Card -->
    <div class="bg-white rounded-xl shadow-sm border border-stone-200 overflow-hidden">
    <div class="px-md py-4 border-b border-stone-100 flex justify-between items-center bg-stone-50/50">
    <h3 class="text-headline-md text-primary">{{ __('Active Clients') }}</h3>
    <div class="flex gap-2">
    <button class="p-2 border border-stone-200 rounded-lg hover:bg-white transition-colors">
    <span class="material-symbols-outlined text-stone-500" data-icon="filter_list">filter_list</span>
    </button>
    <button class="p-2 border border-stone-200 rounded-lg hover:bg-white transition-colors">
    <span class="material-symbols-outlined text-stone-500" data-icon="download">download</span>
    </button>
    </div>
    </div>
    <div class="overflow-x-auto">
    <table class="w-full text-left">
    <thead>
    <tr class="bg-stone-50/50 text-label-sm text-outline uppercase tracking-widest border-b border-stone-100">
    <th class="px-md py-4 font-bold">{{ __('Client Entity') }}</th>
    <th class="px-md py-4 font-bold">{{ __('Category') }}</th>
    <th class="px-md py-4 font-bold">{{ __('Status') }}</th>
    <th class="px-md py-4 font-bold">{{ __('Contract Value') }}</th>
    <th class="px-md py-4 font-bold">{{ __('Last Activity') }}</th>
    <th class="px-md py-4 font-bold text-right">{{ __('Actions') }}</th>
    </tr>
    </thead>
    <tbody class="divide-y divide-stone-100">
    @forelse ($clientes as $c)
    <tr class="hover:bg-surface-container-low/30 transition-colors group">
    <td class="px-md py-5">
    <div class="flex items-center gap-3">
    <div class="w-10 h-10 bg-amber-100 rounded-lg flex items-center justify-center text-amber-900 font-bold">
        {{ strtoupper(substr($c->nombre, 0, 1) . substr($c->apellido, 0, 1)) }}
    </div>
    <div>
    <div class="text-body-md font-bold text-primary">{{ $c->nombre }} {{ $c->apellido }}</div>
    <div class="text-label-sm text-stone-500">{{ $c->email }}</div>
    </div>
    </div>
    </td>
    <td class="px-md py-5 text-body-md text-on-surface-variant">{{ __('Cliente Mayorista') }}</td>
    <td class="px-md py-5">
    @if ($c->estado === 'activo')
        <span class="px-3 py-1 bg-green-100 text-green-800 text-[11px] font-black uppercase tracking-tighter rounded-full border border-green-200">{{ __('Activo') }}</span>
    @else
        <span class="px-3 py-1 bg-red-100 text-red-800 text-[11px] font-black uppercase tracking-tighter rounded-full border border-red-200">{{ __('Inactivo') }}</span>
    @endif
    </td>
    <td class="px-md py-5 text-body-md font-medium text-primary">
        @if ($c->pedidos->count() > 0)
            ${{ number_format($c->pedidos->sum('total'), 2) }}
        @else
            $0.00
        @endif
    </td>
    <td class="px-md py-5 text-label-md text-stone-500">
        {{ $c->created_at ? $c->created_at->diffForHumans() : __('Sin registro') }}
    </td>
    <td class="px-md py-5 text-right flex justify-end gap-2 items-center">
    <span class="text-xs text-outline italic font-mono mr-2">{{ $c->usuario }}</span>
    <button onclick="openEditClientModal({{ json_encode($c) }})" class="p-2 text-stone-400 hover:text-amber-900 hover:bg-stone-100 rounded-lg transition-all" title="{{ __('Editar Cliente') }}">
        <span class="material-symbols-outlined text-sm">edit</span>
    </button>
    </td>
    </tr>
    @empty
    <tr>
    <td colspan="6" class="px-md py-8 text-center text-outline italic text-sm">
        {{ __('No hay clientes registrados en el sistema actualmente') }}
    </td>
    </tr>
    @endforelse
    </tbody>
    </table>
    </div>
    <!-- Pagination -->
    <div class="px-md py-4 border-t border-stone-100 flex items-center justify-between bg-stone-50/50">
    <span class="text-label-sm text-stone-500">{{ __('Showing') }} {{ count($clientes) }} {{ __('clients in ERP database') }}</span>
    <div class="flex gap-2">
    <button class="px-3 py-1 border border-stone-200 rounded text-label-sm text-stone-600 hover:bg-white">{{ __('Previous') }}</button>
    <button class="px-3 py-1 bg-primary text-on-primary rounded text-label-sm">1</button>
    <button class="px-3 py-1 border border-stone-200 rounded text-label-sm text-stone-600 hover:bg-white">2</button>
    <button class="px-3 py-1 border border-stone-200 rounded text-label-sm text-stone-600 hover:bg-white">{{ __('Next') }}</button>
    </div>
    </div>
    </div>
    </div>

    <!-- New Client Modal overlay -->
    <div id="newClientModal" class="fixed inset-0 z-[100] flex items-center justify-center hidden bg-stone-900/60 backdrop-blur-sm p-4">
        <div class="bg-white rounded-2xl border border-stone-200 max-w-md w-full p-6 shadow-xl relative animate-in fade-in zoom-in duration-200">
            <!-- Modal Close button -->
            <button type="button" onclick="document.getElementById('newClientModal').classList.add('hidden')" class="absolute top-4 right-4 text-stone-400 hover:text-stone-600 transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>

            <!-- Modal Header -->
            <div class="flex items-center gap-2 mb-4">
                <span class="material-symbols-outlined text-amber-900 text-2xl">person_add</span>
                <h3 class="text-xl font-bold text-primary">{{ __('Registrar Nuevo Cliente') }}</h3>
            </div>
            
            <p class="text-sm text-outline mb-6 leading-relaxed">
                {{ __('Completa el formulario para registrar un nuevo cliente en el sistema. Una vez registrado, estará disponible inmediatamente para asociarle pedidos de venta.') }}
            </p>

            <!-- Client Form -->
            <form action="{{ route('clients.store') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Name & Surname Side-by-side -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex flex-col gap-xs">
                        <label class="text-sm font-semibold text-stone-700 mb-1" for="client_nombre">{{ __('Nombre') }}</label>
                        <input name="nombre" id="client_nombre" type="text" placeholder="ej. Juan" class="w-full bg-white border border-stone-200 rounded-xl p-3 text-sm outline-none focus:border-amber-700 transition-all" required />
                    </div>
                    <div class="flex flex-col gap-xs">
                        <label class="text-sm font-semibold text-stone-700 mb-1" for="client_apellido">{{ __('Apellido') }}</label>
                        <input name="apellido" id="client_apellido" type="text" placeholder="ej. Pérez" class="w-full bg-white border border-stone-200 rounded-xl p-3 text-sm outline-none focus:border-amber-700 transition-all" required />
                    </div>
                </div>

                <!-- Email -->
                <div class="flex flex-col gap-xs">
                    <label class="text-sm font-semibold text-stone-700 mb-1" for="client_email">{{ __('Correo Electrónico') }}</label>
                    <input name="email" id="client_email" type="email" placeholder="ej. juan@gmail.com" class="w-full bg-white border border-stone-200 rounded-xl p-3 text-sm outline-none focus:border-amber-700 transition-all" required />
                </div>

                <!-- Username and Password Side-by-side -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex flex-col gap-xs">
                        <label class="text-sm font-semibold text-stone-700 mb-1" for="client_usuario">{{ __('Usuario') }}</label>
                        <input name="usuario" id="client_usuario" type="text" placeholder="ej. jperez" class="w-full bg-white border border-stone-200 rounded-xl p-3 text-sm outline-none focus:border-amber-700 transition-all" required />
                    </div>
                    <div class="flex flex-col gap-xs">
                        <label class="text-sm font-semibold text-stone-700 mb-1" for="client_password">{{ __('Contraseña') }}</label>
                        <input name="password" id="client_password" type="password" placeholder="••••••••" class="w-full bg-white border border-stone-200 rounded-xl p-3 text-sm outline-none focus:border-amber-700 transition-all" required />
                    </div>
                </div>

                <!-- Status -->
                <div class="flex flex-col gap-xs">
                    <label class="text-sm font-semibold text-stone-700 mb-1" for="client_estado">{{ __('Estado de Cuenta') }}</label>
                    <select name="estado" id="client_estado" class="w-full bg-white border border-stone-200 rounded-xl p-3 text-sm outline-none focus:border-amber-700 transition-all" required>
                        <option value="activo" selected>{{ __('Activo (Habilitado para pedidos)') }}</option>
                        <option value="inactivo">{{ __('Inactivo') }}</option>
                    </select>
                </div>

                <!-- Actions -->
                <div class="pt-4 flex gap-4">
                    <button type="button" onclick="document.getElementById('newClientModal').classList.add('hidden')" class="w-1/2 py-3 border border-stone-200 text-stone-600 rounded-xl font-bold hover:bg-stone-50 transition-colors text-sm">
                        {{ __('Cancelar') }}
                    </button>
                    <button type="submit" class="w-1/2 py-3 bg-amber-900 text-white rounded-xl font-bold shadow-lg shadow-amber-900/10 hover:opacity-95 transition-opacity text-sm flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-md">check_circle</span>
                        {{ __('Registrar') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Client Modal overlay -->
    <div id="editClientModal" class="fixed inset-0 z-[100] flex items-center justify-center hidden bg-stone-900/60 backdrop-blur-sm p-4">
        <div class="bg-white rounded-2xl border border-stone-200 max-w-md w-full p-6 shadow-xl relative animate-in fade-in zoom-in duration-200">
            <!-- Modal Close button -->
            <button type="button" onclick="document.getElementById('editClientModal').classList.add('hidden')" class="absolute top-4 right-4 text-stone-400 hover:text-stone-600 transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>

            <!-- Modal Header -->
            <div class="flex items-center gap-2 mb-4">
                <span class="material-symbols-outlined text-amber-900 text-2xl">edit_note</span>
                <h3 class="text-xl font-bold text-primary">{{ __('Editar Cliente') }}</h3>
            </div>
            
            <p class="text-sm text-outline mb-6 leading-relaxed">
                {{ __('Modifica los campos del formulario para actualizar la información de este cliente y su cuenta de usuario asociada.') }}
            </p>

            <!-- Edit Client Form -->
            <form id="editClientForm" action="" method="POST" class="space-y-4">
                @csrf

                <!-- Name & Surname Side-by-side -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex flex-col gap-xs">
                        <label class="text-sm font-semibold text-stone-700 mb-1" for="edit_client_nombre">{{ __('Nombre') }}</label>
                        <input name="nombre" id="edit_client_nombre" type="text" class="w-full bg-white border border-stone-200 rounded-xl p-3 text-sm outline-none focus:border-amber-700 transition-all" required />
                    </div>
                    <div class="flex flex-col gap-xs">
                        <label class="text-sm font-semibold text-stone-700 mb-1" for="edit_client_apellido">{{ __('Apellido') }}</label>
                        <input name="apellido" id="edit_client_apellido" type="text" class="w-full bg-white border border-stone-200 rounded-xl p-3 text-sm outline-none focus:border-amber-700 transition-all" required />
                    </div>
                </div>

                <!-- Email -->
                <div class="flex flex-col gap-xs">
                    <label class="text-sm font-semibold text-stone-700 mb-1" for="edit_client_email">{{ __('Correo Electrónico') }}</label>
                    <input name="email" id="edit_client_email" type="email" class="w-full bg-white border border-stone-200 rounded-xl p-3 text-sm outline-none focus:border-amber-700 transition-all" required />
                </div>

                <!-- Username and Password Side-by-side -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex flex-col gap-xs">
                        <label class="text-sm font-semibold text-stone-700 mb-1" for="edit_client_usuario">{{ __('Usuario') }}</label>
                        <input name="usuario" id="edit_client_usuario" type="text" class="w-full bg-white border border-stone-200 rounded-xl p-3 text-sm outline-none focus:border-amber-700 transition-all" required />
                    </div>
                    <div class="flex flex-col gap-xs">
                        <label class="text-sm font-semibold text-stone-700 mb-1" for="edit_client_password">
                            {{ __('Contraseña') }} <span class="text-[10px] text-stone-400 font-normal">({{ __('Opcional') }})</span>
                        </label>
                        <input name="password" id="edit_client_password" type="password" placeholder="{{ __('Dejar en blanco') }}" class="w-full bg-white border border-stone-200 rounded-xl p-3 text-sm outline-none focus:border-amber-700 transition-all" />
                    </div>
                </div>

                <!-- Status -->
                <div class="flex flex-col gap-xs">
                    <label class="text-sm font-semibold text-stone-700 mb-1" for="edit_client_estado">{{ __('Estado de Cuenta') }}</label>
                    <select name="estado" id="edit_client_estado" class="w-full bg-white border border-stone-200 rounded-xl p-3 text-sm outline-none focus:border-amber-700 transition-all" required>
                        <option value="activo">{{ __('Activo (Habilitado para pedidos)') }}</option>
                        <option value="inactivo">{{ __('Inactivo') }}</option>
                    </select>
                </div>

                <!-- Actions -->
                <div class="pt-4 flex gap-4">
                    <button type="button" onclick="document.getElementById('editClientModal').classList.add('hidden')" class="w-1/2 py-3 border border-stone-200 text-stone-600 rounded-xl font-bold hover:bg-stone-50 transition-colors text-sm">
                        {{ __('Cancelar') }}
                    </button>
                    <button type="submit" class="w-1/2 py-3 bg-amber-900 text-white rounded-xl font-bold shadow-lg shadow-amber-900/10 hover:opacity-95 transition-opacity text-sm flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-md">check_circle</span>
                        {{ __('Actualizar') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Alert for validation or success -->
    @if(session('success'))
        <div class="fixed bottom-5 right-5 z-[200] bg-green-900 text-white px-6 py-4 rounded-xl shadow-xl flex items-center gap-2 animate-bounce">
            <span class="material-symbols-outlined">check_circle</span>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <script>
        function openEditClientModal(client) {
            // Set action URL dynamically
            const form = document.getElementById('editClientForm');
            form.action = `/Clients/${client.id}`;

            // Populate form values
            document.getElementById('edit_client_nombre').value = client.nombre;
            document.getElementById('edit_client_apellido').value = client.apellido;
            document.getElementById('edit_client_email').value = client.email;
            document.getElementById('edit_client_usuario').value = client.usuario;
            document.getElementById('edit_client_estado').value = client.estado;
            document.getElementById('edit_client_password').value = '';

            // Show modal
            document.getElementById('editClientModal').classList.remove('hidden');
        }
    </script>

    <footer class="p-margin mt-auto border-t border-stone-200 py-6 text-center">
    <p class="text-label-sm text-stone-400 uppercase tracking-widest">{{ __('© 2024 Artisanal Logistics Global. Built for Reliable Craftsmanship.') }}</p>
    </footer>
@endsection
