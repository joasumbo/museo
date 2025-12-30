@extends('admin.layouts.app')

@section('title', 'Visitas')
@section('page-title', 'Visitas')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-semibold text-white">Visitas Agendadas</h1>
            <p class="mt-1 text-sm text-gray-500">Gestão de marcações de visitas ao museu</p>
        </div>
    </div>

    <!-- Status Tabs -->
    <div class="border-b border-admin-border">
        <nav class="-mb-px flex space-x-6">
            <a href="{{ route('admin.visits.index') }}" 
               class="py-3 px-1 border-b-2 font-medium text-sm transition-colors
               {{ !request('status') ? 'border-accent text-accent' : 'border-transparent text-gray-500 hover:text-gray-300' }}">
                Todas
                <span class="ml-1 px-1.5 py-0.5 text-xs rounded-full bg-admin-bg">{{ $stats['total'] }}</span>
            </a>
            <a href="{{ route('admin.visits.index', ['status' => 'pending']) }}" 
               class="py-3 px-1 border-b-2 font-medium text-sm transition-colors
               {{ request('status') === 'pending' ? 'border-accent text-accent' : 'border-transparent text-gray-500 hover:text-gray-300' }}">
                Pendentes
                @if($stats['pending'] > 0)
                    <span class="ml-1 px-1.5 py-0.5 text-xs rounded-full bg-yellow-500/20 text-yellow-400">{{ $stats['pending'] }}</span>
                @endif
            </a>
            <a href="{{ route('admin.visits.index', ['status' => 'confirmed']) }}" 
               class="py-3 px-1 border-b-2 font-medium text-sm transition-colors
               {{ request('status') === 'confirmed' ? 'border-accent text-accent' : 'border-transparent text-gray-500 hover:text-gray-300' }}">
                Confirmadas
                <span class="ml-1 px-1.5 py-0.5 text-xs rounded-full bg-green-500/20 text-green-400">{{ $stats['confirmed'] }}</span>
            </a>
            <a href="{{ route('admin.visits.index', ['status' => 'completed']) }}" 
               class="py-3 px-1 border-b-2 font-medium text-sm transition-colors
               {{ request('status') === 'completed' ? 'border-accent text-accent' : 'border-transparent text-gray-500 hover:text-gray-300' }}">
                Realizadas
            </a>
            <a href="{{ route('admin.visits.index', ['status' => 'cancelled']) }}" 
               class="py-3 px-1 border-b-2 font-medium text-sm transition-colors
               {{ request('status') === 'cancelled' ? 'border-accent text-accent' : 'border-transparent text-gray-500 hover:text-gray-300' }}">
                Canceladas
            </a>
        </nav>
    </div>

    <!-- Visits Table -->
    <div class="bg-admin-card border border-admin-border rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-admin-border">
                <thead class="bg-admin-bg">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Visitante</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data/Hora</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pessoas</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-admin-border">
                    @forelse($visits as $visit)
                        <tr class="hover:bg-admin-hover transition-colors">
                            <td class="px-6 py-4">
                                <div>
                                    <p class="text-sm font-medium text-white">{{ $visit->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $visit->email }}</p>
                                    @if($visit->organization)
                                        <p class="text-xs text-accent">{{ $visit->organization }}</p>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                    @if($visit->visit_type === 'school') bg-blue-500/10 text-blue-400
                                    @elseif($visit->visit_type === 'group') bg-purple-500/10 text-purple-400
                                    @else bg-gray-500/10 text-gray-400
                                    @endif">
                                    @if($visit->visit_type === 'school') Escolar
                                    @elseif($visit->visit_type === 'group') Grupo
                                    @else Individual
                                    @endif
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div>
                                    <p class="text-sm text-white">{{ $visit->visit_date->format('d/m/Y') }}</p>
                                    <p class="text-xs text-gray-500">{{ $visit->visit_time->format('H:i') }}</p>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-gray-300">{{ $visit->number_of_people }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                    @if($visit->status === 'pending') bg-yellow-500/10 text-yellow-400
                                    @elseif($visit->status === 'confirmed') bg-green-500/10 text-green-400
                                    @elseif($visit->status === 'completed') bg-blue-500/10 text-blue-400
                                    @else bg-red-500/10 text-red-400
                                    @endif">
                                    @if($visit->status === 'pending') Pendente
                                    @elseif($visit->status === 'confirmed') Confirmada
                                    @elseif($visit->status === 'completed') Realizada
                                    @else Cancelada
                                    @endif
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('admin.visits.show', $visit) }}" 
                                       class="px-3 py-1.5 text-xs font-medium text-gray-300 hover:text-white bg-admin-bg rounded-lg hover:bg-admin-border transition-colors">
                                        Ver
                                    </a>
                                    @if($visit->status === 'pending')
                                        <form action="{{ route('admin.visits.confirm', $visit) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="px-3 py-1.5 text-xs font-medium text-green-400 bg-green-500/10 rounded-lg hover:bg-green-500/20 transition-colors">
                                                Confirmar
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                <p class="mt-4 text-sm text-gray-500">Nenhuma visita encontrada</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($visits->hasPages())
            <div class="px-6 py-4 border-t border-admin-border">
                {{ $visits->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
