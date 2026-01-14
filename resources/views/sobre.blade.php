@extends('layouts.app')

@section('title', 'O Museu - Museu Municipal de Alcanena')

@section('description', 'Conheça o Museu Municipal de Alcanena, um espaço dedicado à preservação, investigação e divulgação do rico Património cultural e histórico do concelho.')

@section('content')
        <!--==============================
        Breadcumb
        ============================== -->
        <div class="breadcumb-wrapper text-center" data-bg-src="{{ asset('assets/img/gallery/DSC_3893.jpg') }}" data-overlay="dark" data-opacity="6" style="background-size: cover; background-position: center; position: relative;">
            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to bottom, rgba(0,0,0,0.5), rgba(0,0,0,0.7));"></div>
            <!-- bg animated image/ -->   
            <div class="container" style="position: relative; z-index: 2;">
                <div class="breadcumb-content">
                    <h1 class="breadcumb-title" style="text-shadow: 2px 2px 8px rgba(0,0,0,0.8);">O museu</h1>
                </div>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('home') }}">Início</a></li>
                    <li class="active">O museu</li>
                </ul>                
            </div>
        </div>

        <!--==============================
        About Area  
        ==============================-->
        <div class="about-page-area space overflow-hidden position-relative">
            <div class="container">
                <div class="row gy-50 gx-60 justify-content-lg-between align-items-center">
                    <div class="col-xl-5">
                        <div class="about-page-thumb wow custom-anim-left" data-wow-duration="1.5s" data-wow-delay="0.1s">
                            <img src="{{ asset('assets/img/gallery/DSC_3932.jpg') }}" alt="Museu Municipal de Alcanena">
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <div class="title-area mb-0 wow custom-anim-left" data-wow-duration="1.5s" data-wow-delay="0.1s">
                            <h2 class="sec-title mb-0">Bem-vindo ao Museu Municipal de Alcanena</h2>
                            <p class="sec-text mt-20">O Museu Municipal de Alcanena é um espaço dedicado à preservação, investigação e divulgação do rico Património cultural e histórico do concelho de Alcanena. Situado no coração da vila, o museu desempenha um papel fundamental na valorização da identidade local e na promoção do conhecimento sobre as tradições, História e cultura da região.</p>
                            <p class="sec-text mt-30">Através de exposições permanentes e temporárias, o museu oferece aos visitantes uma viagem fascinante pelo passado, presente e futuro de Alcanena, apresentando Coleções que abrangem arqueologia, etnografia, História local e arte contemporânea. O espaço museológico constitui um importante recurso educativo e cultural, acolhendo regularmente atividades pedagógicas, conferências, workshops e eventos culturais que envolvem toda a comunidade.</p>
                        </div>
                    </div>
                    
                </div> 
                <div class="mt-100">
                    <div class="row gy-50 gx-60 justify-content-xl-between align-items-center flex-row-reverse">
                        <div class="col-xl-6 text-xl-end">
                            <div class="about-page-thumb wow custom-anim-left" data-wow-duration="1.5s" data-wow-delay="0.1s">
                                <img src="{{ asset('assets/img/gallery/DSC_3946.jpg') }}" alt="Missão do Museu">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="title-area mb-0 wow custom-anim-left" data-wow-duration="1.5s" data-wow-delay="0.1s">
                                <h2 class="sec-title mb-0">Missão e Valores</h2>
                                <p class="sec-text mt-20">A nossa missão é preservar, estudar e divulgar o Património cultural de Alcanena, tornando-o acessível a todos os públicos. Procuramos criar pontes entre o passado e o presente, contribuindo para o reforço da identidade local e para a formação cultural da comunidade.</p>
                                <p class="sec-text mt-30">Valorizamos a investigação rigorosa, a educação contínua e o envolvimento ativo com a população. O museu assume-se como um espaço vivo e dinâmico, aberto à inovação e ao diálogo intercultural, promovendo a reflexão crítica sobre o Património e a sua relevância na sociedade contemporânea. Através de parcerias com instituições culturais, escolas e associações locais, trabalhamos para tornar o museu um verdadeiro centro de conhecimento e partilha.</p>
                            </div>
                        </div>
                        
                    </div>               
                </div>
            </div>
        </div>
        
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
                            <a class="btn style2" href="event.html">VER TODAS AS EXPOSIÇÕES</a>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center exhibition-wrap-1 gy-40 gx-30">
                    <div class="col-lg-4 col-md-6 exhibition-card-wrap">
                        <div class="exhibition-card gtop">
                            <div class="exhibition-card-thumb">
                                <img src="{{ asset('assets/img/exhibition/mma_1.jpg') }}" alt="Exposição">
                            </div>
                            <div class="exhibition-card-details">
                                <div class="post-meta-item blog-meta">
                                    <a href="event.html">EXPOSIÇÃO PERMANENTE</a>
                                </div>
                                <h3 class="event-card-title"><a href="event.html">Património Local</a></h3>
                                <a class="btn style2" href="event.html">VER DETALHES</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 exhibition-card-wrap">
                        <div class="exhibition-card gtop">
                            <div class="exhibition-card-thumb">
                                <img src="{{ asset('assets/img/exhibition/mma_2.jpg') }}" alt="Exposição">
                            </div>
                            <div class="exhibition-card-details">
                                <div class="post-meta-item blog-meta">
                                    <a href="event.html">EXPOSIÇÃO TEMPORÁRIA</a>
                                </div>
                                <h3 class="event-card-title"><a href="event.html">Arte Contemporânea</a></h3>
                                <a class="btn style2" href="event.html">VER DETALHES</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 exhibition-card-wrap">
                        <div class="exhibition-card gtop">
                            <div class="exhibition-card-thumb">
                                <img src="{{ asset('assets/img/exhibition/mma_3.jpg') }}" alt="Exposição">
                            </div>
                            <div class="exhibition-card-details">
                                <div class="post-meta-item blog-meta">
                                    <a href="event.html">EXPOSIÇÃO PERMANENTE</a>
                                </div>
                                <h3 class="event-card-title"><a href="event.html">Etnografia Regional</a></h3>
                                <a class="btn style2" href="event.html">VER DETALHES</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
