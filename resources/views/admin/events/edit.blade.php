@extends('admin.layouts.app')

@section('title', 'Editar Evento')
@section('page-title', 'Editar Evento')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('admin.events.index') }}" class="inline-flex items-center text-sm text-gray-400 hover:text-white">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Voltar aos eventos
        </a>
    </div>

    <div class="bg-admin-card border border-admin-border rounded-xl">
        <div class="px-6 py-4 border-b border-admin-border flex items-center justify-between">
            <div>
                <h2 class="text-lg font-medium text-white">Editar Evento</h2>
                <p class="text-sm text-gray-500">{{ $event->title }}</p>
            </div>
            <form action="{{ route('admin.events.destroy', $event) }}" method="POST" 
                  onsubmit="return confirm('Tem certeza que deseja eliminar este evento?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-3 py-1.5 text-xs font-medium text-red-400 hover:text-red-300 bg-red-500/10 rounded-lg hover:bg-red-500/20 transition-colors">
                    Eliminar
                </button>
            </form>
        </div>

        <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-300 mb-2">Título *</label>
                <input type="text" name="title" id="title" value="{{ old('title', $event->title) }}" required
                       class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white placeholder-gray-500 focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none">
            </div>

            <!-- Type & Location -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-300 mb-2">Tipo *</label>
                    <select name="type" id="type" required
                            class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none">
                        <option value="exhibition" {{ old('type', $event->type) === 'exhibition' ? 'selected' : '' }}>Exposição</option>
                        <option value="workshop" {{ old('type', $event->type) === 'workshop' ? 'selected' : '' }}>Workshop</option>
                        <option value="conference" {{ old('type', $event->type) === 'conference' ? 'selected' : '' }}>Conferência</option>
                        <option value="guided_tour" {{ old('type', $event->type) === 'guided_tour' ? 'selected' : '' }}>Visita Guiada</option>
                        <option value="other" {{ old('type', $event->type) === 'other' ? 'selected' : '' }}>Outro</option>
                    </select>
                </div>
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-300 mb-2">Local</label>
                    <input type="text" name="location" id="location" value="{{ old('location', $event->location) }}"
                           class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none">
                </div>
            </div>

            <!-- Dates -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="start_date" class="block text-sm font-medium text-gray-300 mb-2">Data de Início *</label>
                    <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $event->start_date->format('Y-m-d')) }}" required
                           class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none">
                </div>
                <div>
                    <label for="end_date" class="block text-sm font-medium text-gray-300 mb-2">Data de Fim</label>
                    <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $event->end_date?->format('Y-m-d')) }}"
                           class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none">
                </div>
            </div>

            <!-- Times -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="start_time" class="block text-sm font-medium text-gray-300 mb-2">Hora de Início</label>
                    <input type="time" name="start_time" id="start_time" value="{{ old('start_time', $event->start_time?->format('H:i')) }}"
                           class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none">
                </div>
                <div>
                    <label for="end_time" class="block text-sm font-medium text-gray-300 mb-2">Hora de Fim</label>
                    <input type="time" name="end_time" id="end_time" value="{{ old('end_time', $event->end_time?->format('H:i')) }}"
                           class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none">
                </div>
            </div>

            <!-- Short Description -->
            <div>
                <label for="short_description" class="block text-sm font-medium text-gray-300 mb-2">Descrição Curta</label>
                <input type="text" name="short_description" id="short_description" value="{{ old('short_description', $event->short_description) }}" maxlength="500"
                       class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none">
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-300 mb-2">Descrição Completa *</label>
                <textarea name="description" id="description" rows="6" required
                          class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none">{{ old('description', $event->description) }}</textarea>
            </div>

            <!-- Current Image & Upload -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Imagem</label>
                @if($event->image)
                    <div class="mb-4 flex items-center space-x-4">
                        <img src="{{ asset('storage/' . $event->image) }}" alt="" class="h-20 w-32 object-cover rounded-lg">
                        <p class="text-sm text-gray-500">Imagem atual</p>
                    </div>
                @endif
                <div class="flex items-center justify-center w-full">
                    <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-admin-border border-dashed rounded-lg cursor-pointer bg-admin-bg hover:bg-admin-hover transition-colors">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <p class="text-xs text-gray-500">Clique para alterar imagem (max 2MB)</p>
                        </div>
                        <input type="file" name="image" id="image" class="hidden" accept="image/*">
                    </label>
                </div>
            </div>

            <!-- Price & Capacity -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="flex items-center space-x-3 cursor-pointer">
                        <input type="checkbox" name="is_free" value="1" {{ old('is_free', $event->is_free) ? 'checked' : '' }}
                               class="h-4 w-4 rounded border-admin-border bg-admin-bg text-accent focus:ring-accent/20">
                        <span class="text-sm text-gray-300">Entrada Gratuita</span>
                    </label>
                </div>
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-300 mb-2">Preço (€)</label>
                    <input type="number" name="price" id="price" value="{{ old('price', $event->price) }}" step="0.01" min="0"
                           class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none">
                </div>
                <div>
                    <label for="max_capacity" class="block text-sm font-medium text-gray-300 mb-2">Capacidade Máxima</label>
                    <input type="number" name="max_capacity" id="max_capacity" value="{{ old('max_capacity', $event->max_capacity) }}" min="1"
                           class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none">
                </div>
            </div>

            <!-- Toggles -->
            <div class="flex flex-wrap gap-6">
                <label class="flex items-center space-x-3 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $event->is_active) ? 'checked' : '' }}
                           class="h-4 w-4 rounded border-admin-border bg-admin-bg text-accent focus:ring-accent/20">
                    <span class="text-sm text-gray-300">Evento Ativo</span>
                </label>
                <label class="flex items-center space-x-3 cursor-pointer">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $event->is_featured) ? 'checked' : '' }}
                           class="h-4 w-4 rounded border-admin-border bg-admin-bg text-accent focus:ring-accent/20">
                    <span class="text-sm text-gray-300">Destacar na Homepage</span>
                </label>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-admin-border">
                <a href="{{ route('admin.events.index') }}" 
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
</div>
@endsection
