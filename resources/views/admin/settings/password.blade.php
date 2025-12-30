@extends('admin.layouts.app')

@section('title', 'Alterar Password')
@section('page-title', 'Alterar Password')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-white">Alterar Password</h1>
        <p class="mt-1 text-sm text-gray-500">Atualizar a password da sua conta</p>
    </div>

    <div class="bg-admin-card border border-admin-border rounded-xl overflow-hidden">
        <form action="{{ route('admin.settings.password.update') }}" method="POST" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <!-- Current Password -->
            <div>
                <label for="current_password" class="block text-sm font-medium text-gray-300 mb-2">Password Atual</label>
                <input type="password" name="current_password" id="current_password" required
                       class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white placeholder-gray-500 focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none">
                @error('current_password')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- New Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Nova Password</label>
                <input type="password" name="password" id="password" required
                       class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white placeholder-gray-500 focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none">
                <p class="mt-1 text-xs text-gray-500">Mínimo 8 caracteres</p>
                @error('password')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">Confirmar Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                       class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white placeholder-gray-500 focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none">
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end pt-6 border-t border-admin-border">
                <button type="submit" 
                        class="px-6 py-2 bg-accent hover:bg-accent-hover text-white text-sm font-medium rounded-lg transition-colors">
                    Atualizar Password
                </button>
            </div>
        </form>
    </div>

    <!-- Security Info -->
    <div class="mt-6 bg-admin-card border border-admin-border rounded-xl p-6">
        <div class="flex items-start space-x-3">
            <svg class="w-5 h-5 text-yellow-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
            <div>
                <h3 class="text-sm font-medium text-white">Dicas de Segurança</h3>
                <ul class="mt-2 text-sm text-gray-500 space-y-1">
                    <li>• Use uma combinação de letras, números e símbolos</li>
                    <li>• Evite usar informações pessoais como datas ou nomes</li>
                    <li>• Não reutilize passwords de outras contas</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
