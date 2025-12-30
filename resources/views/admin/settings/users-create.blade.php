@extends('admin.layouts.app')

@section('title', 'Novo Utilizador')
@section('page-title', 'Novo Utilizador')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('admin.settings.users') }}" class="inline-flex items-center text-sm text-gray-400 hover:text-white">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Voltar aos utilizadores
        </a>
    </div>

    <div class="bg-admin-card border border-admin-border rounded-xl overflow-hidden">
        <div class="px-6 py-4 border-b border-admin-border">
            <h2 class="text-lg font-medium text-white">Criar Novo Utilizador</h2>
            <p class="text-sm text-gray-500">Adicionar um novo administrador ou editor</p>
        </div>

        <form action="{{ route('admin.settings.users.store') }}" method="POST" class="p-6 space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Nome *</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                       class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white placeholder-gray-500 focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none">
                @error('name')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email *</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                       class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white placeholder-gray-500 focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none">
                @error('email')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Role -->
            <div>
                <label for="role" class="block text-sm font-medium text-gray-300 mb-2">Função *</label>
                <select name="role" id="role" required
                        class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none">
                    <option value="viewer" {{ old('role') === 'viewer' ? 'selected' : '' }}>Visualizador</option>
                    <option value="editor" {{ old('role') === 'editor' ? 'selected' : '' }}>Editor</option>
                    <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Administrador</option>
                </select>
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password *</label>
                <input type="password" name="password" id="password" required
                       class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none">
                <p class="mt-1 text-xs text-gray-500">Mínimo 8 caracteres</p>
                @error('password')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">Confirmar Password *</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                       class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none">
            </div>

            <!-- Active -->
            <div>
                <label class="flex items-center space-x-3 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                           class="h-4 w-4 rounded border-admin-border bg-admin-bg text-accent focus:ring-accent/20">
                    <span class="text-sm text-gray-300">Conta Ativa</span>
                </label>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-admin-border">
                <a href="{{ route('admin.settings.users') }}" 
                   class="px-4 py-2 text-sm font-medium text-gray-400 hover:text-white transition-colors">
                    Cancelar
                </a>
                <button type="submit" 
                        class="px-6 py-2 bg-accent hover:bg-accent-hover text-white text-sm font-medium rounded-lg transition-colors">
                    Criar Utilizador
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
