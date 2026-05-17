<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleAuthorization
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect('/');
        }

        $user = auth()->user();

        // 1. Admins have absolute authorization to all routes
        if ($user->role === 'admin') {
            return $next($request);
        }

        // 2. Extract first path segment for routing checks
        $path = trim($request->getPathInfo(), '/');
        $segments = explode('/', $path);
        $firstSegment = strtolower($segments[0] ?? '');

        // Logout is universally permitted
        if ($firstSegment === 'logout') {
            return $next($request);
        }

        // 3. Employees can only access humanresources, profile, and locale switcher
        if ($user->role === 'employee') {
            $allowed = ['humanresources', 'profile', 'locale'];
            if (in_array($firstSegment, $allowed)) {
                return $next($request);
            }
            return redirect('/humanresources')->with('error', __('Acceso no autorizado a este módulo.'));
        }

        // 4. Clients can only access orderchocolate, profile, and locale switcher
        if ($user->role === 'client') {
            $allowed = ['orderchocolate', 'profile', 'locale'];
            if (in_array($firstSegment, $allowed)) {
                return $next($request);
            }
            return redirect('/OrderChocolate')->with('error', __('Acceso no autorizado a este módulo.'));
        }

        return $next($request);
    }
}
