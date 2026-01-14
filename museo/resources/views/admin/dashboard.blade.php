@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Welcome & Date -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-white">Olá, {{ auth()->user()->name }}!</h1>
            <p class="mt-1 text-sm text-gray-500">{{ now()->translatedFormat('l, d \\d\\e F \\d\\e Y') }}</p>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Eventos Ativos -->
        <div class="bg-admin-card border border-admin-border rounded-xl p-5 hover:border-admin-hover transition-colors">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Eventos Ativos</p>
                    <p class="mt-1 text-2xl font-semibold text-white">{{ $stats['active_events'] }}</p>
                </div>
                <div class="p-3 rounded-lg bg-blue-500/10">
                    <svg class="h-6 w-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-3">
                <a href="{{ route('admin.events.index') }}" class="text-xs text-gray-500 hover:text-accent">Ver todos →</a>
            </div>
        </div>

        <!-- Visitas Pendentes -->
        <div class="bg-admin-card border border-admin-border rounded-xl p-5 hover:border-admin-hover transition-colors">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Visitas Pendentes</p>
                    <p class="mt-1 text-2xl font-semibold text-white">{{ $stats['pending_visits'] }}</p>
                </div>
                <div class="p-3 rounded-lg bg-yellow-500/10">
                    <svg class="h-6 w-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-3">
                <a href="{{ route('admin.visits.index') }}?status=pending" class="text-xs text-gray-500 hover:text-accent">Gerir visitas →</a>
            </div>
        </div>

        <!-- Contactos Não Lidos -->
        <div class="bg-admin-card border border-admin-border rounded-xl p-5 hover:border-admin-hover transition-colors">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Contactos Não Lidos</p>
                    <p class="mt-1 text-2xl font-semibold text-white">{{ $stats['unread_contacts'] }}</p>
                </div>
                <div class="p-3 rounded-lg bg-red-500/10">
                    <svg class="h-6 w-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-3">
                <a href="{{ route('admin.contacts.index') }}?status=unread" class="text-xs text-gray-500 hover:text-accent">Ver mensagens →</a>
            </div>
        </div>

        <!-- Visualizações do Mês -->
        <div class="bg-admin-card border border-admin-border rounded-xl p-5 hover:border-admin-hover transition-colors">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Visualizações (Mês)</p>
                    <p class="mt-1 text-2xl font-semibold text-white">{{ number_format($stats['month_views']) }}</p>
                </div>
                <div class="p-3 rounded-lg bg-green-500/10">
                    <svg class="h-6 w-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-3">
                <span class="text-xs text-gray-500">{{ $stats['today_views'] }} hoje</span>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
        <!-- Views Chart -->
        <div class="bg-admin-card border border-admin-border rounded-xl p-6">
            <h3 class="text-sm font-medium text-gray-400 mb-4">Visualizações (últimos 30 dias)</h3>
            <div class="h-64">
                <canvas id="viewsChart"></canvas>
            </div>
        </div>

        <!-- Visits by Type -->
        <div class="bg-admin-card border border-admin-border rounded-xl p-6">
            <h3 class="text-sm font-medium text-gray-400 mb-4">Visitas por Tipo (este mês)</h3>
            <div class="h-64 flex items-center justify-center">
                <canvas id="visitsTypeChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Two Column Layout -->
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
        <!-- Today's Visits -->
        <div class="bg-admin-card border border-admin-border rounded-xl">
            <div class="px-6 py-4 border-b border-admin-border flex items-center justify-between">
                <h3 class="text-sm font-medium text-white">Visitas de Hoje</h3>
                <span class="text-xs text-gray-500">{{ $todayVisits->count() }} agendadas</span>
            </div>
            <div class="divide-y divide-admin-border">
                @forelse($todayVisits as $visit)
                    <div class="px-6 py-4 flex items-center justify-between hover:bg-admin-hover transition-colors">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <div class="h-10 w-10 rounded-full bg-accent/10 flex items-center justify-center">
                                    <span class="text-accent font-medium">{{ substr($visit->name, 0, 1) }}</span>
                                </div>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-white">{{ $visit->name }}</p>
                                <p class="text-xs text-gray-500">{{ $visit->group_size }} pessoas • {{ $visit->preferred_time->format('H:i') }}</p>
                            </div>
                        </div>
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium
                            @if($visit->status === 'confirmed') bg-green-500/10 text-green-400
                            @else bg-yellow-500/10 text-yellow-400 @endif">
                            {{ $visit->getStatusLabel() }}
                        </span>
                    </div>
                @empty
                    <div class="px-6 py-8 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <p class="mt-2 text-sm text-gray-500">Nenhuma visita agendada para hoje</p>
                    </div>
                @endforelse
            </div>
            @if($todayVisits->count() > 0)
                <div class="px-6 py-3 border-t border-admin-border">
                    <a href="{{ route('admin.visits.index') }}" class="text-xs text-accent hover:text-accent-hover">Ver todas as visitas →</a>
                </div>
            @endif
        </div>

        <!-- Recent Contacts -->
        <div class="bg-admin-card border border-admin-border rounded-xl">
            <div class="px-6 py-4 border-b border-admin-border flex items-center justify-between">
                <h3 class="text-sm font-medium text-white">Contactos Recentes</h3>
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-red-500/10 text-red-400">
                    {{ $stats['unread_contacts'] }} não lidos
                </span>
            </div>
            <div class="divide-y divide-admin-border">
                @forelse($recentContacts as $contact)
                    <a href="{{ route('admin.contacts.show', $contact) }}" class="block px-6 py-4 hover:bg-admin-hover transition-colors">
                        <div class="flex items-start justify-between">
                            <div class="min-w-0 flex-1">
                                <p class="text-sm font-medium text-white truncate">{{ $contact->name }}</p>
                                <p class="text-xs text-gray-500 truncate">{{ $contact->subject }}</p>
                                <p class="mt-1 text-xs text-gray-600 line-clamp-1">{{ Str::limit($contact->message, 80) }}</p>
                            </div>
                            <span class="ml-4 flex-shrink-0 text-xs text-gray-600">
                                {{ $contact->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </a>
                @empty
                    <div class="px-6 py-8 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <p class="mt-2 text-sm text-gray-500">Nenhum contacto por ler</p>
                    </div>
                @endforelse
            </div>
            @if($recentContacts->count() > 0)
                <div class="px-6 py-3 border-t border-admin-border">
                    <a href="{{ route('admin.contacts.index') }}" class="text-xs text-accent hover:text-accent-hover">Ver todos os contactos →</a>
                </div>
            @endif
        </div>
    </div>

    <!-- Upcoming Visits & Active Events -->
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
        <!-- Upcoming Visits -->
        <div class="bg-admin-card border border-admin-border rounded-xl">
            <div class="px-6 py-4 border-b border-admin-border">
                <h3 class="text-sm font-medium text-white">Próximas Visitas (7 dias)</h3>
            </div>
            <div class="divide-y divide-admin-border max-h-80 overflow-y-auto">
                @forelse($upcomingVisits as $visit)
                    <div class="px-6 py-3 flex items-center justify-between hover:bg-admin-hover transition-colors">
                        <div>
                            <p class="text-sm text-white">{{ $visit->name }}</p>
                            <p class="text-xs text-gray-500">
                                {{ $visit->visit_date->format('d/m') }} às {{ $visit->preferred_time->format('H:i') }} • 
                                {{ $visit->group_size }} pessoas
                            </p>
                        </div>
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium
                            @if($visit->status === 'confirmed') bg-green-500/10 text-green-400
                            @else bg-yellow-500/10 text-yellow-400 @endif">
                            {{ $visit->getStatusLabel() }}
                        </span>
                    </div>
                @empty
                    <div class="px-6 py-8 text-center">
                        <p class="text-sm text-gray-500">Nenhuma visita nos próximos 7 dias</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Active Events -->
        <div class="bg-admin-card border border-admin-border rounded-xl">
            <div class="px-6 py-4 border-b border-admin-border flex items-center justify-between">
                <h3 class="text-sm font-medium text-white">Eventos Ativos</h3>
                <a href="{{ route('admin.events.create') }}" class="text-xs text-accent hover:text-accent-hover">+ Novo evento</a>
            </div>
            <div class="divide-y divide-admin-border max-h-80 overflow-y-auto">
                @forelse($activeEvents as $event)
                    <a href="{{ route('admin.events.edit', $event) }}" class="block px-6 py-3 hover:bg-admin-hover transition-colors">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-white">{{ $event->title }}</p>
                                <p class="text-xs text-gray-500">
                                    {{ $event->getFormattedDateRange() }} • {{ $event->getTypeLabel() }}
                                </p>
                            </div>
                            @if($event->is_featured)
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-accent/10 text-accent">
                                    Destaque
                                </span>
                            @endif
                        </div>
                    </a>
                @empty
                    <div class="px-6 py-8 text-center">
                        <p class="text-sm text-gray-500">Nenhum evento ativo</p>
                        <a href="{{ route('admin.events.create') }}" class="mt-2 inline-block text-xs text-accent hover:text-accent-hover">
                            Criar primeiro evento →
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Views Chart
    const viewsCtx = document.getElementById('viewsChart').getContext('2d');
    new Chart(viewsCtx, {
        type: 'line',
        data: {
            labels: @json($viewsData['labels']),
            datasets: [{
                label: 'Visualizações',
                data: @json($viewsData['data']),
                borderColor: '#6366f1',
                backgroundColor: 'rgba(99, 102, 241, 0.1)',
                fill: true,
                tension: 0.4,
                pointRadius: 0,
                pointHoverRadius: 4,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                x: {
                    grid: { color: '#262626' },
                    ticks: { color: '#6b7280', maxTicksLimit: 7 }
                },
                y: {
                    grid: { color: '#262626' },
                    ticks: { color: '#6b7280' },
                    beginAtZero: true
                }
            }
        }
    });

    // Visits Type Chart
    const visitsCtx = document.getElementById('visitsTypeChart').getContext('2d');
    new Chart(visitsCtx, {
        type: 'doughnut',
        data: {
            labels: @json($visitsTypeData['labels']),
            datasets: [{
                data: @json($visitsTypeData['data']),
                backgroundColor: ['#6366f1', '#10b981', '#f59e0b', '#ef4444'],
                borderWidth: 0,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { color: '#9ca3af', padding: 20 }
                }
            }
        }
    });
</script>
@endpush
@endsection
