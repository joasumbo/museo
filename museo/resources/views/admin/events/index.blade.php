@extends('admin.layouts.app')

@section('title', 'Eventos')
@section('page-title', 'Eventos')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-semibold text-white">Eventos</h1>
            <p class="mt-1 text-sm text-gray-500">Gerir eventos, exposições e atividades do museu</p>
        </div>
        
        <div class="flex items-center gap-3">
            <!-- Toggle View -->
            <div class="flex items-center bg-admin-card border border-admin-border rounded-lg p-1">
                <button 
                   class="flex items-center gap-2 px-4 py-2 text-sm text-white bg-accent rounded transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                    </svg>
                    <span>Lista</span>
                </button>
                <a href="{{ route('admin.events.calendar') }}" 
                   class="flex items-center gap-2 px-4 py-2 text-sm text-gray-400 hover:text-white rounded transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span>Calendário</span>
                </a>
            </div>

            <!-- Create Button -->
            <a href="{{ route('admin.events.create') }}" 
               class="inline-flex items-center justify-center px-4 py-2 bg-accent hover:bg-accent-hover text-white text-sm font-medium rounded-lg transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Novo Evento
            </a>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-admin-card border border-admin-border rounded-xl p-4">
        <form method="GET" class="flex flex-col sm:flex-row gap-4">
            <div class="flex-1">
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="Pesquisar eventos..."
                       class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2 text-white placeholder-gray-500 focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none">
            </div>
            <select name="type" class="rounded-lg bg-admin-bg border border-admin-border px-4 py-2 text-gray-300 focus:border-accent focus:outline-none">
                <option value="">Todos os tipos</option>
                <option value="exhibition" {{ request('type') === 'exhibition' ? 'selected' : '' }}>Exposição</option>
                <option value="workshop" {{ request('type') === 'workshop' ? 'selected' : '' }}>Workshop</option>
                <option value="conference" {{ request('type') === 'conference' ? 'selected' : '' }}>Conferência</option>
                <option value="guided_tour" {{ request('type') === 'guided_tour' ? 'selected' : '' }}>Visita Guiada</option>
                <option value="other" {{ request('type') === 'other' ? 'selected' : '' }}>Outro</option>
            </select>
            <select name="status" class="rounded-lg bg-admin-bg border border-admin-border px-4 py-2 text-gray-300 focus:border-accent focus:outline-none">
                <option value="">Todos os estados</option>
                <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Ativos</option>
                <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inativos</option>
            </select>
            <button type="submit" class="px-4 py-2 bg-admin-hover text-white rounded-lg hover:bg-admin-border transition-colors">
                Filtrar
            </button>
        </form>
    </div>

    <!-- Events Table -->
    <div class="bg-admin-card border border-admin-border rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-admin-border">
                <thead class="bg-admin-bg">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Evento</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-admin-border">
                    @forelse($events as $event)
                        <tr class="hover:bg-admin-hover transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    @if($event->image)
                                        <img class="h-10 w-10 rounded-lg object-cover" src="{{ asset('storage/' . $event->image) }}" alt="">
                                    @else
                                        <div class="h-10 w-10 rounded-lg bg-admin-bg flex items-center justify-center">
                                            <svg class="h-5 w-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    @endif
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-white">{{ $event->title }}</p>
                                        @if($event->is_featured)
                                            <span class="inline-flex items-center text-xs text-accent">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                                Destaque
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-admin-bg text-gray-300">
                                    {{ $event->getTypeLabel() }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-400">
                                {{ $event->getFormattedDateRange() }}
                            </td>
                            <td class="px-6 py-4">
                                <button onclick="toggleActive({{ $event->id }})" 
                                        id="status-{{ $event->id }}"
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium transition-colors
                                        {{ $event->is_active ? 'bg-green-500/10 text-green-400' : 'bg-gray-500/10 text-gray-400' }}">
                                    {{ $event->is_active ? 'Ativo' : 'Inativo' }}
                                </button>
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('admin.events.edit', $event) }}" 
                                   class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-gray-300 hover:text-white bg-admin-bg rounded-lg hover:bg-admin-border transition-colors">
                                    Editar
                                </a>
                                <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="inline" 
                                      onsubmit="return confirm('Tem certeza que deseja eliminar este evento?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-red-400 hover:text-red-300 bg-admin-bg rounded-lg hover:bg-red-500/10 transition-colors">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <p class="mt-4 text-sm text-gray-500">Nenhum evento encontrado</p>
                                <a href="{{ route('admin.events.create') }}" class="mt-2 inline-block text-sm text-accent hover:text-accent-hover">
                                    Criar primeiro evento →
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($events->hasPages())
            <div class="px-6 py-4 border-t border-admin-border">
                {{ $events->links() }}
            </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
function toggleActive(eventId) {
    fetch(`/admin/events/${eventId}/toggle-active`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const btn = document.getElementById(`status-${eventId}`);
            if (data.is_active) {
                btn.className = 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium transition-colors bg-green-500/10 text-green-400';
                btn.textContent = 'Ativo';
            } else {
                btn.className = 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium transition-colors bg-gray-500/10 text-gray-400';
                btn.textContent = 'Inativo';
            }
        }
    });
}
</script>
@endpush
@endsection
