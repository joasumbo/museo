@extends('admin.layouts.app')

@section('title', 'Ver Contacto')
@section('page-title', 'Ver Contacto')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6 flex items-center justify-between">
        <a href="{{ route('admin.contacts.index') }}" class="inline-flex items-center text-sm text-gray-400 hover:text-white">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Voltar às mensagens
        </a>
        <div class="flex items-center space-x-2">
            @if($contact->status !== 'archived')
                <form action="{{ route('admin.contacts.archive', $contact) }}" method="POST" class="inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="px-3 py-1.5 text-xs font-medium text-gray-400 hover:text-white bg-admin-bg rounded-lg hover:bg-admin-border transition-colors">
                        Arquivar
                    </button>
                </form>
            @endif
            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline" 
                  onsubmit="return confirm('Tem certeza que deseja eliminar esta mensagem?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-3 py-1.5 text-xs font-medium text-red-400 hover:text-red-300 bg-admin-bg rounded-lg hover:bg-red-500/10 transition-colors">
                    Eliminar
                </button>
            </form>
        </div>
    </div>

    <!-- Message Card -->
    <div class="bg-admin-card border border-admin-border rounded-xl overflow-hidden">
        <!-- Header -->
        <div class="px-6 py-4 border-b border-admin-border">
            <div class="flex items-start justify-between">
                <div>
                    <h1 class="text-lg font-medium text-white">{{ $contact->subject ?: 'Sem assunto' }}</h1>
                    <div class="mt-1 flex items-center space-x-3 text-sm text-gray-500">
                        <span>{{ $contact->created_at->format('d/m/Y H:i') }}</span>
                        <span>•</span>
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs
                            @if($contact->status === 'unread') bg-accent/20 text-accent
                            @elseif($contact->status === 'replied') bg-green-500/10 text-green-400
                            @elseif($contact->status === 'archived') bg-gray-500/10 text-gray-400
                            @else bg-blue-500/10 text-blue-400
                            @endif">
                            @if($contact->status === 'unread') Não lida
                            @elseif($contact->status === 'read') Lida
                            @elseif($contact->status === 'replied') Respondida
                            @else Arquivada
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sender Info -->
        <div class="px-6 py-4 bg-admin-bg border-b border-admin-border">
            <div class="flex items-center space-x-4">
                <div class="h-10 w-10 rounded-full bg-accent/20 flex items-center justify-center text-accent font-medium">
                    {{ strtoupper(substr($contact->name, 0, 1)) }}
                </div>
                <div>
                    <p class="text-sm font-medium text-white">{{ $contact->name }}</p>
                    <a href="mailto:{{ $contact->email }}" class="text-sm text-accent hover:text-accent-hover">{{ $contact->email }}</a>
                </div>
                @if($contact->phone)
                    <div class="ml-auto">
                        <a href="tel:{{ $contact->phone }}" class="inline-flex items-center text-sm text-gray-400 hover:text-white">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            {{ $contact->phone }}
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Message Body -->
        <div class="px-6 py-6">
            <div class="prose prose-invert prose-sm max-w-none">
                {!! nl2br(e($contact->message)) !!}
            </div>
        </div>
    </div>

    <!-- Reply Form -->
    @if($contact->status !== 'archived')
        <div class="mt-6 bg-admin-card border border-admin-border rounded-xl">
            <div class="px-6 py-4 border-b border-admin-border">
                <h2 class="text-sm font-medium text-white">Responder</h2>
            </div>
            <form action="{{ route('admin.contacts.reply', $contact) }}" method="POST" class="p-6">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="reply_message" class="block text-sm font-medium text-gray-300 mb-2">Mensagem</label>
                        <textarea name="reply_message" id="reply_message" rows="6" required
                                  class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white placeholder-gray-500 focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none"
                                  placeholder="Escreva a sua resposta...">{{ old('reply_message') }}</textarea>
                        @error('reply_message')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="text-xs text-gray-500">
                            A resposta será enviada para: <span class="text-gray-400">{{ $contact->email }}</span>
                        </p>
                        <button type="submit" 
                                class="inline-flex items-center px-4 py-2 bg-accent hover:bg-accent-hover text-white text-sm font-medium rounded-lg transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Enviar Resposta
                        </button>
                    </div>
                </div>
            </form>
        </div>
    @endif

    <!-- Reply History -->
    @if($contact->replied_at)
        <div class="mt-6 bg-admin-card border border-admin-border rounded-xl">
            <div class="px-6 py-4 border-b border-admin-border">
                <h2 class="text-sm font-medium text-white">Resposta Enviada</h2>
            </div>
            <div class="p-6">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="h-8 w-8 rounded-full bg-green-500/10 flex items-center justify-center">
                        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-white">Respondido por {{ $contact->repliedBy->name ?? 'Administrador' }}</p>
                        <p class="text-xs text-gray-500">{{ $contact->replied_at->format('d/m/Y H:i') }}</p>
                    </div>
                </div>
                @if($contact->reply_message)
                    <div class="prose prose-invert prose-sm max-w-none bg-admin-bg rounded-lg p-4">
                        {!! nl2br(e($contact->reply_message)) !!}
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>
@endsection
