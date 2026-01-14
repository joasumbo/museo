@extends('layouts.app')

@section('title', 'Museu Municipal de Alcanena - Cultura e História')
@section('description', 'Museu Municipal de Alcanena - Espaço dedicado à preservação e divulgação do Património cultural e histórico de Alcanena')
@section('keywords', 'Museu, Alcanena, Cultura, História, Património, Exposições, Eventos')

@section('content')
<!--==============================
Hero Area
==============================-->
    <div class="hero-wrapper hero-1" id="hero-sec">
        <div class="global-carousel hero-slider1" id="heroSlider1" data-fade="true" data-slide-show="1" data-lg-slide-show="1" data-md-slide-show="1" data-sm-slide-show="1" data-xs-slide-show="1" data-arrows="false" data-asnavfor=".hero-custom-dots">
            <div class="hero-slider" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('assets/img/hero/hero_mma_2.jpg') }}'); background-size: cover; background-position: center; min-height: 500px;">
                <div class="hero-thumb1" data-ani="slider-custom-anim-left" data-ani-delay="0.1s" style="display: none;">
                    <img src="{{ asset('assets/img/hero/hero_mma_2.jpg') }}" alt="Museu Municipal Alcanena">
                </div>
                <div class="hero-thumb2" data-ani="slider-custom-anim-right" data-ani-delay="0.1s" style="display: none;">
                    <img src="{{ asset('assets/img/hero/hero_mma_3.jpg') }}" alt="Museu Municipal Alcanena">
                </div>
                <div class="container">
                    <div class="row justify-content-center">                        
                        <div class="col-lg-10 col-md-12 text-center">
                            <div class="hero-style1" style="padding: 150px 0;">
                                <h4 class="hero-subtitle text-white" style="font-size: 24px; font-weight: 400; margin-bottom: 20px; letter-spacing: 2px;" data-ani="slider-custom-anim-up" data-ani-delay="0.1s">BEM-VINDO AO</h4>
                                <h1 class="hero-title text-white" style="font-size: 72px; font-weight: 700; line-height: 1.2; margin-bottom: 30px;" data-ani="slider-custom-anim-up" data-ani-delay="0.2s">Museu Municipal<br>de Alcanena</h1>
                                <p class="hero-text text-white" style="font-size: 20px; font-weight: 300; max-width: 600px; margin: 0 auto;" data-ani="slider-custom-anim-up" data-ani-delay="0.3s">Preservando a história, celebrando a cultura</p>
                            </div>
                        </div>
                    </div>                
                </div>
            </div>
        </div> 
    </div>
    <!--======== / Hero Section ========-->

    <!--==============================
    Exhibition Area  
    ==============================-->
    <div class="space bg-title">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-8">
                    <div class="title-area wow custom-anim-left" data-wow-duration="1.5s" data-wow-delay="0.1s">
                        <h2 class="sec-title text-white">Exposições em Destaque</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center exhibition-wrap-1 gy-40 gx-30">
                @forelse($featuredExhibitions as $exhibition)
                <div class="col-lg-4 col-md-6 exhibition-card-wrap">
                    <div class="exhibition-card gtop">
                        <div class="exhibition-card-thumb">
                            <img src="{{ $exhibition->image ? url('storage/' . $exhibition->image) : asset('assets/img/exhibition/mma_1.jpg') }}" alt="{{ $exhibition->title }}">
                        </div>
                        <div class="exhibition-card-details">
                            <div class="post-meta-item blog-meta">
                                <a href="{{ route('eventos') }}">
                                    {{ $exhibition->start_date->format('d M, Y') }}
                                    @if($exhibition->end_date && $exhibition->end_date != $exhibition->start_date)
                                     - {{ $exhibition->end_date->format('d M, Y') }}
                                    @endif
                                </a>
                            </div>
                            <h3 class="event-card-title"><a href="{{ route('eventos') }}">{{ $exhibition->title }}</a></h3>
                            @if($exhibition->short_description)
                            <p class="event-text">{{ Str::limit($exhibition->short_description, 100) }}</p>
                            @endif
                            <a class="btn style2" href="{{ route('eventos') }}">VER DETALHES</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <p class="text-white">Nenhuma exposição em destaque no momento.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>


    <!--==============================
        Portfolio Area  
    ==============================-->
    <div class="portfolio-area-1 space overflow-hidden bg-title">           
        <div class="container">
            <div class="row justify-content-between text-lg-start text-center">
                <div class="col-lg-8">
                    <div class="title-area wow custom-anim-left" data-wow-duration="1.5s" data-wow-delay="0.1s">
                        <h2 class="sec-title text-white">Galeria</h2>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="icon-box mb-40">
                        <button data-slick-prev=".portfolio-slider1" class="slick-arrow default" style="font-size: 11px; padding: 8px 12px;">◄</button>
                        <button data-slick-next=".portfolio-slider1" class="slick-arrow default" style="font-size: 11px; padding: 8px 12px;">►</button>
                    </div>
                </div>
            </div>                
        </div>
        <div class="container-fluid wow custom-anim-top" data-wow-duration="1.5s" data-wow-delay="0.1s">
            <div class="row global-carousel portfolio-slider1 gx-20" data-slide-show="3" >
                <div class="col-lg-4">
                    <div class="portfolio-card ">
                        <div class="portfolio-thumb">
                            <a class="popup-image icon-btn" href="{{ asset('assets/img/portfolio/mma_portfolio_1.jpg') }}"><i class="far fa-eye"></i></a>
                            <img src="{{ asset('assets/img/portfolio/mma_portfolio_1.jpg') }}" alt="portfolio">
                        </div>
                        <div class="portfolio-details">
                            <h3 class="portfilio-card-title"><a href="project-details.html">História Local</a></h3>
                            <a href="project-details.html" class="btn btn-border btn-radius">
                                VER COLEÇÃO
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="portfolio-card ">
                        <div class="portfolio-thumb">
                            <a class="popup-image icon-btn" href="{{ asset('assets/img/portfolio/mma_portfolio_2.jpg') }}"><i class="far fa-eye"></i></a>
                            <img src="{{ asset('assets/img/portfolio/mma_portfolio_2.jpg') }}" alt="portfolio">
                        </div>
                        <div class="portfolio-details">
                            <h3 class="portfilio-card-title"><a href="project-details.html">Arte e Cultura</a></h3>
                            <a href="project-details.html" class="btn btn-border btn-radius">
                                VER COLEÇÃO
                            </a>
                        </div>
                    </div>
                </div>    
                <div class="col-lg-4">
                    <div class="portfolio-card ">
                        <div class="portfolio-thumb">
                            <a class="popup-image icon-btn" href="{{ asset('assets/img/portfolio/mma_portfolio_3.jpg') }}"><i class="far fa-eye"></i></a>
                            <img src="{{ asset('assets/img/portfolio/mma_portfolio_3.jpg') }}" alt="portfolio">
                        </div>
                        <div class="portfolio-details">
                            <h3 class="portfilio-card-title"><a href="project-details.html">Património Cultural</a></h3>
                            <a href="project-details.html" class="btn btn-border btn-radius">
                                VER COLEÇÃO
                            </a>
                        </div>
                    </div>                        
                </div> 
                <div class="col-lg-4">
                    <div class="portfolio-card ">
                        <div class="portfolio-thumb">
                            <a class="popup-image icon-btn" href="{{ asset('assets/img/portfolio/mma_portfolio_1.jpg') }}"><i class="far fa-eye"></i></a>
                            <img src="{{ asset('assets/img/portfolio/mma_portfolio_1.jpg') }}" alt="portfolio">
                        </div>
                        <div class="portfolio-details">
                            <h3 class="portfilio-card-title"><a href="project-details.html">História Local</a></h3>
                            <a href="project-details.html" class="btn btn-border btn-radius">
                                VER COLEÇÃO
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="portfolio-card ">
                        <div class="portfolio-thumb">
                            <a class="popup-image icon-btn" href="{{ asset('assets/img/portfolio/mma_portfolio_2.jpg') }}"><i class="far fa-eye"></i></a>
                            <img src="{{ asset('assets/img/portfolio/mma_portfolio_2.jpg') }}" alt="portfolio">
                        </div>
                        <div class="portfolio-details">
                            <h3 class="portfilio-card-title"><a href="project-details.html">Arte e Cultura</a></h3>
                            <a href="project-details.html" class="btn btn-border btn-radius">
                                VER COLEÇÃO
                            </a>
                        </div>
                    </div>
                </div>    
                <div class="col-lg-4">
                    <div class="portfolio-card ">
                        <div class="portfolio-thumb">
                            <a class="popup-image icon-btn" href="{{ asset('assets/img/portfolio/mma_portfolio_3.jpg') }}"><i class="far fa-eye"></i></a>
                            <img src="{{ asset('assets/img/portfolio/mma_portfolio_3.jpg') }}" alt="portfolio">
                        </div>
                        <div class="portfolio-details">
                            <h3 class="portfilio-card-title"><a href="project-details.html">Património Cultural</a></h3>
                            <a href="project-details.html" class="btn btn-border btn-radius">
                                VER COLEÇÃO
                            </a>
                        </div>
                    </div>                        
                </div>                 
            </div>
        </div>
    </div>

    <!--==============================
    Event Area  
    ==============================-->
    <div class="event-area-1 space overflow-hidden bg-smoke">
        <div class="container">
            <div class="row justify-content-lg-between justify-content-center text-lg-start text-center">
                <div class="col-lg-7">
                    <div class="title-area wow custom-anim-left" data-wow-duration="1.5s" data-wow-delay="0.1s">
                        <h2 class="sec-title">Próximos Eventos</h2>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="sec-btn wow custom-anim-right" data-wow-duration="1.5s" data-wow-delay="0.1s">
                        <a href="{{ route('eventos') }}" class="btn">
                            VER TODOS OS EVENTOS   
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row gy-30">
                @forelse($upcomingEvents as $event)
                <div class="col-lg-12">
                    <div class="event-card wow custom-anim-left" data-wow-duration="1.5s" data-wow-delay="0.1s">
                        <div class="event-card-date">
                            <span class="date">{{ \Carbon\Carbon::parse($event->start_date)->format('d') }}</span>
                            {{ \Carbon\Carbon::parse($event->start_date)->locale('pt')->translatedFormat('F, Y') }}
                        </div>
                        <div class="event-card-details">
                            <h3 class="event-card-title"><a href="{{ route('evento.detalhes.bd', $event->slug) }}">{{ $event->title }}</a></h3>
                            <span class="event-card-location">
                                <i class="fas fa-map-marker-alt"></i> 
                                {{ $event->location ?? 'Museu Municipal de Alcanena' }}
                            </span>
                            <a href="{{ route('evento.detalhes.bd', $event->slug) }}" class="btn">
                                SABER MAIS
                            </a>
                        </div>
                        @if($event->image)
                        <div class="event-card-thumb">
                            <img src="{{ url('storage/' . $event->image) }}" alt="{{ $event->title }}">
                        </div>
                        @else
                        <div class="event-card-thumb">
                            <img src="{{ asset('assets/img/event/mma_event_1.jpg') }}" alt="{{ $event->title }}">
                        </div>
                        @endif
                    </div>
                </div>
                @empty
                <div class="col-lg-12">
                    <div class="alert alert-info text-center">
                        <p>Não há eventos programados no momento. Volte em breve para descobrir as nossas próximas exposições e atividades!</p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!--==============================
    Planeie a Sua Visita - CTA Section
    ==============================-->
    <div class="space bg-title" style="background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%); padding: 80px 0;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="wow custom-anim-left" data-wow-duration="1.5s" data-wow-delay="0.1s">
                        <h2 class="sec-title text-white mb-3">Planeie a Sua Visita</h2>
                        <p class="text-white mb-2" style="font-size: 18px;">
                            <i class="far fa-clock me-2"></i><strong>Terça a Domingo:</strong> 10:00-13:00 | 14:00-18:00
                        </p>
                        <p class="text-white mb-3" style="font-size: 16px; opacity: 0.9;">
                            <i class="fas fa-times-circle me-2"></i>Segunda-feira: Encerrado
                        </p>
                        <p class="text-white" style="font-size: 15px; opacity: 0.8;">
                            <i class="fas fa-map-marker-alt me-2"></i>Rua Pedro Teixeira, nº 8, 2380-077 Alcanena
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 text-lg-end text-center">
                    <div class="wow custom-anim-right" data-wow-duration="1.5s" data-wow-delay="0.2s">
                        <a href="{{ route('agendar.visita') }}" class="btn" style="padding: 18px 45px; font-size: 16px; font-weight: 600;">
                            <i class="far fa-calendar-check me-2"></i>AGENDAR VISITA
                        </a>
                        <p class="text-white mt-3 mb-0" style="font-size: 14px; opacity: 0.8;">
                            <i class="fas fa-phone-alt me-2"></i>+351 249 580 170 | <i class="fas fa-envelope ms-2 me-2"></i>museu@cm-alcanena.pt
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
