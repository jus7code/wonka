@extends('layouts.app')

@section('header')
    <header class="bg-stone-50 dark:bg-stone-900 border-b border-stone-200 dark:border-stone-800 shadow-sm flex justify-between items-center w-full px-6 py-3 h-16 sticky top-0 z-50">
        <div class="flex items-center gap-md">
            <span class="text-xl font-bold text-amber-900 dark:text-amber-50 tracking-tight">{{ __('Artisanal Logistics') }}</span>
        </div>
        <div class="flex items-center gap-sm">
        </div>
    </header>
@endsection

@section('content')
    <div class="p-margin flex flex-col gap-lg">
        
        <!-- Alerts Block -->
        @if (session('success'))
            <div class="p-4 bg-green-50 border border-green-200 rounded-xl flex items-center gap-3 text-green-800 text-sm font-semibold shadow-sm animate-in fade-in duration-200">
                <span class="material-symbols-outlined text-green-600 text-lg">check_circle</span>
                <div>{{ session('success') }}</div>
            </div>
        @endif

        @if (session('error'))
            <div class="p-4 bg-red-50 border border-red-200 rounded-xl flex items-center gap-3 text-red-800 text-sm font-semibold shadow-sm animate-in fade-in duration-200">
                <span class="material-symbols-outlined text-red-600 text-lg">error</span>
                <div>{{ session('error') }}</div>
            </div>
        @endif

        @if ($errors->any())
            <div class="p-4 bg-red-50 border border-red-200 rounded-xl text-red-800 text-sm space-y-1 shadow-sm">
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

        @if (auth()->user()->role === 'admin')
            <!-- ================= ADMIN LAYOUT ================= -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4">
                <div>
                    <h2 class="font-headline-lg text-headline-lg text-primary">{{ __('Personal y Recursos Humanos') }}</h2>
                    <p class="font-body-md text-body-md text-outline mt-1">{{ __('Administra roles de operarios, asignación de salarios, líneas de producción y turnos semanales.') }}</p>
                </div>
                <div class="flex gap-3 shrink-0">
                    <button onclick="document.getElementById('assignShiftModal').classList.remove('hidden')"
                        class="px-5 py-2.5 rounded-xl border border-stone-200 bg-white hover:bg-stone-50 text-stone-700 font-bold transition-all flex items-center gap-2 text-xs shadow-sm">
                        <span class="material-symbols-outlined text-xs">calendar_month</span>
                        {{ __('Asignar Turno Semanal') }}
                    </button>
                    <button onclick="document.getElementById('hireModal').classList.remove('hidden')"
                        class="bg-amber-900 text-white px-5 py-2.5 rounded-xl font-bold hover:bg-amber-800 transition-all flex items-center gap-2 text-xs shadow-md shadow-amber-900/10">
                        <span class="material-symbols-outlined text-xs">person_add</span>
                        {{ __('Contratar Operario') }}
                    </button>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter">
                <div class="bg-white p-6 rounded-2xl border border-stone-100 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-xs text-stone-400 font-bold uppercase tracking-wider">{{ __('Total Operarios') }}</p>
                        <span class="text-3xl font-black text-amber-900 mt-2 block">{{ $trabajadores->count() }}</span>
                    </div>
                    <span class="material-symbols-outlined text-amber-900 text-3xl bg-amber-50 p-3 rounded-2xl">badge</span>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-stone-100 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-xs text-stone-400 font-bold uppercase tracking-wider">{{ __('Solicitudes Pendientes') }}</p>
                        <span class="text-3xl font-black text-amber-900 mt-2 block">{{ $solicitudes->where('estado', 'pendiente')->count() }}</span>
                    </div>
                    <span class="material-symbols-outlined text-amber-900 text-3xl bg-amber-50 p-3 rounded-2xl">pending_actions</span>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-stone-100 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-xs text-stone-400 font-bold uppercase tracking-wider">{{ __('Líneas Activas') }}</p>
                        <span class="text-3xl font-black text-amber-900 mt-2 block">{{ $lineas->count() }}</span>
                    </div>
                    <span class="material-symbols-outlined text-amber-900 text-3xl bg-amber-50 p-3 rounded-2xl">factory</span>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-stone-100 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-xs text-stone-400 font-bold uppercase tracking-wider">{{ __('Estado del Personal') }}</p>
                        <span class="text-xs font-bold text-green-700 bg-green-50 px-3 py-1 rounded-full inline-block mt-3 border border-green-100">{{ __('100% Operativo') }}</span>
                    </div>
                    <span class="material-symbols-outlined text-amber-900 text-3xl bg-amber-50 p-3 rounded-2xl">verified_user</span>
                </div>
            </div>

            <!-- Shift Requests Center -->
            @if ($solicitudes->where('estado', 'pendiente')->count() > 0)
                <div class="bg-amber-900/5 border border-amber-900/10 rounded-2xl p-6 space-y-4">
                    <h3 class="font-bold text-amber-950 flex items-center gap-2">
                        <span class="material-symbols-outlined">pending_actions</span>
                        {{ __('Solicitudes de Turno Pendientes de Aprobación') }}
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach ($solicitudes->where('estado', 'pendiente') as $sol)
                            <div class="bg-white p-4 border border-stone-100 rounded-xl flex flex-col justify-between gap-4 shadow-sm">
                                <div class="space-y-1">
                                    <div class="flex justify-between items-center">
                                        <h4 class="font-bold text-stone-800 text-sm">{{ $sol->trabajador->nombre }} {{ $sol->trabajador->apellido }}</h4>
                                        <span class="px-2 py-0.5 bg-amber-50 text-amber-800 text-[10px] font-bold rounded-full border border-amber-100 uppercase">
                                            {{ $sol->tipo === 'cambio' ? 'Cambio' : 'Cancelación' }}
                                        </span>
                                    </div>
                                    <p class="text-xs text-stone-500">
                                        <strong>Fecha Solicitada:</strong> {{ date('d M Y', strtotime($sol->fecha_deseada)) }}
                                    </p>
                                    @if ($sol->tipo === 'cambio')
                                        <p class="text-xs text-stone-500">
                                            <strong>Turno Propuesto:</strong> {{ ucfirst($sol->turnoDeseado->nombre ?? 'N/A') }}
                                        </p>
                                    @endif
                                    @if ($sol->motivo)
                                        <p class="text-xs text-stone-500 italic bg-stone-50 p-2 rounded-lg border border-stone-100 mt-2">
                                            "{{ $sol->motivo }}"
                                        </p>
                                    @endif
                                </div>
                                <div class="flex gap-2 justify-end pt-2 border-t border-stone-100">
                                    <form action="{{ route('hr.shift.reject', $sol->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="px-3 py-1.5 bg-red-50 hover:bg-red-100 text-red-700 text-[11px] font-bold rounded-lg transition-colors">
                                            {{ __('Rechazar') }}
                                        </button>
                                    </form>
                                    <form action="{{ route('hr.shift.approve', $sol->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="px-3 py-1.5 bg-green-50 hover:bg-green-100 text-green-700 text-[11px] font-bold rounded-lg transition-colors">
                                            {{ __('Aprobar') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Employee List Table -->
            <div class="bg-white rounded-2xl border border-stone-250 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-stone-100 bg-stone-50/50 flex justify-between items-center">
                    <h3 class="font-bold text-stone-800">{{ __('Nómina y Planta de Personal') }}</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-stone-50/50 border-b border-stone-100 text-stone-600">
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider">{{ __('Empleado') }}</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider">{{ __('Cargo y Estado') }}</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider">{{ __('Línea de Producción') }}</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider">{{ __('Salario Mensual') }}</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-right">{{ __('Acciones') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-stone-100">
                            @forelse ($trabajadores as $tr)
                                <tr class="hover:bg-stone-50/30 transition-colors group">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-9 h-9 rounded-full bg-amber-800 text-white font-bold flex items-center justify-center overflow-hidden border border-outline-variant shadow-inner">
                                                @if ($tr->user && $tr->user->profile_image)
                                                    <img src="{{ $tr->user->profile_image }}" alt="Avatar" class="w-full h-full object-cover" />
                                                @else
                                                    {{ strtoupper(substr($tr->nombre, 0, 2)) }}
                                                @endif
                                            </div>
                                            <div>
                                                <p class="font-bold text-stone-850 text-sm">{{ $tr->nombre }} {{ $tr->apellido }}</p>
                                                <p class="text-xs text-stone-400">{{ $tr->user->email ?? __('Sin Correo') }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="font-semibold text-stone-700 text-xs">{{ $tr->cargo }}</p>
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-bold border mt-1 {{ $tr->estado === 'activo' ? 'bg-green-50 text-green-700 border-green-100' : 'bg-red-50 text-red-700 border-red-100' }}">
                                            {{ ucfirst($tr->estado) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($tr->lineaProduccion)
                                            <span class="px-3 py-1 bg-amber-50 text-amber-950 font-bold border border-amber-900/10 text-xs rounded-xl">
                                                {{ $tr->lineaProduccion->nombre }}
                                            </span>
                                        @else
                                            <span class="text-stone-400 text-xs italic">{{ __('Sin asignar') }}</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 font-mono font-bold text-stone-800 text-xs">
                                        ${{ number_format($tr->salario, 2) }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <button onclick="openEditModal({{ json_encode($tr) }})"
                                            class="p-2 text-stone-400 hover:text-amber-900 transition-colors inline-flex items-center justify-center rounded-lg hover:bg-stone-50">
                                            <span class="material-symbols-outlined text-lg">edit</span>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center text-stone-400 text-xs italic">
                                        {{ __('No se encontraron empleados registrados en la nómina.') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Admin Action Modals -->
            <!-- Modal 1: Hire Employee -->
            <div id="hireModal" class="fixed inset-0 z-[100] flex items-center justify-center hidden bg-stone-900/60 backdrop-blur-sm p-4 overflow-y-auto">
                <div class="bg-white rounded-3xl border border-stone-200 max-w-xl w-full p-6 shadow-2xl relative my-8">
                    <button type="button" onclick="document.getElementById('hireModal').classList.add('hidden')" class="absolute top-4 right-4 text-stone-400 hover:text-stone-600">
                        <span class="material-symbols-outlined text-xl">close</span>
                    </button>
                    <div class="flex items-center gap-2 mb-4">
                        <span class="material-symbols-outlined text-amber-900 text-2xl">person_add</span>
                        <h3 class="text-lg font-bold text-primary">{{ __('Contratar y Registrar Operario') }}</h3>
                    </div>
                    <form action="{{ route('hr.hire') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-bold text-stone-700">{{ __('Nombre') }}</label>
                                <input required type="text" name="nombre" placeholder="ej. Carlos" class="px-3 py-2 border border-stone-200 rounded-xl text-sm focus:border-amber-700 outline-none">
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-bold text-stone-700">{{ __('Apellido') }}</label>
                                <input required type="text" name="apellido" placeholder="ej. Pérez" class="px-3 py-2 border border-stone-200 rounded-xl text-sm focus:border-amber-700 outline-none">
                            </div>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="text-xs font-bold text-stone-700">{{ __('Correo Electrónico') }}</label>
                            <input required type="email" name="email" placeholder="carlosperez@wonka.com" class="px-3 py-2 border border-stone-200 rounded-xl text-sm focus:border-amber-700 outline-none">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="text-xs font-bold text-stone-700">{{ __('Contraseña de Acceso') }}</label>
                            <input required type="password" name="password" placeholder="••••••••" class="px-3 py-2 border border-stone-200 rounded-xl text-sm focus:border-amber-700 outline-none">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-bold text-stone-700">{{ __('Cargo') }}</label>
                                <input required type="text" name="cargo" placeholder="ej. Mezclador Senior" class="px-3 py-2 border border-stone-200 rounded-xl text-sm focus:border-amber-700 outline-none">
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-bold text-stone-700">{{ __('Salario Mensual ($)') }}</label>
                                <input required type="number" step="0.01" min="0" name="salario" placeholder="ej. 1500" class="px-3 py-2 border border-stone-200 rounded-xl text-sm focus:border-amber-700 outline-none">
                            </div>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="text-xs font-bold text-stone-700">{{ __('Asignar Línea de Producción (opcional)') }}</label>
                            <select name="id_linea_produccion" class="px-3 py-2 border border-stone-200 rounded-xl text-sm focus:border-amber-700 outline-none">
                                <option value="">{{ __('Sin asignar (Almacén/Operaciones generales)') }}</option>
                                @foreach ($lineas as $l)
                                    <option value="{{ $l->id }}">{{ $l->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="pt-4 flex justify-end gap-2 border-t border-stone-100">
                            <button type="button" onclick="document.getElementById('hireModal').classList.add('hidden')" class="px-4 py-2 border border-stone-200 text-stone-600 rounded-xl text-xs font-bold">{{ __('Cancelar') }}</button>
                            <button type="submit" class="px-6 py-2 bg-amber-900 text-white rounded-xl text-xs font-bold">{{ __('Registrar Contratación') }}</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal 2: Assign Shift -->
            <div id="assignShiftModal" class="fixed inset-0 z-[100] flex items-center justify-center hidden bg-stone-900/60 backdrop-blur-sm p-4">
                <div class="bg-white rounded-3xl border border-stone-200 max-w-md w-full p-6 shadow-2xl relative">
                    <button type="button" onclick="document.getElementById('assignShiftModal').classList.add('hidden')" class="absolute top-4 right-4 text-stone-400 hover:text-stone-600">
                        <span class="material-symbols-outlined text-xl">close</span>
                    </button>
                    <div class="flex items-center gap-2 mb-4">
                        <span class="material-symbols-outlined text-amber-900 text-2xl">calendar_month</span>
                        <h3 class="text-lg font-bold text-primary">{{ __('Asignar Turno de Trabajo') }}</h3>
                    </div>
                    <form action="{{ route('hr.shift.assign') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="flex flex-col gap-1">
                            <label class="text-xs font-bold text-stone-700">{{ __('Seleccionar Operario') }}</label>
                            <select required name="id_trabajador" class="px-3 py-2 border border-stone-200 rounded-xl text-sm focus:border-amber-700 outline-none">
                                <option value="" disabled selected>{{ __('Seleccionar empleado...') }}</option>
                                @foreach ($trabajadores as $tr)
                                    <option value="{{ $tr->id }}">{{ $tr->nombre }} {{ $tr->apellido }} ({{ $tr->cargo }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="text-xs font-bold text-stone-700">{{ __('Seleccionar Horario / Turno') }}</label>
                            <select required name="id_turno" class="px-3 py-2 border border-stone-200 rounded-xl text-sm focus:border-amber-700 outline-none">
                                <option value="" disabled selected>{{ __('Seleccionar turno...') }}</option>
                                @foreach ($turnos as $t)
                                    <option value="{{ $t->id }}">{{ ucfirst($t->nombre) }} ({{ date('H:i', strtotime($t->hora_inicio)) }} - {{ date('H:i', strtotime($t->hora_fin)) }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="text-xs font-bold text-stone-700">{{ __('Fecha del Turno') }}</label>
                            <input required type="date" name="fecha" min="{{ date('Y-m-d') }}" class="px-3 py-2 border border-stone-200 rounded-xl text-sm focus:border-amber-700 outline-none">
                        </div>
                        <div class="pt-4 flex justify-end gap-2 border-t border-stone-100">
                            <button type="button" onclick="document.getElementById('assignShiftModal').classList.add('hidden')" class="px-4 py-2 border border-stone-200 text-stone-600 rounded-xl text-xs font-bold">{{ __('Cancelar') }}</button>
                            <button type="submit" class="px-6 py-2 bg-amber-900 text-white rounded-xl text-xs font-bold">{{ __('Asignar Horario') }}</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal 3: Edit Employee -->
            <div id="editModal" class="fixed inset-0 z-[100] flex items-center justify-center hidden bg-stone-900/60 backdrop-blur-sm p-4">
                <div class="bg-white rounded-3xl border border-stone-200 max-w-xl w-full p-6 shadow-2xl relative">
                    <button type="button" onclick="document.getElementById('editModal').classList.add('hidden')" class="absolute top-4 right-4 text-stone-400 hover:text-stone-600">
                        <span class="material-symbols-outlined text-xl">close</span>
                    </button>
                    <div class="flex items-center gap-2 mb-4">
                        <span class="material-symbols-outlined text-amber-900 text-2xl">edit_document</span>
                        <h3 class="text-lg font-bold text-primary">{{ __('Actualizar Expediente de Operario') }}</h3>
                    </div>
                    <form id="editForm" action="" method="POST" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-bold text-stone-700">{{ __('Nombre') }}</label>
                                <input required type="text" name="nombre" id="edit_nombre" class="px-3 py-2 border border-stone-200 rounded-xl text-sm focus:border-amber-700 outline-none">
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-bold text-stone-700">{{ __('Apellido') }}</label>
                                <input required type="text" name="apellido" id="edit_apellido" class="px-3 py-2 border border-stone-200 rounded-xl text-sm focus:border-amber-700 outline-none">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-bold text-stone-700">{{ __('Cargo') }}</label>
                                <input required type="text" name="cargo" id="edit_cargo" class="px-3 py-2 border border-stone-200 rounded-xl text-sm focus:border-amber-700 outline-none">
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-bold text-stone-700">{{ __('Salario Mensual ($)') }}</label>
                                <input required type="number" step="0.01" min="0" name="salario" id="edit_salario" class="px-3 py-2 border border-stone-200 rounded-xl text-sm focus:border-amber-700 outline-none">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-bold text-stone-700">{{ __('Línea de Producción') }}</label>
                                <select name="id_linea_produccion" id="edit_linea" class="px-3 py-2 border border-stone-200 rounded-xl text-sm focus:border-amber-700 outline-none">
                                    <option value="">{{ __('Sin asignar') }}</option>
                                    @foreach ($lineas as $l)
                                        <option value="{{ $l->id }}">{{ $l->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-bold text-stone-700">{{ __('Estado Laboral') }}</label>
                                <select name="estado" id="edit_estado" class="px-3 py-2 border border-stone-200 rounded-xl text-sm focus:border-amber-700 outline-none">
                                    <option value="activo">{{ __('Activo') }}</option>
                                    <option value="inactivo">{{ __('Inactivo') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="text-xs font-bold text-stone-700">{{ __('Nueva Contraseña') }} <span class="text-[10px] text-stone-400 font-normal">({{ __('Dejar en blanco para conservar actual') }})</span></label>
                            <input type="password" name="password" placeholder="••••••••" class="px-3 py-2 border border-stone-200 rounded-xl text-sm focus:border-amber-700 outline-none">
                        </div>
                        <div class="pt-4 flex justify-end gap-2 border-t border-stone-100">
                            <button type="button" onclick="document.getElementById('editModal').classList.add('hidden')" class="px-4 py-2 border border-stone-200 text-stone-600 rounded-xl text-xs font-bold">{{ __('Cancelar') }}</button>
                            <button type="submit" class="px-6 py-2 bg-amber-900 text-white rounded-xl text-xs font-bold">{{ __('Guardar Cambios') }}</button>
                        </div>
                    </form>
                </div>
            </div>

            <script>
                function openEditModal(trabajador) {
                    document.getElementById('edit_nombre').value = trabajador.nombre;
                    document.getElementById('edit_apellido').value = trabajador.apellido;
                    document.getElementById('edit_cargo').value = trabajador.cargo;
                    document.getElementById('edit_salario').value = trabajador.salario;
                    document.getElementById('edit_linea').value = trabajador.id_linea_produccion || "";
                    document.getElementById('edit_estado').value = trabajador.estado;
                    
                    const form = document.getElementById('editForm');
                    form.action = `/humanresources/employee/${trabajador.id}/update`;
                    
                    document.getElementById('editModal').classList.remove('hidden');
                }
            </script>

        @elseif (auth()->user()->role === 'employee')
            <!-- ================= EMPLOYEE LAYOUT ================= -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4">
                <div>
                    <h2 class="font-headline-lg text-headline-lg text-primary">{{ __('Mi Horario y Turnos') }}</h2>
                    <p class="font-body-md text-body-md text-outline mt-1">{{ __('Consulta tus turnos de producción asignados para esta semana y gestiona solicitudes de cambio.') }}</p>
                </div>
                <div class="flex gap-3 shrink-0">
                    <button onclick="document.getElementById('requestShiftModal').classList.remove('hidden')"
                        class="bg-amber-900 text-white px-5 py-2.5 rounded-xl font-bold hover:bg-amber-800 transition-all flex items-center gap-2 text-xs shadow-md shadow-amber-900/10">
                        <span class="material-symbols-outlined text-xs">edit_calendar</span>
                        {{ __('Solicitar Cambio / Cancelación') }}
                    </button>
                </div>
            </div>

            <!-- Employee Info Quick Info Header -->
            <div class="bg-white p-6 rounded-2xl border border-stone-200 shadow-sm grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <span class="text-xs text-stone-400 uppercase tracking-wider font-bold block">{{ __('Tu Puesto de Trabajo') }}</span>
                    <strong class="text-amber-950 font-black text-lg mt-1 block">{{ $trabajador->cargo }}</strong>
                </div>
                <div>
                    <span class="text-xs text-stone-400 uppercase tracking-wider font-bold block">{{ __('Tu Salario Registrado') }}</span>
                    <strong class="text-amber-950 font-black text-lg mt-1 block">${{ number_format($trabajador->salario, 2) }} / mes</strong>
                </div>
                <div>
                    <span class="text-xs text-stone-400 uppercase tracking-wider font-bold block">{{ __('Línea de Producción Asignada') }}</span>
                    <strong class="text-amber-950 font-black text-lg mt-1 block">
                        {{ $trabajador->lineaProduccion->nombre ?? __('Operaciones generales / Almacén') }}
                    </strong>
                </div>
            </div>

            <!-- Shifts Assigned Calendar Section -->
            <div class="bg-white rounded-2xl border border-stone-200 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-stone-100 bg-stone-50/50 flex items-center gap-2">
                    <span class="material-symbols-outlined text-amber-900">calendar_today</span>
                    <h3 class="font-bold text-stone-850">{{ __('Calendario de Turnos Asignados') }}</h3>
                </div>
                <div class="p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    @forelse ($asignaciones as $asig)
                        <div class="p-4 rounded-xl border border-stone-150 shadow-sm space-y-2 hover:border-amber-900/30 transition-all">
                            <span class="text-[10px] font-mono text-stone-400 uppercase tracking-widest block">{{ date('D d M Y', strtotime($asig->fecha)) }}</span>
                            <h4 class="font-bold text-amber-900 text-sm flex items-center gap-1.5 uppercase">
                                <span class="w-2 h-2 rounded-full bg-amber-700"></span>
                                {{ ucfirst($asig->turno->nombre) }}
                            </h4>
                            <p class="text-xs text-stone-600 font-medium">
                                {{ date('h:i A', strtotime($asig->turno->hora_inicio)) }} - {{ date('h:i A', strtotime($asig->turno->hora_fin)) }}
                            </p>
                        </div>
                    @empty
                        <div class="col-span-full py-12 text-center text-stone-400 text-xs italic">
                            {{ __('No tienes turnos programados o asignados para esta semana laboral.') }}
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Shift Request log -->
            <div class="bg-white rounded-2xl border border-stone-200 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-stone-100 bg-stone-50/50 flex items-center gap-2">
                    <span class="material-symbols-outlined text-amber-900">history</span>
                    <h3 class="font-bold text-stone-850">{{ __('Historial de Solicitudes Realizadas') }}</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-stone-50/50 border-b border-stone-100 text-stone-600">
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider">{{ __('Tipo') }}</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider">{{ __('Fecha Solicitada') }}</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider">{{ __('Turno Objetivo') }}</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider">{{ __('Motivo Explicado') }}</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-right">{{ __('Estado') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-stone-100 text-xs font-medium">
                            @forelse ($solicitudes as $sol)
                                <tr>
                                    <td class="px-6 py-4 uppercase font-bold text-stone-700">
                                        {{ $sol->tipo === 'cambio' ? __('Cambio') : __('Cancelación') }}
                                    </td>
                                    <td class="px-6 py-4 text-stone-500 font-mono">
                                        {{ date('d M Y', strtotime($sol->fecha_deseada)) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ ucfirst($sol->turnoDeseado->nombre ?? 'N/A') }}
                                    </td>
                                    <td class="px-6 py-4 text-stone-500 max-w-xs truncate" title="{{ $sol->motivo }}">
                                        {{ $sol->motivo ?? __('Sin justificar') }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        @if ($sol->estado === 'pendiente')
                                            <span class="px-2.5 py-1 bg-amber-50 text-amber-800 rounded-full font-bold border border-amber-100 uppercase text-[9px]">{{ __('Pendiente') }}</span>
                                        @elseif ($sol->estado === 'aprobado')
                                            <span class="px-2.5 py-1 bg-green-50 text-green-800 rounded-full font-bold border border-green-100 uppercase text-[9px]">{{ __('Aprobado') }}</span>
                                        @else
                                            <span class="px-2.5 py-1 bg-red-50 text-red-800 rounded-full font-bold border border-red-100 uppercase text-[9px]">{{ __('Rechazado') }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-8 text-center text-stone-400 italic text-[11px]">
                                        {{ __('No has enviado ninguna solicitud de cambio o cancelación de turno.') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Employee Modals -->
            <!-- Modal: Request Shift Action -->
            <div id="requestShiftModal" class="fixed inset-0 z-[100] flex items-center justify-center hidden bg-stone-900/60 backdrop-blur-sm p-4">
                <div class="bg-white rounded-3xl border border-stone-200 max-w-md w-full p-6 shadow-2xl relative">
                    <button type="button" onclick="document.getElementById('requestShiftModal').classList.add('hidden')" class="absolute top-4 right-4 text-stone-400 hover:text-stone-600">
                        <span class="material-symbols-outlined text-xl">close</span>
                    </button>
                    <div class="flex items-center gap-2 mb-4">
                        <span class="material-symbols-outlined text-amber-900 text-2xl">edit_calendar</span>
                        <h3 class="text-lg font-bold text-primary">{{ __('Solicitud de Modificación de Turno') }}</h3>
                    </div>
                    <form action="{{ route('hr.shift.request') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="flex flex-col gap-1">
                            <label class="text-xs font-bold text-stone-700">{{ __('Tipo de Solicitud') }}</label>
                            <select required name="tipo" onchange="toggleTurnoSelect(this.value)" class="px-3 py-2 border border-stone-200 rounded-xl text-sm focus:border-amber-700 outline-none">
                                <option value="cambio">{{ __('Cambiar por otro turno') }}</option>
                                <option value="cancelacion">{{ __('Cancelar mi turno (Día libre)') }}</option>
                            </select>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="text-xs font-bold text-stone-700">{{ __('Fecha del Turno a Afectar') }}</label>
                            <input required type="date" name="fecha_deseada" min="{{ date('Y-m-d') }}" class="px-3 py-2 border border-stone-200 rounded-xl text-sm focus:border-amber-700 outline-none">
                        </div>
                        <div id="turnoDeseadoContainer" class="flex flex-col gap-1">
                            <label class="text-xs font-bold text-stone-700">{{ __('Turno que Deseas Trabajar') }}</label>
                            <select name="id_turno_deseado" class="px-3 py-2 border border-stone-200 rounded-xl text-sm focus:border-amber-700 outline-none">
                                @foreach ($turnos as $t)
                                    <option value="{{ $t->id }}">{{ ucfirst($t->nombre) }} ({{ date('H:i', strtotime($t->hora_inicio)) }} - {{ date('H:i', strtotime($t->hora_fin)) }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="text-xs font-bold text-stone-700">{{ __('Motivo o Justificación') }}</label>
                            <textarea rows="3" name="motivo" placeholder="{{ __('ej. Tengo una cita médica programada en horas de la mañana.') }}" class="px-3 py-2 border border-stone-200 rounded-xl text-sm focus:border-amber-700 outline-none"></textarea>
                        </div>
                        <div class="pt-4 flex justify-end gap-2 border-t border-stone-100">
                            <button type="button" onclick="document.getElementById('requestShiftModal').classList.add('hidden')" class="px-4 py-2 border border-stone-200 text-stone-600 rounded-xl text-xs font-bold">{{ __('Cancelar') }}</button>
                            <button type="submit" class="px-6 py-2 bg-amber-900 text-white rounded-xl text-xs font-bold">{{ __('Enviar Solicitud') }}</button>
                        </div>
                    </form>
                </div>
            </div>

            <script>
                function toggleTurnoSelect(type) {
                    const container = document.getElementById('turnoDeseadoContainer');
                    if (type === 'cancelacion') {
                        container.classList.add('hidden');
                    } else {
                        container.classList.remove('hidden');
                    }
                }
            </script>
        @endif
        
    </div>
@endsection
