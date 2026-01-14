<!doctype html>
<html class="no-js" lang="pt-PT">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Museu Municipal de Alcanena - Cultura e História</title>
    @include('components.css')

</head>

<body>
    <!--********************************
   Code Start From Here
 ******************************** -->


    <!-- Cursor -->
    <div class="cursor"></div>
    <div class="cursor-follower"></div>
    <!-- Cursor End -->

    <!--==============================
     Preloader
    ==============================-->
    <div class="preloader ">
        <div class="preloader-inner">
            <img src="{{ asset('assets/img/logo-bordalo-pinheiro-white.svg') }}" alt="Museu Municipal de Alcanena">
            <span class="loader"></span>
        </div>
    </div>


    <!--==============================
    Mobile Menu
    ============================== -->
    @include('layouts.navbar')

    <div id="smooth-wrapper">
        <div id="smooth-content">
            <!--==============================
        Hero Area
        ==============================-->
            <div class="hero-wrapper hero-1" id="hero-sec">
                <div class="global-carousel hero-slider1" id="heroSlider1" data-fade="true" data-slide-show="1"
                    data-lg-slide-show="1" data-md-slide-show="1" data-sm-slide-show="1" data-xs-slide-show="1"
                    data-arrows="false" data-asnavfor=".hero-custom-dots">
                    <div class="hero-slider">
                        <div class="hero-thumb1" data-ani="slider-custom-anim-left" data-ani-delay="0.1s">
                            <img src="{{ asset('assets/img/hero/hero_mma_2.jpg') }}" alt="Museu Municipal Alcanena">
                        </div>
                        <div class="hero-thumb2" data-ani="slider-custom-anim-right" data-ani-delay="0.1s">
                            <img src="{{ asset('assets/img/hero/hero_mma_3.jpg') }}" alt="Museu Municipal Alcanena">
                        </div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8 col-md-12">
                                    <div class="hero-style1">
                                        <h1 class="hero-title" data-ani="slider-custom-anim-right"
                                            data-ani-delay="0.15s">Museu <span class="text-stroke">Municipal</span></h1>
                                        <h1 class="hero-title" data-ani="slider-custom-anim-left" data-ani-delay="0.2s">
                                            de Alcanena</h1>
                                        <h1 class="hero-title title-bg-thumb"
                                            data-bg-src="{{ asset('assets/img/hero/hero_1_text-bg.png') }}"
                                            data-ani="slider-custom-anim-right" data-ani-delay="0.25s">Cultura &
                                            História</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container text-end">
                    <div class="hero-slider1-controller-wrap">
                        <div class="slides-numbers">
                            <span class="active">01</span> <span class="total"></span>
                        </div>
                        <div class="hero-custom-dots" data-asnavfor=".hero-slider1">
                            <button class="tab-btn active" type="button">
                                <span class="slide-dot"></span>
                            </button>
                        </div>
                        <div class="icon-box" style="display:none;">
                            <button data-slick-prev=".hero-slider1" class="icon-btn">
                                <svg width="24" height="14" viewBox="0 0 24 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.74198 0L0 7L6.74198 14L7.87513 12.8234L3.06758 7.83189L24 7.83189V6.168L3.06773 6.168L7.87513 1.17658L6.74198 0Z"
                                        fill="inherit" />
                                </svg>
                            </button>
                            <button data-slick-next=".hero-slider1" class="icon-btn"><svg width="24" height="14"
                                    viewBox="0 0 24 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.258 14L24 7L17.258 0L16.1249 1.17658L20.9324 6.16811L2.45808e-07 6.16811V7.832L20.9323 7.832L16.1249 12.8234L17.258 14Z"
                                        fill="inherit" />
                                </svg>
                            </button>
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
                        <div class="col-lg-auto">
                            <div class="sec-btn wow custom-anim-right" data-wow-duration="1.5s" data-wow-delay="0.1s">
                                <a class="btn style2" href="{{ route('eventos') }}?type=exhibition">VER TODAS AS
                                    EXPOSIÇÕES</a>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center exhibition-wrap-1 gy-40 gx-30">
                        @forelse($featuredExhibitions as $exhibition)
                            <div class="col-lg-4 col-md-6 exhibition-card-wrap">
                                <div class="exhibition-card gtop">
                                    <div class="exhibition-card-thumb">
                                        @if ($exhibition->image)
                                            <img src="{{ asset('storage/' . $exhibition->image) }}"
                                                alt="{{ $exhibition->title }}">
                                        @else
                                            <img src="{{ asset('assets/img/exhibition/mma_1.jpg') }}" alt="Default">
                                        @endif
                                        <div class="shadow-text">Exposição</div>
                                    </div>
                                    <div class="exhibition-card-details">
                                        <div class="post-meta-item blog-meta">
                                            <a><i class="fas fa-calendar-alt"></i>
                                                {{ $exhibition->getFormattedDateRange() }}</a>
                                            <a><i class="fas fa-clock"></i>
                                                {{ \Carbon\Carbon::parse($exhibition->start_time)->format('H:i') }}</a>
                                        </div>
                                        <h3 class="event-card-title">
                                            <a
                                                href="{{ route('eventoShow', $exhibition->slug) }}">{{ $exhibition->title }}</a>
                                        </h3>
                                        <a class="btn style2"
                                            href="{{ route('eventoShow', $exhibition->slug) }}">SABER MAIS</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center">
                                <p class="text-white">Brevemente novas exposições.</p>
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
                            <div class="title-area wow custom-anim-left" data-wow-duration="1.5s"
                                data-wow-delay="0.1s">
                                <h2 class="sec-title text-white">Nossa Coleção</h2>
                            </div>
                        </div>
                        <div class="col-lg-auto">
                            <div class="icon-box mb-40">
                                <button data-slick-prev=".portfolio-slider1"
                                    class="slick-arrow default">ANTERIOR</button>
                                <button data-slick-next=".portfolio-slider1"
                                    class="slick-arrow default">PRÓXIMO</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid wow custom-anim-top" data-wow-duration="1.5s" data-wow-delay="0.1s">
                    <div class="row global-carousel portfolio-slider1 gx-20" data-slide-show="3">
                        <div class="col-lg-4">
                            <div class="portfolio-card ">
                                <div class="portfolio-thumb">
                                    <a class="popup-image icon-btn"
                                        href="{{ asset('assets/img/portfolio/mma_portfolio_1.jpg') }}"><i
                                            class="far fa-eye"></i></a>
                                    <img src="{{ asset('assets/img/portfolio/mma_portfolio_1.jpg') }}"
                                        alt="portfolio">
                                </div>
                                <div class="portfolio-details">
                                    <h3 class="portfilio-card-title"><a href="#">História Local</a>
                                    </h3>
                                    <!-- <a href="#" class="btn btn-border btn-radius">
                                        VER COLEÇÃO
                                    </a> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="portfolio-card ">
                                <div class="portfolio-thumb">
                                    <a class="popup-image icon-btn"
                                        href="{{ asset('assets/img/portfolio/mma_portfolio_2.jpg') }}"><i
                                            class="far fa-eye"></i></a>
                                    <img src="{{ asset('assets/img/portfolio/mma_portfolio_2.jpg') }}"
                                        alt="portfolio">
                                </div>
                                <div class="portfolio-details">
                                    <h3 class="portfilio-card-title"><a href="#">Arte e Cultura</a>
                                    </h3>
                                    <!-- <a href="#" class="btn btn-border btn-radius">
                                        VER COLEÇÃO
                                    </a> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="portfolio-card ">
                                <div class="portfolio-thumb">
                                    <a class="popup-image icon-btn"
                                        href="{{ asset('assets/img/portfolio/mma_portfolio_3.jpg') }}"><i
                                            class="far fa-eye"></i></a>
                                    <img src="{{ asset('assets/img/portfolio/mma_portfolio_3.jpg') }}"
                                        alt="portfolio">
                                </div>
                                <div class="portfolio-details">
                                    <h3 class="portfilio-card-title"><a href="#">Património
                                            Cultural</a></h3>
                                    <!-- <a href="#" class="btn btn-border btn-radius">
                                        VER COLEÇÃO
                                    </a> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="portfolio-card ">
                                <div class="portfolio-thumb">
                                    <a class="popup-image icon-btn"
                                        href="{{ asset('assets/img/portfolio/mma_portfolio_1.jpg') }}"><i
                                            class="far fa-eye"></i></a>
                                    <img src="{{ asset('assets/img/portfolio/mma_portfolio_1.jpg') }}"
                                        alt="portfolio">
                                </div>
                                <div class="portfolio-details">
                                    <h3 class="portfilio-card-title"><a href="#">História Local</a>
                                    </h3>
                                    <!-- <a href="#" class="btn btn-border btn-radius">
                                        VER COLEÇÃO
                                    </a> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="portfolio-card ">
                                <div class="portfolio-thumb">
                                    <a class="popup-image icon-btn"
                                        href="{{ asset('assets/img/portfolio/mma_portfolio_2.jpg') }}"><i
                                            class="far fa-eye"></i></a>
                                    <img src="{{ asset('assets/img/portfolio/mma_portfolio_2.jpg') }}"
                                        alt="portfolio">
                                </div>
                                <div class="portfolio-details">
                                    <h3 class="portfilio-card-title"><a href="#">Arte e Cultura</a>
                                    </h3>
                                    <!-- <a href="#" class="btn btn-border btn-radius">
                                        VER COLEÇÃO
                                    </a> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="portfolio-card ">
                                <div class="portfolio-thumb">
                                    <a class="popup-image icon-btn"
                                        href="{{ asset('assets/img/portfolio/mma_portfolio_3.jpg') }}"><i
                                            class="far fa-eye"></i></a>
                                    <img src="{{ asset('assets/img/portfolio/mma_portfolio_3.jpg') }}"
                                        alt="portfolio">
                                </div>
                                <div class="portfolio-details">
                                    <h3 class="portfilio-card-title"><a href="#">Património
                                            Cultural</a></h3>
                                    <!-- <a href="#" class="btn btn-border btn-radius">
                                        VER COLEÇÃO
                                    </a> -->
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
                            <div class="title-area wow custom-anim-left" data-wow-duration="1.5s"
                                data-wow-delay="0.1s">
                                <h2 class="sec-title">Próximos Eventos</h2>
                            </div>
                        </div>
                        <div class="col-lg-auto">
                            <div class="sec-btn wow custom-anim-right" data-wow-duration="1.5s"
                                data-wow-delay="0.1s">
                                <a href="{{ route('eventos') }}" class="btn">
                                    VER TODOS OS EVENTOS
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row gy-30">
                        @forelse($events as $event)
                            <div class="col-lg-12">
                                <div class="event-card wow custom-anim-left" data-wow-duration="1.5s"
                                    data-wow-delay="0.1s">
                                    <div class="event-card-date">
                                        <span class="date">
                                            {{ $event->start_date->format('d') }}
                                        </span>
                                        {{ $event->start_date->locale('pt')->translatedFormat('F, Y') }}
                                    </div>

                                    <div class="event-card-details">
                                        <h3 class="event-card-title">
                                            <a href="{{ route('eventoShow', $event->slug) }}">
                                                {{ $event->title }}
                                            </a>
                                        </h3>

                                        <span class="event-card-location">
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{ $event->location ?? 'Museu Municipal' }}
                                        </span>

                                        @if ($event->start_time)
                                            <span class="event-card-time">
                                                <i class="far fa-clock"></i>
                                                {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }}
                                            </span>
                                        @endif

                                        <a href="{{ route('eventoShow', $event->slug) }}" class="btn">
                                            SABER MAIS
                                        </a>
                                    </div>

                                    <div class="event-card-thumb">
                                        @if ($event->image)
                                            <img src="{{ asset('storage/' . $event->image) }}"
                                                alt="{{ $event->title }}">
                                        @else
                                            <img src="{{ asset('assets/img/event/mma_event_1.jpg') }}"
                                                alt="{{ $event->title }}">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-lg-12">
                                <div class="alert alert-info text-center">
                                    <p>Não há eventos programados no momento. Volte em breve para descobrir as nossas
                                        próximas exposições e atividades!</p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!--==============================
        Product Area - DESATIVADA (Sem loja online)
        ==============================-->
            <!-- <div class="product-area-1 space overflow-hidden" style="display:none;">
            <div class="container">
                <div class="title-area text-center wow custom-anim-top" data-wow-duration="1.5s" data-wow-delay="0.1s">
                    <span class="sub-title">OUR ONLINE SHOP</span>
                    <h2 class="sec-title">Our Online Products</h2>
                </div>
                <div class="row gy-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="product-card wow custom-anim-top" data-wow-duration="1.5s" data-wow-delay="0.1s">
                            <div class="product-img">
                                <span class="tag">Sculptor</span>
                                <img src="{{ asset('assets/img/product/1-1.png') }}" alt="Product Image">
                                <div class="actions">
                                    <a href="cart.html" class="icon-btn"><i class="fas fa-shopping-cart"></i></a>
                                    <a href="wishlist.html" class="icon-btn"><i class="far fa-heart"></i></a>
                                    <a href="#QuickView" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <span class="price">$250.00 <del>$550.00</del></span>
                                <h3 class="product-title"><a href="shop-details.html">Lady Seraphina</a></h3>
                                <div class="star-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="product-card wow custom-anim-top" data-wow-duration="1.5s" data-wow-delay="0.1s">
                            <div class="product-img">
                                <span class="tag">Sculptor</span>
                                <img src="{{ asset('assets/img/product/1-2.png') }}" alt="Product Image">
                                <div class="actions">
                                    <a href="cart.html" class="icon-btn"><i class="fas fa-shopping-cart"></i></a>
                                    <a href="wishlist.html" class="icon-btn"><i class="far fa-heart"></i></a>
                                    <a href="#QuickView" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <span class="price">$150.00 <del>$550.00</del></span>
                                <h3 class="product-title"><a href="shop-details.html">Nova Byte</a></h3>
                                <div class="star-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="product-card wow custom-anim-top" data-wow-duration="1.5s" data-wow-delay="0.1s">
                            <div class="product-img">
                                <span class="tag">Sculptor</span>
                                <img src="{{ asset('assets/img/product/1-3.png') }}" alt="Product Image">
                                <div class="actions">
                                    <a href="cart.html" class="icon-btn"><i class="fas fa-shopping-cart"></i></a>
                                    <a href="wishlist.html" class="icon-btn"><i class="far fa-heart"></i></a>
                                    <a href="#QuickView" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <span class="price">$260.00 <del>$550.00</del></span>
                                <h3 class="product-title"><a href="shop-details.html">Synth Sphere</a></h3>
                                <div class="star-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="product-card wow custom-anim-top" data-wow-duration="1.5s" data-wow-delay="0.1s">
                            <div class="product-img">
                                <span class="tag">Sculptor</span>
                                <img src="{{ asset('assets/img/product/1-4.png') }}" alt="Product Image">
                                <div class="actions">
                                    <a href="cart.html" class="icon-btn"><i class="fas fa-shopping-cart"></i></a>
                                    <a href="wishlist.html" class="icon-btn"><i class="far fa-heart"></i></a>
                                    <a href="#QuickView" class="icon-btn popup-content"><i class="far fa-eye"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <span class="price">$250.00 <del>$550.00</del></span>
                                <h3 class="product-title"><a href="shop-details.html">NeoGlow Ahe</a></h3>
                                <div class="star-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

            <!--==============================
        Planeie a Sua Visita - CTA Section
        ==============================-->
            <div class="space bg-title"
                style="background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%); padding: 80px 0;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <div class="wow custom-anim-left" data-wow-duration="1.5s" data-wow-delay="0.1s">
                                <h2 class="sec-title text-white mb-3">Planeie a Sua Visita</h2>
                                <p class="text-white mb-2" style="font-size: 18px;">
                                    <i class="far fa-clock me-2"></i><strong>Terça a Domingo:</strong> 10:00-13:00 |
                                    14:00-18:00
                                </p>
                                <p class="text-white mb-3" style="font-size: 16px; opacity: 0.9;">
                                    <i class="fas fa-times-circle me-2"></i>Segunda-feira: Encerrado
                                </p>
                                <p class="text-white" style="font-size: 15px; opacity: 0.8;">
                                    <i class="fas fa-map-marker-alt me-2"></i>Rua Pedro Teixeira, nº 8, 2380-077
                                    Alcanena
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 text-lg-end text-center">
                            <div class="wow custom-anim-right" data-wow-duration="1.5s" data-wow-delay="0.2s">
                                <a href="{{ route('agendar.visita') }}" class="btn"
                                    style="padding: 18px 45px; font-size: 16px; font-weight: 600;">
                                    <i class="far fa-calendar-check me-2"></i>AGENDAR VISITA
                                </a>
                                <p class="text-white mt-3 mb-0" style="font-size: 14px; opacity: 0.8;">
                                    <i class="fas fa-phone-alt me-2"></i>+351 249 580 170 | <i
                                        class="fas fa-envelope ms-2 me-2"></i>museu@cm-alcanena.pt
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--==============================
        <!--==============================
            FooTerçarea
        ==============================-->


        </div>
    </div>

    <!--********************************
   Code End  Here
 ******************************** -->
    @include('components.js')
</body>

</html>
