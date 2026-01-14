@extends('layouts.app')

@section('title', 'Eventos - Museu Municipal de Alcanena')
@section('description', 'Eventos, exposições e atividades no Museu Municipal de Alcanena')

@section('content')
<!--==============================
Breadcumb
============================== -->
@php
    $latestEvent = \App\Models\Event::where('is_active', true)->whereNotNull('image')->orderBy('created_at', 'desc')->first();
    $bgImage = $latestEvent && $latestEvent->image 
        ? url('storage/' . $latestEvent->image) 
        : asset('assets/img/gallery/DSC_3932.jpg');
@endphp
<div class="breadcumb-wrapper text-center" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ $bgImage }}'); background-size: cover; background-position: center; min-height: 400px; display: flex; align-items: center;">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Eventos</h1>
        </div>
        <ul class="breadcumb-menu">
            <li><a href="{{ route('home') }}">Início</a></li>
            <li class="active">Eventos</li>
        </ul>                
    </div>
</div>

<!--==============================
Event Area  
==============================-->
<div class="space overflow-hidden">
    <div class="container">
        <!-- Filtros -->
        <div class="row justify-content-center mb-50">
            <div class="col-lg-10">
                <div class="filter-menu-style1 text-center">
                    <button data-filter="*" class="active tab-btn" type="button">TODOS</button>
                    <button data-filter=".exhibition" class="tab-btn" type="button">EXPOSIÇÕES</button>
                    <button data-filter=".event" class="tab-btn" type="button">EVENTOS</button>
                    <button data-filter=".workshop" class="tab-btn" type="button">WORKSHOPS</button>
                    <button data-filter=".conference" class="tab-btn" type="button">CONFERÊNCIAS</button>
                </div>
            </div>
        </div>

        <!-- Lista de Eventos -->
        @if($events->count() > 0)
        <div class="row gy-40 filter-active">
            @foreach($events as $event)
            <div class="col-lg-12 filter-item {{ $event->type }}">
                <div class="event-card style2">
                    <div class="event-card-img">
                        <img src="{{ $event->image ? url('storage/' . $event->image) : asset('assets/img/event/mma_event_1.jpg') }}" alt="{{ $event->title }}">
                        <span class="event-badge">{{ $event->getTypeLabel() }}</span>
                    </div>
                    <div class="event-card-content">
                        <div class="event-meta">
                            <span class="event-date">
                                <i class="far fa-calendar"></i>
                                {{ \Carbon\Carbon::parse($event->start_date)->locale('pt')->translatedFormat('d M, Y') }}
                                @if($event->end_date && $event->end_date != $event->start_date)
                                    - {{ \Carbon\Carbon::parse($event->end_date)->locale('pt')->translatedFormat('d M, Y') }}
                                @endif
                            </span>
                            @if($event->location)
                            <span class="event-location">
                                <i class="fas fa-map-marker-alt"></i>
                                {{ $event->location }}
                            </span>
                            @endif
                        </div>
                        <h3 class="event-title">
                            <a href="{{ route('evento.detalhes.bd', $event->slug) }}">{{ $event->title }}</a>
                        </h3>
                        @if($event->short_description)
                        <p class="event-text">{{ Str::limit($event->short_description, 150) }}</p>
                        @endif
                        <a href="{{ route('evento.detalhes.bd', $event->slug) }}" class="btn">
                            SABER MAIS
                            <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="row">
            <div class="col-12">
                <div class="alert alert-info text-center" style="padding: 60px 20px; background: #f8f9fa; border: none; border-radius: 10px;">
                    <i class="far fa-calendar-times" style="font-size: 48px; color: #d4a574; margin-bottom: 20px; display: block;"></i>
                    <h3 style="margin-bottom: 15px; color: #1a1a1a;">Nenhum Evento Disponível</h3>
                    <p style="color: #666; font-size: 16px; margin-bottom: 0;">Não há eventos programados no momento. Volte em breve para descobrir as nossas próximas exposições e atividades!</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<style>
/* Event Card Style 2 */
.event-card.style2 {
    display: flex;
    gap: 30px;
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
}

.event-card.style2:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

.event-card-img {
    position: relative;
    width: 400px;
    flex-shrink: 0;
    overflow: hidden;
}

.event-card-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.event-card.style2:hover .event-card-img img {
    transform: scale(1.05);
}

.event-badge {
    position: absolute;
    top: 20px;
    right: 20px;
    background: rgba(212, 165, 116, 0.95);
    color: #fff;
    padding: 8px 20px;
    border-radius: 30px;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.event-card-content {
    padding: 40px;
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.event-meta {
    display: flex;
    gap: 30px;
    margin-bottom: 15px;
    flex-wrap: wrap;
}

.event-meta span {
    color: #666;
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.event-meta i {
    color: #d4a574;
}

.event-title {
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 15px;
    line-height: 1.3;
}

.event-title a {
    color: #1a1a1a;
    transition: color 0.3s ease;
}

.event-title a:hover {
    color: #d4a574;
}

.event-text {
    color: #666;
    font-size: 16px;
    line-height: 1.6;
    margin-bottom: 25px;
}

/* Filter Menu */
.filter-menu-style1 {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 50px;
    display: inline-block;
}

.filter-menu-style1 .tab-btn {
    background: transparent;
    border: none;
    color: #666;
    font-weight: 600;
    font-size: 14px;
    padding: 12px 25px;
    border-radius: 30px;
    cursor: pointer;
    transition: all 0.3s ease;
    letter-spacing: 0.5px;
}

.filter-menu-style1 .tab-btn:hover,
.filter-menu-style1 .tab-btn.active {
    background: #d4a574;
    color: #fff;
}

/* Responsive */
@media (max-width: 991px) {
    .event-card.style2 {
        flex-direction: column;
    }
    
    .event-card-img {
        width: 100%;
        height: 300px;
    }
    
    .event-card-content {
        padding: 30px;
    }
    
    .event-title {
        font-size: 24px;
    }
}

@media (max-width: 767px) {
    .filter-menu-style1 .tab-btn {
        padding: 10px 15px;
        font-size: 12px;
    }
    
    .event-card-img {
        height: 250px;
    }
    
    .event-title {
        font-size: 20px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-menu-style1 .tab-btn');
    const filterItems = document.querySelectorAll('.filter-item');
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons
            filterBtns.forEach(b => b.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');
            
            const filterValue = this.getAttribute('data-filter');
            
            filterItems.forEach(item => {
                if (filterValue === '*') {
                    item.style.display = 'block';
                } else {
                    if (item.classList.contains(filterValue.replace('.', ''))) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                }
            });
        });
    });
});
</script>
@endsection
