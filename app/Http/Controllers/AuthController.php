<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Helper to get login redirect route based on role.
     */
    private function getRedirectRoute()
    {
        if (Auth::user()->role === 'client') {
            return '/OrderChocolate';
        }
        if (Auth::user()->role === 'employee') {
            return '/humanresources';
        }
        return '/dashboard';
    }

    /**
     * Show the login form.
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect($this->getRedirectRoute());
        }
        return view('Auth');
    }

    /**
     * Handle a login request.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => 'El usuario o correo electrónico es obligatorio.',
            'password.required' => 'La contraseña es obligatoria.',
        ]);

        // Support both login by username (name) and email
        $loginField = filter_var($credentials['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $authAttempt = [
            $loginField => $credentials['username'],
            'password' => $credentials['password'],
        ];

        $remember = $request->has('remember');

        if (Auth::attempt($authAttempt, $remember)) {
            $request->session()->regenerate();

            return redirect($this->getRedirectRoute());
        }

        throw ValidationException::withMessages([
            'username' => ['Las credenciales proporcionadas no coinciden con nuestros registros.'],
        ]);
    }

    /**
     * Show the registration form.
     */
    public function showRegister()
    {
        if (Auth::check()) {
            return redirect($this->getRedirectRoute());
        }
        return view('Register');
    }

    /**
     * Handle a registration request.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:users,name',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ], [
            'name.required' => 'El nombre de usuario es obligatorio.',
            'name.unique' => 'Este nombre de usuario ya está registrado.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico no es válido.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin', // Default public register role is admin/employee
        ]);

        Auth::login($user);

        return redirect($this->getRedirectRoute());
    }

    /**
     * Show the user profile settings page.
     */
    public function showProfile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    /**
     * Update user profile settings.
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $oldEmail = $user->email;
        $oldUsername = $user->name;

        $request->validate([
            'name' => 'required|string|max:255|unique:users,name,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ], [
            'name.required' => 'El nombre de usuario es obligatorio.',
            'name.unique' => 'Este nombre de usuario ya está en uso.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.unique' => 'Este correo electrónico ya está en uso.',
            'password.min' => 'La nueva contraseña debe tener al menos 8 caracteres.',
            'profile_image.image' => 'El archivo debe ser una imagen válida.',
            'profile_image.mimes' => 'Formatos de imagen válidos: jpeg, png, jpg, gif, webp.',
        ]);

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            
            // Ensure destination folder exists in public directory
            $destinationPath = public_path('uploads/profiles');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            
            $file->move($destinationPath, $filename);
            $userData['profile_image'] = '/uploads/profiles/' . $filename;
        }

        $user->update($userData);

        // Sync with Cliente table if role is client
        if ($user->role === 'client') {
            $cliente = Cliente::where('email', $oldEmail)
                              ->orWhere('usuario', $oldUsername)
                              ->first();
            if ($cliente) {
                $clienteData = [
                    'email' => $request->email,
                    'usuario' => $request->name,
                ];
                if ($request->filled('password')) {
                    $clienteData['clave_hash'] = Hash::make($request->password);
                }
                $cliente->update($clienteData);
            }
        }

        return redirect()->back()->with('success', '¡Su perfil ha sido actualizado exitosamente!');
    }

    /**
     * Handle the logout request.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
