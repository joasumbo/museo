@extends('layouts.app')

@section('title', $evento['titulo'] . ' - Museu Municipal de Alcanena')

@section('description', $evento['descricao_curta'])

@section('content')

        <!-- Breadcrumb -->
        <div class="breadcumb-wrapper background-image" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset($evento['imagem']) }}'); padding: 140px 0 80px; background-position: center; background-size: cover;">
            <div class="container">
                <div class="breadcumb-content">
                    <h1 class="breadcumb-title">{{ $evento['titulo'] }}</h1>
                    <ul class="breadcumb-menu">
                        <li><a href="{{ url('/') }}">Início</a></li>
                        <li><a href="{{ url('/eventos') }}">Eventos</a></li>
                        <li class="active">{{ $evento['titulo'] }}</li>
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
                            <i class="far fa-calendar-alt"></i> {{ $evento['data'] }} - {{ $evento['Horário'] }}
                        </h3>
                        <h2 class="sec-title">{{ $evento['titulo'] }}</h2>
                    </div>
                </div>
                <div class="event-details-thumb">
                    <img class="w-100" src="{{ asset($evento['imagem']) }}" alt="{{ $evento['titulo'] }}">
                    <span class="tag">{{ $evento['tipo'] }}</span>
                    @if($evento['status'] == 'A decorrer')
                        <span class="tag status-badge" style="background: #28a745; left: auto; right: 20px;">{{ $evento['status'] }}</span>
                    @elseif($evento['status'] == 'Brevemente')
                        <span class="tag status-badge" style="background: #d4a574; left: auto; right: 20px;">{{ $evento['status'] }}</span>
                    @endif
                </div>
                <div class="row gx-60">
                    <div class="col-xl-4 sidebar-widget-area mt-50">
                        <aside class="sidebar-sticky-area sidebar-area">
                            <div class="widget widget-project-details">
                                <h3 class="widget_title">Informações do Evento</h3>
                                
                                @if(isset($evento['Horário_funcionamento']))
                                <div class="info-item">
                                    <h4 class="fw-medium mt-20 mb-10"><i class="far fa-clock text-theme"></i> Horário</h4>
                                    <p class="mb-0">{{ $evento['Horário_funcionamento'] }}</p>
                                </div>
                                @endif

                                @if(isset($evento['localizacao']))
                                <div class="info-item">
                                    <h4 class="fw-medium mt-20 mb-10"><i class="fas fa-map-marker-alt text-theme"></i> Localização</h4>
                                    <p class="mb-0">{{ $evento['localizacao'] }}</p>
                                </div>
                                @endif

                                @if(isset($evento['entrada']))
                                <div class="info-item">
                                    <h4 class="fw-medium mt-20 mb-10"><i class="fas fa-ticket-alt text-theme"></i> Entrada</h4>
                                    <p class="mb-0">{{ $evento['entrada'] }}</p>
                                </div>
                                @endif

                                @if(isset($evento['curador']))
                                <div class="info-item">
                                    <h4 class="fw-medium mt-20 mb-10"><i class="fas fa-user-tie text-theme"></i> Curadoria</h4>
                                    <p class="mb-0">{{ $evento['curador'] }}</p>
                                </div>
                                @endif

                                @if(isset($evento['parceiros']))
                                <div class="info-item">
                                    <h4 class="fw-medium mt-20 mb-10"><i class="fas fa-handshake text-theme"></i> Parceiros</h4>
                                    <p class="mb-0">{{ $evento['parceiros'] }}</p>
                                </div>
                                @endif

                                <div class="btn-wrap mt-30">
                                    <a href="{{ url('/agendar-visita?evento=' . $evento['slug']) }}" class="btn">
                                       AGENDAR VISITA
                                    </a>
                                </div>

                                <div class="share-wrap mt-30">
                                    <h4 class="fw-medium mb-15">Partilhar Evento</h4>
                                    <div class="social-btn style2">
                                        <a href="https://facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($evento['titulo']) }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="https://wa.me/?text={{ urlencode($evento['titulo'] . ' - ' . url()->current()) }}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                        <a href="mailto:?subject={{ urlencode($evento['titulo']) }}&body={{ urlencode(url()->current()) }}"><i class="fas fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="col-xl-8">
                        <div class="portfolio-details-wrap mt-40">
                            <h2 class="fw-semibold mb-20">{{ $evento['titulo'] }}</h2>
                            {!! nl2br(e($evento['descricao_completa'])) !!}

                            @if(isset($evento['galeria']) && count($evento['galeria']) > 0)
                            <h3 class="fw-semibold mt-40 mb-20">Galeria</h3>
                            <div class="row gy-4">
                                @foreach($evento['galeria'] as $imagem)
                                <div class="col-md-6">
                                    <div class="event-details-thumb">
                                        <a href="{{ asset($imagem['url']) }}" class="popup-image">
                                            <img class="w-100" src="{{ asset($imagem['url']) }}" alt="{{ $imagem['titulo'] }}">
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Outros Eventos -->
        @if(isset($outros_eventos) && count($outros_eventos) > 0)
        <div class="space bg-smoke">
            <div class="container">
                <div class="row justify-content-center text-center mb-50">
                    <div class="col-lg-8">
                        <span class="sub-title text-theme">CONTINUE EXPLORANDO</span>
                        <h2 class="sec-title mt-10">Outros Eventos e Exposições</h2>
                        <p class="mt-20" style="font-size: 16px; color: #666;">Descubra mais experiências únicas no Museu Municipal de Alcanena</p>
                    </div>
                </div>
                <div class="row gy-4 gx-4">
                    @foreach($outros_eventos as $outro)
                    <div class="col-lg-4 col-md-6">
                        <div class="event-highlight-card">
                            <div class="event-highlight-img">
                                <img src="{{ asset($outro['imagem']) }}" alt="{{ $outro['titulo'] }}">
                                <div class="event-highlight-overlay">
                                    <a href="{{ url('/eventos/' . $outro['slug']) }}" class="event-link-btn">
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                                @if($outro['status'] == 'A decorrer')
                                    <span class="event-status-badge active">{{ $outro['status'] }}</span>
                                @elseif($outro['status'] == 'Brevemente')
                                    <span class="event-status-badge upcoming">{{ $outro['status'] }}</span>
                                @endif
                            </div>
                            <div class="event-highlight-content">
                                <span class="event-type-tag">{{ $outro['tipo'] }}</span>
                                <h3 class="event-highlight-title">
                                    <a href="{{ url('/eventos/' . $outro['slug']) }}">{{ $outro['titulo'] }}</a>
                                </h3>
                                <div class="event-highlight-meta">
                                    <div class="meta-item">
                                        <i class="far fa-calendar-alt"></i>
                                        <span>{{ $outro['data'] }}</span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="far fa-clock"></i>
                                        <span>{{ $outro['Horário'] }}</span>
                                    </div>
                                </div>
                                <a href="{{ url('/eventos/' . $outro['slug']) }}" class="event-more-btn">
                                    Saber Mais <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="text-center mt-50">
                    <a href="{{ url('/eventos') }}" class="btn" style="padding: 16px 45px; font-size: 16px; font-weight: 600;">
                        <i class="far fa-calendar-alt me-2"></i>VER TODOS OS EVENTOS
                    </a>
                </div>
            </div>
        </div>
        @endif
@endsection
