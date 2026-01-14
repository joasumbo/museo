<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Exibe o formulário de login
     */
    public function showLogin()
    {
        if (auth()->check() && in_array(auth()->user()->role, ['admin', 'superadmin'])) {
            return redirect()->route('admin.dashboard');
        }
        
        return view('admin.auth.login');
    }

    /**
     * Processa o login
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ], [
            'email.required' => 'O email é obrigatório.',
            'email.email' => 'Digite um email válido.',
            'password.required' => 'A senha é obrigatória.',
        ]);

        // Rate limiting - máximo 5 tentativas por minuto
        $key = 'login-attempts:' . $request->ip();
        
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            
            throw ValidationException::withMessages([
                'email' => "Muitas tentativas de login. Tente novamente em {$seconds} segundos.",
            ]);
        }

        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();

            // Verifica se é admin/superadmin e está ativo
            if (!in_array($user->role, ['admin', 'superadmin'])) {
                Auth::logout();
                RateLimiter::hit($key, 60);
                
                return back()->withErrors([
                    'email' => 'Você não tem permissão para acessar o painel administrativo.',
                ])->withInput($request->only('email'));
            }

            if (!$user->is_active) {
                Auth::logout();
                RateLimiter::hit($key, 60);
                
                return back()->withErrors([
                    'email' => 'Sua conta está inativa. Entre em contato com o administrador.',
                ])->withInput($request->only('email'));
            }

            // Login bem-sucedido - limpa rate limiting
            RateLimiter::clear($key);
            
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'))
                ->with('success', 'Bem-vindo de volta, ' . $user->name . '!');
        }

        // Login falhou - incrementa tentativas
        RateLimiter::hit($key, 60);

        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ])->withInput($request->only('email'));
    }

    /**
     * Faz logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('admin.login')
            ->with('success', 'Você saiu com sucesso.');
    }
}
