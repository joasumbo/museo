@extends('layouts.app')

@section('title', $colecao['titulo'] . ' - Museu Municipal de Alcanena')

@section('description', $colecao['descricao_curta'])

@section('content')

        <!-- Hero da Coleção -->
        <div class="breadcumb-wrapper background-image" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset($colecao['imagem_hero']) }}'); padding: 180px 0 100px; background-position: center;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">
                        @if($colecao['badge'])
                        <span class="badge" style="background: #d4a574; color: #fff; padding: 8px 20px; border-radius: 30px; font-size: 12px; font-weight: 600; letter-spacing: 1.5px; text-transform: uppercase; display: inline-block; margin-bottom: 20px;">
                            {{ $colecao['badge'] }}
                        </span>
                        @endif
                        <h1 class="breadcumb-title" style="font-size: 56px; font-weight: 700; color: #fff; margin-bottom: 25px;">{{ $colecao['titulo'] }}</h1>
                        <p style="color: rgba(255,255,255,0.95); font-size: 22px; line-height: 1.6; max-width: 800px; margin: 0 auto;">
                            {{ $colecao['descricao_curta'] }}
                        </p>
                        <ul class="breadcumb-menu" style="margin-top: 30px;">
                            <li><a href="{{ url('/') }}">INÍCIO</a></li>
                            <li><a href="{{ url('/Coleções') }}">Coleções</a></li>
                            <li class="active">{{ strtoupper($colecao['titulo']) }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Conteúdo Principal -->
        <div class="space overflow-hidden bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Texto Principal -->
                        <div class="about-content mb-50">
                            <h2 class="sec-title mb-30" style="font-size: 38px; color: #1a1a1a;">Sobre Esta Coleção</h2>
                            <p style="font-size: 18px; line-height: 1.8; color: #555; margin-bottom: 25px;">
                                {!! nl2br($colecao['texto_completo']) !!}
                            </p>
                        </div>

                        <!-- Galeria de Imagens -->
                        <div class="mb-50">
                            <h3 class="mb-30" style="font-size: 28px; color: #1a1a1a;">Galeria da Coleção</h3>
                            <div class="row g-4">
                                @foreach($colecao['galeria'] as $imagem)
                                <div class="col-md-6">
                                    <a href="{{ asset($imagem['url']) }}" class="gallery-item" title="{{ $imagem['titulo'] }}">
                                        <div style="position: relative; overflow: hidden; border-radius: 8px; height: 280px;">
                                            <img src="{{ asset($imagem['url']) }}" alt="{{ $imagem['titulo'] }}" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s;">
                                            <div class="overlay" style="position: absolute; inset: 0; background: rgba(212, 165, 116, 0.9); opacity: 0; transition: opacity 0.4s; display: flex; align-items: center; justify-content: center;">
                                                <i class="fas fa-search-plus" style="color: #fff; font-size: 32px;"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Destaques -->
                        @if(count($colecao['destaques']) > 0)
                        <div class="mb-50">
                            <h3 class="mb-30" style="font-size: 28px; color: #1a1a1a;">Destaques da Coleção</h3>
                            <div class="row g-4">
                                @foreach($colecao['destaques'] as $destaque)
                                <div class="col-md-6">
                                    <div class="feature-card" style="background: #f8f8f8; padding: 30px; border-radius: 8px; border-left: 4px solid #d4a574;">
                                        <div class="icon mb-3" style="color: #d4a574; font-size: 36px;">
                                            <i class="{{ $destaque['icone'] }}"></i>
                                        </div>
                                        <h4 style="font-size: 20px; margin-bottom: 15px; color: #1a1a1a;">{{ $destaque['titulo'] }}</h4>
                                        <p style="color: #666; margin: 0; line-height: 1.6;">{{ $destaque['descricao'] }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Sidebar -->
                    <div class="col-lg-4">
                        <!-- Informações da Coleção -->
                        <div class="widget" style="background: #1a1a1a; padding: 40px 30px; border-radius: 8px; margin-bottom: 30px;">
                            <h3 class="widget-title" style="color: #d4a574; font-size: 22px; margin-bottom: 25px;">Informações</h3>
                            <ul style="list-style: none; padding: 0; margin: 0;">
                                @foreach($colecao['info'] as $item)
                                <li style="padding: 15px 0; border-bottom: 1px solid rgba(255,255,255,0.1);">
                                    <strong style="color: #d4a574; display: block; margin-bottom: 5px; font-size: 14px;">{{ $item['label'] }}</strong>
                                    <span style="color: rgba(255,255,255,0.85); font-size: 15px;">{{ $item['valor'] }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Call to Action -->
                        <div class="widget" style="background: linear-gradient(135deg, #d4a574 0%, #b8925f 100%); padding: 40px 30px; border-radius: 8px; text-align: center;">
                            <div class="icon mb-3" style="color: #fff; font-size: 48px;">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <h4 style="color: #fff; font-size: 22px; margin-bottom: 15px;">Visite o Museu</h4>
                            <p style="color: rgba(255,255,255,0.95); margin-bottom: 25px; line-height: 1.6;">
                                Venha conhecer esta coleção pessoalmente. Agende sua visita!
                            </p>
                            <a href="{{ url('/contactos') }}" class="btn" style="background: #fff; color: #d4a574; padding: 14px 30px; border-radius: 30px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; font-size: 14px; display: inline-block; text-decoration: none; transition: all 0.3s;">
                                Agendar Visita
                            </a>
                        </div>

                        <!-- OuTrês coleções -->
                        <div class="widget" style="background: #f8f8f8; padding: 30px; border-radius: 8px; margin-top: 30px;">
                            <h3 class="widget-title" style="color: #1a1a1a; font-size: 20px; margin-bottom: 25px;">OuTrês coleções</h3>
                            <ul style="list-style: none; padding: 0; margin: 0;">
                                @foreach($outras_Coleções as $outra)
                                <li style="margin-bottom: 15px;">
                                    <a href="{{ url('/Coleções/' . $outra['slug']) }}" style="color: #1a1a1a; text-decoration: none; display: flex; align-items: center; transition: color 0.3s;">
                                        <i class="fas fa-chevron-right" style="color: #d4a574; margin-right: 10px; font-size: 12px;"></i>
                                        <span>{{ $outra['titulo'] }}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
