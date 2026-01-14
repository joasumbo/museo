@extends('layouts.app')

@section('title', 'Galeria de Fotos - Museu Municipal de Alcanena')

@section('description', 'Galeria de fotos do Museu Municipal de Alcanena - descubra o nosso acervo e espaços expositivos através de imagens.')

@section('content')

        <!-- Breadcrumb -->
        <div class="breadcumb-wrapper background-image" style="background-image: url('{{ asset('assets/img/hero/hero_mma_2.jpg') }}'); padding: 120px 0 60px;">
            <div class="container">
                <div class="breadcumb-content">
                    <h1 class="breadcumb-title">Galeria de fotos</h1>
                    <ul class="breadcumb-menu">
                        <li><a href="{{ url('/') }}">Início</a></li>
                        <li class="active">Galeria</li>
                    </ul>                
                </div>
            </div>
        </div>

        <!-- Intro Section -->
        <div class="space-top overflow-hidden">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-8">
                        <div class="title-area mb-50 wow custom-anim-top" data-wow-duration="1.5s" data-wow-delay="0.1s">
                            <span style="color: #d4a574; font-weight: 500; font-size: 14px; letter-spacing: 2px; text-transform: uppercase;">Imagens do Museu</span>
                            <h2 class="sec-title mt-3" style="font-size: 38px;">Um Olhar Sobre o Nosso Património</h2>
                            <p class="mt-20" style="font-size: 16px; line-height: 1.8; color: #666;">
                                Explore visualmente o Museu Municipal de Alcanena, os nossos espaços expositivos e o rico acervo que preserva 45 mil anos de História.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Galeria de Imagens - Slider -->
        <div class="space-bottom overflow-hidden" style="background: #f8f8f8;">
            <div class="container-fluid px-0">
                
                <!-- Slider Principal -->
                <div class="gallery-slider">
                    
                    <!-- Slide 1 -->
                    <div class="gallery-slide">
                        <div style="position: relative; height: 700px; overflow: hidden;">
                            <a class="gallery-item" href="{{ asset('assets/img/gallery/DSC_3932.jpg') }}" title="Acervo Arqueológico">
                                <img src="{{ asset('assets/img/gallery/DSC_3932.jpg') }}" alt="Acervo Arqueológico" style="width: 100%; height: 100%; object-fit: cover;">
                            </a>
                            <div class="slide-caption">
                                <div class="container">
                                    <div class="caption-content">
                                        <span class="caption-tag">ARQUEOLOGIA</span>
                                        <h2 class="caption-title">Acervo Arqueológico</h2>
                                        <p class="caption-text">45 mil anos de História preservados desde o Paleolítico até à Idade Moderna</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="gallery-slide">
                        <div style="position: relative; height: 700px; overflow: hidden;">
                            <a class="gallery-item" href="{{ asset('assets/img/portfolio/mma_portfolio_2.jpg') }}" title="Coleção Curtumes">
                                <img src="{{ asset('assets/img/portfolio/mma_portfolio_2.jpg') }}" alt="Coleção Curtumes" style="width: 100%; height: 100%; object-fit: cover;">
                            </a>
                            <div class="slide-caption">
                                <div class="container">
                                    <div class="caption-content">
                                        <span class="caption-tag">⭐ única NO PAÍS</span>
                                        <h2 class="caption-title">Coleção Curtumes</h2>
                                        <p class="caption-text">Especificidade téúnica e industrial incomparável - Património único da indústria do couro</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="gallery-slide">
                        <div style="position: relative; height: 700px; overflow: hidden;">
                            <a class="gallery-item" href="{{ asset('assets/img/gallery/DSC_3946.jpg') }}" title="Espaço Expositivo">
                                <img src="{{ asset('assets/img/gallery/DSC_3946.jpg') }}" alt="Espaço Expositivo" style="width: 100%; height: 100%; object-fit: cover;">
                            </a>
                            <div class="slide-caption">
                                <div class="container">
                                    <div class="caption-content">
                                        <span class="caption-tag">ESPAÇOS</span>
                                        <h2 class="caption-title">Salas de Exposição</h2>
                                        <p class="caption-text">Espaços modernos e acolhedores para descobrir o nosso Património cultural</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 4 -->
                    <div class="gallery-slide">
                        <div style="position: relative; height: 700px; overflow: hidden;">
                            <a class="gallery-item" href="{{ asset('assets/img/portfolio/mma_portfolio_3.jpg') }}" title="História Local">
                                <img src="{{ asset('assets/img/portfolio/mma_portfolio_3.jpg') }}" alt="História Local" style="width: 100%; height: 100%; object-fit: cover;">
                            </a>
                            <div class="slide-caption">
                                <div class="container">
                                    <div class="caption-content">
                                        <span class="caption-tag">ETNOGRAFIA</span>
                                        <h2 class="caption-title">História Local</h2>
                                        <p class="caption-text">Da "Rata Cega" aos utensílios de Minde - memórias de um povo</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 5 -->
                    <div class="gallery-slide">
                        <div style="position: relative; height: 700px; overflow: hidden;">
                            <a class="gallery-item" href="{{ asset('assets/img/gallery/DSC_3950.jpg') }}" title="Vitrine Museológica">
                                <img src="{{ asset('assets/img/gallery/DSC_3950.jpg') }}" alt="Vitrine Museológica" style="width: 100%; height: 100%; object-fit: cover;">
                            </a>
                            <div class="slide-caption">
                                <div class="container">
                                    <div class="caption-content">
                                        <span class="caption-tag">ACERVO</span>
                                        <h2 class="caption-title">Vitrines Expositivas</h2>
                                        <p class="caption-text">Cada peça conta uma História única do território de Alcanena</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 6 -->
                    <div class="gallery-slide">
                        <div style="position: relative; height: 700px; overflow: hidden;">
                            <a class="gallery-item" href="{{ asset('assets/img/gallery/DSC_3958.jpg') }}" title="Detalhes do Acervo">
                                <img src="{{ asset('assets/img/gallery/DSC_3958.jpg') }}" alt="Detalhes do Acervo" style="width: 100%; height: 100%; object-fit: cover;">
                            </a>
                            <div class="slide-caption">
                                <div class="container">
                                    <div class="caption-content">
                                        <span class="caption-tag">Património</span>
                                        <h2 class="caption-title">Detalhes do Acervo</h2>
                                        <p class="caption-text">Objetos históricos cuidadosamente preservados para as gerações futuras</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 7 -->
                    <div class="gallery-slide">
                        <div style="position: relative; height: 700px; overflow: hidden;">
                            <a class="gallery-item" href="{{ asset('assets/img/gallery/DSC_3961.jpg') }}" title="Espaço Museológico">
                                <img src="{{ asset('assets/img/gallery/DSC_3961.jpg') }}" alt="Espaço Museológico" style="width: 100%; height: 100%; object-fit: cover;">
                            </a>
                            <div class="slide-caption">
                                <div class="container">
                                    <div class="caption-content">
                                        <span class="caption-tag">MUSEU</span>
                                        <h2 class="caption-title">Arquitetura e Design</h2>
                                        <p class="caption-text">Espaços pensados para valorizar o Património histórico e cultural</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 8 -->
                    <div class="gallery-slide">
                        <div style="position: relative; height: 700px; overflow: hidden;">
                            <a class="gallery-item" href="{{ asset('assets/img/exhibition/mma_1.jpg') }}" title="Exposição Permanente">
                                <img src="{{ asset('assets/img/exhibition/mma_1.jpg') }}" alt="Exposição Permanente" style="width: 100%; height: 100%; object-fit: cover;">
                            </a>
                            <div class="slide-caption">
                                <div class="container">
                                    <div class="caption-content">
                                        <span class="caption-tag">EXPOSIÇÃO</span>
                                        <h2 class="caption-title">Coleções Permanentes</h2>
                                        <p class="caption-text">Três núcleos expositivos que contam a História de Alcanena</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 9 -->
                    <div class="gallery-slide">
                        <div style="position: relative; height: 700px; overflow: hidden;">
                            <a class="gallery-item" href="{{ asset('assets/img/exhibition/mma_2.jpg') }}" title="Sala do Museu">
                                <img src="{{ asset('assets/img/exhibition/mma_2.jpg') }}" alt="Sala do Museu" style="width: 100%; height: 100%; object-fit: cover;">
                            </a>
                            <div class="slide-caption">
                                <div class="container">
                                    <div class="caption-content">
                                        <span class="caption-tag">DESCOBERTA</span>
                                        <h2 class="caption-title">Percurso Museológico</h2>
                                        <p class="caption-text">Uma viagem fascinante pela História e cultura do concelho</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 10 -->
                    <div class="gallery-slide">
                        <div style="position: relative; height: 700px; overflow: hidden;">
                            <a class="gallery-item" href="{{ asset('assets/img/exhibition/mma_3.jpg') }}" title="Património de Alcanena">
                                <img src="{{ asset('assets/img/exhibition/mma_3.jpg') }}" alt="Património de Alcanena" style="width: 100%; height: 100%; object-fit: cover;">
                            </a>
                            <div class="slide-caption">
                                <div class="container">
                                    <div class="caption-content">
                                        <span class="caption-tag">CULTURA</span>
                                        <h2 class="caption-title">Património de Alcanena</h2>
                                        <p class="caption-text">Inaugurado a 4 de outubro de 2024 - um espaço para todos</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!-- CTA Section -->
        <div class="space bg-title" style="background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%); padding: 80px 0;">
            <div class="container">
                <div class="row align-items-center text-center">
                    <div class="col-lg-12">
                        <div class="wow custom-anim-top" data-wow-duration="1.5s" data-wow-delay="0.1s">
                            <h2 class="sec-title text-white mb-3">Venha Conhecer Pessoalmente</h2>
                            <p class="text-white mb-4" style="font-size: 18px; opacity: 0.9;">
                                Agende a sua visita e descubra 45 mil anos de História de Alcanena
                            </p>
                            <div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
                                <a href="{{ url('/contactos') }}" class="btn" style="padding: 18px 45px; font-size: 16px; font-weight: 600;">
                                    <i class="far fa-calendar-check me-2"></i>AGENDAR VISITA
                                </a>
                                <a href="{{ url('/Coleções') }}" class="btn style2" style="padding: 18px 45px; font-size: 16px; font-weight: 600;">
                                    <i class="fas fa-images me-2"></i>VER Coleções
                                </a>
                            </div>
                            <p class="text-white mt-4 mb-0" style="font-size: 14px; opacity: 0.75;">
                                <i class="fas fa-ticket-alt me-2"></i>Entrada Gratuita | <i class="far fa-clock ms-3 me-2"></i>Quarta a Domingo
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
