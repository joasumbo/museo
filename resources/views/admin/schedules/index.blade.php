@extends('admin.layouts.app')

@section('title', 'Horários')
@section('page-title', 'Horários')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-semibold text-white">Horários de Funcionamento</h1>
            <p class="mt-1 text-sm text-gray-500">Configurar horários por estação do ano</p>
        </div>
    </div>

    <!-- Season Tabs -->
    <div x-data="{ season: '{{ request('season', $currentSeason) }}' }">
        <div class="border-b border-admin-border">
            <nav class="-mb-px flex space-x-8">
                <a href="{{ route('admin.schedules.index', ['season' => 'summer']) }}"
                   class="py-3 px-1 border-b-2 font-medium text-sm transition-colors
                   {{ request('season', $currentSeason) === 'summer' ? 'border-accent text-accent' : 'border-transparent text-gray-500 hover:text-gray-300 hover:border-gray-600' }}">
                    <svg class="inline-block w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    Verão (Abril - Setembro)
                </a>
                <a href="{{ route('admin.schedules.index', ['season' => 'winter']) }}"
                   class="py-3 px-1 border-b-2 font-medium text-sm transition-colors
                   {{ request('season', $currentSeason) === 'winter' ? 'border-accent text-accent' : 'border-transparent text-gray-500 hover:text-gray-300 hover:border-gray-600' }}">
                    <svg class="inline-block w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                    </svg>
                    Inverno (Outubro - Março)
                </a>
            </nav>
        </div>

        <!-- Schedules Table -->
        <div class="mt-6 bg-admin-card border border-admin-border rounded-xl overflow-hidden">
            <form action="{{ route('admin.schedules.batch') }}" method="POST">
                @csrf
                @method('PATCH')
                <input type="hidden" name="season" value="{{ request('season', $currentSeason) }}">

                <table class="min-w-full divide-y divide-admin-border">
                    <thead class="bg-admin-bg">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dia</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Horário Manhã</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Horário Tarde</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-admin-border">
                        @foreach($schedules as $schedule)
                            <tr class="hover:bg-admin-hover transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <input type="hidden" name="schedules[{{ $schedule->id }}][id]" value="{{ $schedule->id }}">
                                        <div class="w-8 h-8 rounded-full bg-admin-bg flex items-center justify-center text-accent text-xs font-medium mr-3">
                                            {{ substr($schedule->getDayLabel(), 0, 1) }}
                                        </div>
                                        <span class="text-sm font-medium text-white">{{ $schedule->getDayLabel() }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <input type="time" name="schedules[{{ $schedule->id }}][morning_open]" 
                                               value="{{ $schedule->morning_open ? substr($schedule->morning_open, 0, 5) : '' }}"
                                               {{ !$schedule->is_open ? 'disabled' : '' }}
                                               class="rounded-lg bg-admin-bg border border-admin-border px-3 py-1.5 text-sm text-white focus:border-accent focus:outline-none disabled:opacity-50 disabled:cursor-not-allowed">
                                        <span class="text-gray-600">-</span>
                                        <input type="time" name="schedules[{{ $schedule->id }}][morning_close]" 
                                               value="{{ $schedule->morning_close ? substr($schedule->morning_close, 0, 5) : '' }}"
                                               {{ !$schedule->is_open ? 'disabled' : '' }}
                                               class="rounded-lg bg-admin-bg border border-admin-border px-3 py-1.5 text-sm text-white focus:border-accent focus:outline-none disabled:opacity-50 disabled:cursor-not-allowed">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <input type="time" name="schedules[{{ $schedule->id }}][afternoon_open]" 
                                               value="{{ $schedule->afternoon_open ? substr($schedule->afternoon_open, 0, 5) : '' }}"
                                               {{ !$schedule->is_open ? 'disabled' : '' }}
                                               class="rounded-lg bg-admin-bg border border-admin-border px-3 py-1.5 text-sm text-white focus:border-accent focus:outline-none disabled:opacity-50 disabled:cursor-not-allowed">
                                        <span class="text-gray-600">-</span>
                                        <input type="time" name="schedules[{{ $schedule->id }}][afternoon_close]" 
                                               value="{{ $schedule->afternoon_close ? substr($schedule->afternoon_close, 0, 5) : '' }}"
                                               {{ !$schedule->is_open ? 'disabled' : '' }}
                                               class="rounded-lg bg-admin-bg border border-admin-border px-3 py-1.5 text-sm text-white focus:border-accent focus:outline-none disabled:opacity-50 disabled:cursor-not-allowed">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="schedules[{{ $schedule->id }}][is_open]" value="1" 
                                               {{ $schedule->is_open ? 'checked' : '' }}
                                               class="sr-only peer">
                                        <div class="w-9 h-5 bg-gray-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-accent"></div>
                                        <span class="ml-3 text-sm text-gray-400">{{ $schedule->is_open ? 'Aberto' : 'Fechado' }}</span>
                                    </label>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="px-6 py-4 bg-admin-bg border-t border-admin-border flex justify-end">
                    <button type="submit" 
                            class="px-6 py-2 bg-accent hover:bg-accent-hover text-white text-sm font-medium rounded-lg transition-colors">
                        Guardar Alterações
                    </button>
                </div>
            </form>
        </div>

        <!-- Info Card -->
        <div class="mt-6 bg-admin-card border border-admin-border rounded-xl p-6">
            <div class="flex items-start space-x-3">
                <svg class="w-5 h-5 text-accent mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div>
                    <h3 class="text-sm font-medium text-white">Nota sobre horários</h3>
                    <p class="mt-1 text-sm text-gray-500">
                        Os horários são exibidos automaticamente no site conforme a estação atual. 
                        O horário de <strong class="text-gray-400">Verão</strong> aplica-se de Abril a Setembro, 
                        e o de <strong class="text-gray-400">Inverno</strong> de Outubro a Março.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
