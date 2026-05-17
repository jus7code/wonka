<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Trabajador;
use App\Models\Turno;
use App\Models\AsignacionTurno;
use App\Models\SolicitudTurno;
use App\Models\LineaProduccion;
use Illuminate\Support\Facades\Hash;

class HumanResourcesController extends Controller
{
    /**
     * Display a listing of workers, shifts, and requests depending on user role.
     */
    public function index()
    {
        $user = auth()->user();

        // Ensure default shifts exist in DB
        $this->ensureDefaultShiftsExist();

        if ($user->role === 'admin') {
            $trabajadores = Trabajador::with(['user', 'lineaProduccion', 'asignacionesTurno.turno'])->get();
            $lineas = LineaProduccion::all();
            $turnos = Turno::all();
            $solicitudes = SolicitudTurno::with(['trabajador', 'turnoDeseado'])->orderBy('id', 'desc')->get();

            return view('HumanR', compact('trabajadores', 'lineas', 'turnos', 'solicitudes'));
        } elseif ($user->role === 'employee') {
            // Find linked employee profile or auto-create it to avoid crashes
            $trabajador = Trabajador::firstOrCreate(
                ['user_id' => $user->id],
                [
                    'nombre' => $user->name,
                    'apellido' => '',
                    'cargo' => 'Operario de Planta',
                    'salario' => 1200.00,
                    'estado' => 'activo'
                ]
            );

            // Fetch this week's assignments
            $asignaciones = AsignacionTurno::where('id_trabajador', $trabajador->id)
                ->with('turno')
                ->orderBy('fecha', 'asc')
                ->get();

            // Fetch this worker's requests
            $solicitudes = SolicitudTurno::where('id_trabajador', $trabajador->id)
                ->with('turnoDeseado')
                ->orderBy('id', 'desc')
                ->get();

            $turnos = Turno::all();

            return view('HumanR', compact('trabajador', 'asignaciones', 'solicitudes', 'turnos'));
        }

        // If client tries to access, redirect to client portal
        return redirect('/OrderChocolate');
    }

    /**
     * Hire/Create a new employee user and worker record.
     */
    public function hire(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'cargo' => 'required|string|max:100',
            'salario' => 'required|numeric|min:0',
            'id_linea_produccion' => 'nullable|exists:lineas_produccion,id'
        ]);

        // 1. Create linked User account with 'employee' role
        $user = User::create([
            'name' => $request->nombre . ' ' . $request->apellido,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'employee'
        ]);

        // 2. Create Trabajador profile
        Trabajador::create([
            'user_id' => $user->id,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'cargo' => $request->cargo,
            'salario' => $request->salario,
            'id_linea_produccion' => $request->id_linea_produccion,
            'estado' => 'activo'
        ]);

        return redirect('/humanresources')->with('success', __('¡Empleado contratado y registrado exitosamente con credenciales de acceso!'));
    }

    /**
     * Update employee worker and user account information (Admin only).
     */
    public function update(Request $request, $id)
    {
        $trabajador = Trabajador::findOrFail($id);
        
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'cargo' => 'required|string|max:100',
            'salario' => 'required|numeric|min:0',
            'estado' => 'required|in:activo,inactivo',
            'id_linea_produccion' => 'nullable|exists:lineas_produccion,id'
        ]);

        // Update Trabajador
        $trabajador->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'cargo' => $request->cargo,
            'salario' => $request->salario,
            'estado' => $request->estado,
            'id_linea_produccion' => $request->id_linea_produccion
        ]);

        // Sync with User
        if ($trabajador->user) {
            $userData = [
                'name' => $request->nombre . ' ' . $request->apellido,
            ];
            if ($request->filled('password')) {
                $userData['password'] = Hash::make($request->password);
            }
            $trabajador->user->update($userData);
        }

        return redirect('/humanresources')->with('success', __('¡Información del empleado actualizada correctamente!'));
    }

    /**
     * Assign a weekly shift to a worker (Admin only).
     */
    public function assignShift(Request $request)
    {
        $request->validate([
            'id_trabajador' => 'required|exists:trabajadores,id',
            'id_turno' => 'required|exists:turnos,id',
            'fecha' => 'required|date'
        ]);

        // Find or create assignment
        AsignacionTurno::updateOrCreate(
            [
                'id_trabajador' => $request->id_trabajador,
                'fecha' => $request->fecha
            ],
            [
                'id_turno' => $request->id_turno
            ]
        );

        return redirect('/humanresources')->with('success', __('¡Turno asignado exitosamente al empleado!'));
    }

    /**
     * Submit a shift change or cancellation request (Employee only).
     */
    public function requestShiftAction(Request $request)
    {
        $user = auth()->user();
        $trabajador = Trabajador::where('user_id', $user->id)->firstOrFail();

        $request->validate([
            'tipo' => 'required|in:cambio,cancelacion',
            'fecha_deseada' => 'required|date',
            'id_turno_deseado' => 'nullable|exists:turnos,id',
            'motivo' => 'nullable|string'
        ]);

        SolicitudTurno::create([
            'id_trabajador' => $trabajador->id,
            'tipo' => $request->tipo,
            'fecha_deseada' => $request->fecha_deseada,
            'id_turno_deseado' => $request->id_turno_deseado,
            'motivo' => $request->motivo,
            'estado' => 'pendiente'
        ]);

        return redirect('/humanresources')->with('success', __('¡Solicitud de turno enviada y pendiente de aprobación por el Administrador!'));
    }

    /**
     * Approve a shift change/cancellation request (Admin only).
     */
    public function approveRequest($id)
    {
        $solicitud = SolicitudTurno::findOrFail($id);

        if ($solicitud->tipo === 'cancelacion') {
            // Delete matching shift assignment on that date
            AsignacionTurno::where('id_trabajador', $solicitud->id_trabajador)
                ->where('fecha', $solicitud->fecha_deseada)
                ->delete();
        } else {
            // Create or update shift assignment
            AsignacionTurno::updateOrCreate(
                [
                    'id_trabajador' => $solicitud->id_trabajador,
                    'fecha' => $solicitud->fecha_deseada
                ],
                [
                    'id_turno' => $solicitud->id_turno_deseado
                ]
            );
        }

        $solicitud->update(['estado' => 'aprobado']);

        return redirect('/humanresources')->with('success', __('¡Solicitud de turno aprobada y cambios aplicados en el calendario!'));
    }

    /**
     * Reject a shift change/cancellation request (Admin only).
     */
    public function rejectRequest($id)
    {
        $solicitud = SolicitudTurno::findOrFail($id);
        $solicitud->update(['estado' => 'rechazado']);

        return redirect('/humanresources')->with('success', __('La solicitud de turno fue rechazada.'));
    }

    /**
     * Help helper to seed default shift types if empty.
     */
    private function ensureDefaultShiftsExist()
    {
        if (Turno::count() === 0) {
            Turno::create(['nombre' => 'matutino', 'hora_inicio' => '06:00:00', 'hora_fin' => '14:00:00']);
            Turno::create(['nombre' => 'mediodia', 'hora_inicio' => '14:00:00', 'hora_fin' => '22:00:00']);
            Turno::create(['nombre' => 'vespertino', 'hora_inicio' => '22:00:00', 'hora_fin' => '06:00:00']);
        }
    }
}
