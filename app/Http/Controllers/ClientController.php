<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Display a listing of clients.
     */
    public function index()
    {
        // Restrict clients from managing other clients
        if (auth()->user()->role === 'client') {
            return redirect('/OrderChocolate');
        }

        // Fetch all clients from the database
        $clientes = Cliente::orderBy('id', 'desc')->get();

        // Calculate statistics
        $totalPartnerships = $clientes->count();
        $activeClientsCount = $clientes->where('estado', 'activo')->count();
        
        return view('Clients', compact('clientes', 'totalPartnerships', 'activeClientsCount'));
    }

    /**
     * Store a newly created client in database.
     */
    public function store(Request $request)
    {
        if (auth()->user()->role === 'client') {
            return redirect('/OrderChocolate');
        }

        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email|unique:clientes,email|unique:users,email',
            'usuario' => 'required|string|max:80|unique:clientes,usuario|unique:users,name',
            'password' => 'required|string|min:6',
            'estado' => 'required|in:activo,inactivo',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'apellido.required' => 'El apellido es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El formato del correo es inválido.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'usuario.required' => 'El nombre de usuario es obligatorio.',
            'usuario.unique' => 'Este nombre de usuario ya está registrado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'estado.required' => 'El estado es obligatorio.',
        ]);

        // Create Cliente record
        Cliente::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'usuario' => $request->usuario,
            'clave_hash' => Hash::make($request->password),
            'estado' => $request->estado,
        ]);

        // Create User record
        User::create([
            'name' => $request->usuario,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'client',
        ]);

        return redirect('/Clients')->with('success', '¡El cliente y su cuenta de usuario fueron registrados exitosamente!');
    }

    /**
     * Update an existing client and its user account in database.
     */
    public function update(Request $request, $id)
    {
        if (auth()->user()->role === 'client') {
            return redirect('/OrderChocolate');
        }

        $cliente = Cliente::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email|unique:clientes,email,' . $cliente->id . '|unique:users,email,' . $cliente->email . ',email',
            'usuario' => 'required|string|max:80|unique:clientes,usuario,' . $cliente->id . '|unique:users,name,' . $cliente->usuario . ',name',
            'password' => 'nullable|string|min:6',
            'estado' => 'required|in:activo,inactivo',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'apellido.required' => 'El apellido es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.unique' => 'Este correo electrónico ya está registrado por otro usuario.',
            'usuario.required' => 'El nombre de usuario es obligatorio.',
            'usuario.unique' => 'Este nombre de usuario ya está registrado por otro usuario.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'estado.required' => 'El estado es obligatorio.',
        ]);

        // Find corresponding user in users table
        $user = User::where('email', $cliente->email)
                    ->orWhere('name', $cliente->usuario)
                    ->first();

        // Prepare Cliente update data
        $clienteData = [
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'usuario' => $request->usuario,
            'estado' => $request->estado,
        ];

        if ($request->filled('password')) {
            $clienteData['clave_hash'] = Hash::make($request->password);
        }

        $cliente->update($clienteData);

        // Update User account
        if ($user) {
            $userData = [
                'name' => $request->usuario,
                'email' => $request->email,
            ];

            if ($request->filled('password')) {
                $userData['password'] = Hash::make($request->password);
            }

            $user->update($userData);
        }

        return redirect('/Clients')->with('success', '¡El cliente y su cuenta de usuario fueron actualizados exitosamente!');
    }

    /**
     * Handle client order placement from portal.
     */
    public function placeOrder(Request $request)
    {
        $request->validate([
            'id_producto' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
        ], [
            'id_producto.required' => 'El producto es obligatorio.',
            'cantidad.required' => 'La cantidad de cajas es obligatoria.',
            'precio_unitario.required' => 'El precio del producto es obligatorio.',
        ]);

        // Identify active client record
        $user = auth()->user();
        $cliente = Cliente::where('email', $user->email)
                          ->orWhere('usuario', $user->name)
                          ->first();

        if (!$cliente) {
            return redirect()->back()->withErrors(['error' => 'No se encontró un perfil de cliente asociado a su cuenta de usuario.']);
        }

        $total = floatval($request->cantidad) * floatval($request->precio_unitario);

        // Register the sales order as pending
        $pedido = Pedido::create([
            'id_cliente' => $cliente->id,
            'fecha' => date('Y-m-d'),
            'tipo' => 'venta',
            'total' => $total,
            'estado' => 'pendiente'
        ]);

        return redirect()->back()->with('success', "¡Su pedido de chocolate #{$pedido->id} por {$request->cantidad} cajas ha sido registrado exitosamente!");
    }
}
