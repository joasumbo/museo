@extends('layouts.app')

@section('title', $event->title . ' - Museu Municipal de Alcanena')

@section('content')
<!-- Breadcrumb -->
<div class="breadcumb-wrapper background-image" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ $event->image ? asset('storage/' . $event->image) : asset('assets/img/breadcrumb-bg.png') }}'); padding: 140px 0 80px; background-position: center; background-size: cover;">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">{{ $event->title }}</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ route('home') }}">INÍCIO</a></li>
                <li><a href="{{ route('eventos') }}">EVENTOS</a></li>
                <li class="active">{{ strtoupper($event->title) }}</li>
            </ul>                
        </div>
    </div>
</div>

<!-- Event Details Area -->
<div class="event-details-area space">
    <div class="container">
        <div class="event-details-title-wrap">
            <div class="title-area">
                <h3 class="subtitle">
                    <i class="far fa-calendar-alt"></i> 
                    {{ \Carbon\Carbon::parse($event->start_date)->locale('pt')->translatedFormat('d \d\e F \d\e Y') }}
                    @if($event->start_time)
                        - {{ substr($event->start_time, 0, 5) }}
                    @endif
                </h3>
                <h2 class="sec-title">{{ $event->title }}</h2>
            </div>
        </div>
        
        @if($event->image)
        <div class="event-details-thumb">
            <img class="w-100" src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}">
            <span class="tag">{{ $event->getTypeLabel() }}</span>
            @if($event->is_featured)
                <span class="tag status-badge" style="background: #d4a574; left: auto; right: 20px;">⭐ Destaque</span>
            @endif
        </div>
        @endif
        
        <div class="row gx-60">
            <div class="col-xl-4 sidebar-widget-area mt-50">
                <aside class="sidebar-sticky-area sidebar-area">
                    <div class="widget widget-project-details">
                        <h3 class="widget_title">Informações do Evento</h3>
                        
                        <div class="info-item">
                            <h4 class="fw-medium mt-20 mb-10"><i class="far fa-calendar text-theme"></i> Data</h4>
                            <p class="mb-0">
                                {{ \Carbon\Carbon::parse($event->start_date)->locale('pt')->translatedFormat('d \d\e F \d\e Y') }}
                                @if($event->end_date && $event->end_date != $event->start_date)
                                    até {{ \Carbon\Carbon::parse($event->end_date)->locale('pt')->translatedFormat('d \d\e F \d\e Y') }}
                                @endif
                            </p>
                        </div>

                        @if($event->start_time)
                        <div class="info-item">
                            <h4 class="fw-medium mt-20 mb-10"><i class="far fa-clock text-theme"></i> Horário</h4>
                            <p class="mb-0">
                                {{ substr($event->start_time, 0, 5) }}
                                @if($event->end_time)
                                    - {{ substr($event->end_time, 0, 5) }}
                                @endif
                            </p>
                        </div>
                        @endif

                        @if($event->location)
                        <div class="info-item">
                            <h4 class="fw-medium mt-20 mb-10"><i class="fas fa-map-marker-alt text-theme"></i> Localização</h4>
                            <p class="mb-0">{{ $event->location }}</p>
                        </div>
                        @endif

                        <div class="info-item">
                            <h4 class="fw-medium mt-20 mb-10"><i class="fas fa-ticket-alt text-theme"></i> Entrada</h4>
                            <p class="mb-0">Gratuita</p>
                        </div>

                        <div class="info-item">
                            <h4 class="fw-medium mt-20 mb-10"><i class="fas fa-tag text-theme"></i> Categoria</h4>
                            <p class="mb-0">{{ $event->getTypeLabel() }}</p>
                        </div>

                        <div class="btn-group mt-40">
                            <a href="{{ route('agendar.visita', ['evento' => $event->id]) }}" class="btn">
                                <i class="fas fa-calendar-check"></i> AGENDAR VISITA
                            </a>
                        </div>

                        <div class="btn-group mt-20">
                            <a href="{{ route('contactos') }}" class="btn style-border">
                                <i class="fas fa-envelope"></i> CONTACTAR
                            </a>
                        </div>
                    </div>
                </aside>
            </div>
            
            <div class="col-xl-8">
                <div class="project-about">
                    <div class="title-area">
                        <h3 class="sec-title">Sobre o Evento</h3>
                    </div>
                    
                    <div class="event-description">
                        {!! nl2br(e($event->description)) !!}
                    </div>

                    @if($event->additional_info)
                    <div class="mt-40">
                        <h4 class="mb-20">Informações Adicionais</h4>
                        <div class="checklist mb-50">
                            {!! nl2br(e($event->additional_info)) !!}
                        </div>
                    </div>
                    @endif

                    <!-- Partilhar -->
                    <div class="share-links clearfix">
                        <div class="row justify-content-between">
                            <div class="col-md-auto">
                                <h4 class="mb-0">Partilhar este evento:</h4>
                            </div>
                            <div class="col-md-auto">
                                <div class="th-social">
                                    <a href="https://facebook.com/sharer/sharer.php?u={{ urlencode(route('evento.detalhes.bd', $event->id)) }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('evento.detalhes.bd', $event->id)) }}&text={{ urlencode($event->title) }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                    <a href="https://wa.me/?text={{ urlencode($event->title . ' - ' . route('evento.detalhes.bd', $event->id)) }}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                    <a href="mailto:?subject={{ urlencode($event->title) }}&body={{ urlencode(route('evento.detalhes.bd', $event->id)) }}"><i class="fas fa-envelope"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Outros Eventos -->
@php
    $otherEvents = \App\Models\Event::where('is_active', true)
        ->where('id', '!=', $event->id)
        ->where('start_date', '>=', now())
        ->orderBy('start_date', 'asc')
        ->limit(3)
        ->get();
@endphp

@if($otherEvents->count() > 0)
<div class="event-area-1 space-bottom overflow-hidden bg-smoke">
    <div class="container">
        <div class="title-area text-center">
            <h2 class="sec-title">Outros Eventos</h2>
        </div>
        <div class="row gy-30">
            @foreach($otherEvents as $otherEvent)
            <div class="col-lg-4 col-md-6">
                <div class="event-card">
                    <div class="event-card-date">
                        <span class="date">{{ \Carbon\Carbon::parse($otherEvent->start_date)->format('d') }}</span>
                        {{ \Carbon\Carbon::parse($otherEvent->start_date)->locale('pt')->translatedFormat('F, Y') }}
                    </div>
                    <div class="event-card-details">
                        <h3 class="event-card-title"><a href="{{ route('evento.detalhes.bd', $otherEvent->id) }}">{{ $otherEvent->title }}</a></h3>
                        <span class="event-card-location">
                            <i class="fas fa-map-marker-alt"></i> 
                            {{ $otherEvent->location ?? 'Museu Municipal de Alcanena' }}
                        </span>
                        <a href="{{ route('evento.detalhes.bd', $otherEvent->id) }}" class="btn">
                            SABER MAIS
                        </a>
                    </div>
                    @if($otherEvent->image)
                    <div class="event-card-thumb">
                        <img src="{{ asset('storage/' . $otherEvent->image) }}" alt="{{ $otherEvent->title }}">
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

@endsection
