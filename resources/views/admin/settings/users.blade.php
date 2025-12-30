@extends('admin.layouts.app')

@section('title', 'Utilizadores')
@section('page-title', 'Utilizadores')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-semibold text-white">Utilizadores</h1>
            <p class="mt-1 text-sm text-gray-500">Gerir contas de administradores e editores</p>
        </div>
        <a href="{{ route('admin.settings.users.create') }}" 
           class="inline-flex items-center justify-center px-4 py-2 bg-accent hover:bg-accent-hover text-white text-sm font-medium rounded-lg transition-colors">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Novo Utilizador
        </a>
    </div>

    <!-- Users Table -->
    <div class="bg-admin-card border border-admin-border rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-admin-border">
                <thead class="bg-admin-bg">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Utilizador</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Função</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Último Login</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-admin-border">
                    @foreach($users as $user)
                        <tr class="hover:bg-admin-hover transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    @if($user->avatar)
                                        <img class="h-10 w-10 rounded-full object-cover" src="{{ asset('storage/' . $user->avatar) }}" alt="">
                                    @else
                                        <div class="h-10 w-10 rounded-full bg-accent/20 flex items-center justify-center text-accent font-medium">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                    @endif
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-white">{{ $user->name }}</p>
                                        <p class="text-sm text-gray-500">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                    @if($user->role === 'admin') bg-purple-500/10 text-purple-400
                                    @elseif($user->role === 'editor') bg-blue-500/10 text-blue-400
                                    @else bg-gray-500/10 text-gray-400
                                    @endif">
                                    @if($user->role === 'admin') Administrador
                                    @elseif($user->role === 'editor') Editor
                                    @else Visualizador
                                    @endif
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-400">
                                {{ $user->last_login_at ? $user->last_login_at->diffForHumans() : 'Nunca' }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                    {{ $user->is_active ? 'bg-green-500/10 text-green-400' : 'bg-red-500/10 text-red-400' }}">
                                    {{ $user->is_active ? 'Ativo' : 'Inativo' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('admin.settings.users.edit', $user) }}" 
                                   class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-gray-300 hover:text-white bg-admin-bg rounded-lg hover:bg-admin-border transition-colors">
                                    Editar
                                </a>
                                @if($user->id !== auth()->id())
                                    <form action="{{ route('admin.settings.users.destroy', $user) }}" method="POST" class="inline" 
                                          onsubmit="return confirm('Tem certeza que deseja eliminar este utilizador?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-red-400 hover:text-red-300 bg-admin-bg rounded-lg hover:bg-red-500/10 transition-colors">
                                            Eliminar
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Roles Info -->
    <div class="bg-admin-card border border-admin-border rounded-xl p-6">
        <h3 class="text-sm font-medium text-white mb-4">Níveis de Acesso</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-admin-bg rounded-lg p-4">
                <div class="flex items-center space-x-2 mb-2">
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-purple-500/10 text-purple-400">Administrador</span>
                </div>
                <p class="text-xs text-gray-500">Acesso total ao painel. Pode gerir utilizadores, configurações e todo o conteúdo.</p>
            </div>
            <div class="bg-admin-bg rounded-lg p-4">
                <div class="flex items-center space-x-2 mb-2">
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-500/10 text-blue-400">Editor</span>
                </div>
                <p class="text-xs text-gray-500">Pode gerir eventos, horários, contactos e visitas. Sem acesso a configurações do site.</p>
            </div>
            <div class="bg-admin-bg rounded-lg p-4">
                <div class="flex items-center space-x-2 mb-2">
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gray-500/10 text-gray-400">Visualizador</span>
                </div>
                <p class="text-xs text-gray-500">Apenas pode visualizar informações. Sem permissão para editar ou eliminar.</p>
            </div>
        </div>
    </div>
</div>
@endsection
