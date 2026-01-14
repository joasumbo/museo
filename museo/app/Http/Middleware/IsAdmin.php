<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('admin.login')->with('error', 'Por favor, faça login para acessar o painel.');
        }

        $user = auth()->user();

        if (!in_array($user->role, ['admin', 'superadmin']) || !$user->is_active) {
            auth()->logout();
            return redirect()->route('admin.login')->with('error', 'Você não tem permissão para acessar esta área.');
        }

        return $next($request);
    }
}
