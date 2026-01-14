@extends('admin.layouts.app')

@section('title', 'Editar Utilizador')
@section('page-title', 'Editar Utilizador')

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
        <div class="px-6 py-4 border-b border-admin-border flex items-center justify-between">
            <div>
                <h2 class="text-lg font-medium text-white">Editar Utilizador</h2>
                <p class="text-sm text-gray-500">{{ $user->email }}</p>
            </div>
            @if($user->id !== auth()->id())
                <form action="{{ route('admin.settings.users.destroy', $user) }}" method="POST" 
                      onsubmit="return confirm('Tem certeza que deseja eliminar este utilizador?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-3 py-1.5 text-xs font-medium text-red-400 hover:text-red-300 bg-red-500/10 rounded-lg hover:bg-red-500/20 transition-colors">
                        Eliminar
                    </button>
                </form>
            @endif
        </div>

        <form action="{{ route('admin.settings.users.update', $user) }}" method="POST" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Nome *</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required
                       class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none">
                @error('name')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email *</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required
                       class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none">
                @error('email')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Role -->
            <div>
                <label for="role" class="block text-sm font-medium text-gray-300 mb-2">Função *</label>
                <select name="role" id="role" required
                        class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none"
                        @if($user->id === auth()->id()) disabled @endif>
                    <option value="viewer" {{ old('role', $user->role) === 'viewer' ? 'selected' : '' }}>Visualizador</option>
                    <option value="editor" {{ old('role', $user->role) === 'editor' ? 'selected' : '' }}>Editor</option>
                    <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Administrador</option>
                </select>
                @if($user->id === auth()->id())
                    <input type="hidden" name="role" value="{{ $user->role }}">
                    <p class="mt-1 text-xs text-gray-500">Não pode alterar a sua própria função.</p>
                @endif
            </div>

            <!-- Password -->
            <div class="border-t border-admin-border pt-6">
                <h3 class="text-sm font-medium text-white mb-4">Alterar Password</h3>
                <p class="text-xs text-gray-500 mb-4">Deixe em branco para manter a password atual.</p>
                
                <div class="space-y-4">
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Nova Password</label>
                        <input type="password" name="password" id="password"
                               class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none">
                        <p class="mt-1 text-xs text-gray-500">Mínimo 8 caracteres</p>
                        @error('password')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">Confirmar Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                               class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none">
                    </div>
                </div>
            </div>

            <!-- Active -->
            @if($user->id !== auth()->id())
                <div>
                    <label class="flex items-center space-x-3 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $user->is_active) ? 'checked' : '' }}
                               class="h-4 w-4 rounded border-admin-border bg-admin-bg text-accent focus:ring-accent/20">
                        <span class="text-sm text-gray-300">Conta Ativa</span>
                    </label>
                </div>
            @endif

            <!-- Actions -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-admin-border">
                <a href="{{ route('admin.settings.users') }}" 
                   class="px-4 py-2 text-sm font-medium text-gray-400 hover:text-white transition-colors">
                    Cancelar
                </a>
                <button type="submit" 
                        class="px-6 py-2 bg-accent hover:bg-accent-hover text-white text-sm font-medium rounded-lg transition-colors">
                    Guardar Alterações
                </button>
            </div>
        </form>
    </div>

    <!-- User Info -->
    <div class="mt-6 bg-admin-card border border-admin-border rounded-xl p-6">
        <h3 class="text-sm font-medium text-white mb-4">Informações</h3>
        <dl class="grid grid-cols-2 gap-4 text-sm">
            <div>
                <dt class="text-gray-500">Criado em</dt>
                <dd class="text-gray-300">{{ $user->created_at->format('d/m/Y H:i') }}</dd>
            </div>
            <div>
                <dt class="text-gray-500">Último login</dt>
                <dd class="text-gray-300">{{ $user->last_login_at ? $user->last_login_at->format('d/m/Y H:i') : 'Nunca' }}</dd>
            </div>
        </dl>
    </div>
</div>
@endsection
