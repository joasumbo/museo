<!doctype html>
<html class="no-js" lang="pt-PT">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sobre Nós - Museu Municipal de Alcanena - Cultura e História</title>
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

    @include('layouts.navbar')
    
    <div id="smooth-wrapper">
        <div id="smooth-content">
        <!--==============================
        Breadcumb
        ============================== -->
        <div class="breadcumb-wrapper text-center" data-bg-src="{{ asset('assets/img/gallery/DSC_3893.jpg') }}" data-overlay="dark" data-opacity="6" style="background-size: cover; background-position: center; position: relative;">
            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to bottom, rgba(0,0,0,0.5), rgba(0,0,0,0.7));"></div>
            <!-- bg animated image/ -->   
            <div class="container" style="position: relative; z-index: 2;">
                <div class="breadcumb-content">
                    <h1 class="breadcumb-title" style="text-shadow: 2px 2px 8px rgba(0,0,0,0.8);">O Museu</h1>
                </div>
                <ul class="breadcumb-menu">
                    <li><a href="index.html">INÍCIO</a></li>
                    <li class="active">O MUSEU</li>
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
                                <div class="shadow-text">História</div>
                            </div>
                            <div class="exhibition-card-details">
                                <div class="post-meta-item blog-meta">
                                    <a href="event.html">EXPOSIÇÃO PERMANENTE</a>
                                    <a href="event.html">10:00 - 18:00</a>
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
                                <div class="shadow-text">Cultura</div>
                            </div>
                            <div class="exhibition-card-details">
                                <div class="post-meta-item blog-meta">
                                    <a href="event.html">EXPOSIÇÃO TEMPORÁRIA</a>
                                    <a href="event.html">10:00 - 18:00</a>
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
                                <div class="shadow-text">Tradição</div>
                            </div>
                            <div class="exhibition-card-details">
                                <div class="post-meta-item blog-meta">
                                    <a href="event.html">EXPOSIÇÃO PERMANENTE</a>
                                    <a href="event.html">10:00 - 18:00</a>
                                </div>
                                <h3 class="event-card-title"><a href="event.html">Etnografia Regional</a></h3>
                                <a class="btn style2" href="event.html">VER DETALHES</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--==============================
            FooTerçarea
        ==============================-->
        <footer class="footer-wrapper footer-layout2 space-top overflow-hidden"> 
            <div class="container">
                <div class="footer-top text-center">
                    <p class="subtitle">Through Museum Tours and Talks</p>
                    <h2 class="title text-white">GET IN TOUCH</h2>
                    <a class="btn" href="contact.html">Let’s Talk!</a>
                </div>
                <div class="widget-area">
                    <div class="row justify-content-xl-between">
                        <div class="col-md-6 col-xl-3 col-lg-4">
                            <div class="widget footer-widget">
                                <div class="widget-about">
                                    <div class="footer-logo">
                                        <img src="{{ asset('assets/img/logo-white.svg') }}" alt="logo">
                                    </div>
                                    <p class="footer-text">Welcome to Artvista, where history comes to life and art speaks volumes.</p>
                                    <div class="payment-card-wrap">
                                        <a href="#"><img src="{{ asset('assets/img/icon/payment-card1.png') }}" alt="img"></a>
                                        <a href="#"><img src="{{ asset('assets/img/icon/payment-card2.png') }}" alt="img"></a>
                                        <a href="#"><img src="{{ asset('assets/img/icon/payment-card3.png') }}" alt="img"></a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-auto col-lg-4">
                            <div class="widget widget_nav_menu footer-widget">
                                <h3 class="widget_title">Quick Links</h3>
                                <div class="menu-all-pages-container">
                                    <ul class="menu">
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="event.html">Exhibitions</a></li>
                                        <li><a href="event.html">Events</a></li>
                                        <li><a href="about.html">About</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-auto col-lg-4">
                            <div class="widget widget_nav_menu footer-widget">
                                <h3 class="widget_title">Visitor Info  </h3>
                                <div class="menu-all-pages-container">
                                    <ul class="menu">
                                        <li><a href="contact.html">How To find Us</a></li>
                                        <li><a href="contact.html">Get Ticket</a></li>
                                        <li><a href="event.html">Join Events</a></li>
                                        <li><a href="about.html">Tours</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-auto col-lg-4">
                            <div class="widget widget_nav_menu footer-widget">
                                <h3 class="widget_title">Social Info  </h3>
                                <div class="menu-all-pages-container">
                                    <ul class="menu">
                                        <li><a href="https://www.facebook.com/">Facebook</a></li>
                                        <li><a href="https://www.twitter.com/">Twitter</a></li>
                                        <li><a href="https://www.linkedin.com/">Linkedin</a></li>
                                        <li><a href="https://www.instagram.com/">Instagram</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-auto col-lg-4">
                            <div class="widget footer-widget">
                                <div class="widget-contact">
                                    <h3 class="widget_title">Contact Info</h3>
                                    <ul class="contact-info-list">
                                        <li>Open daily,10Am . 10Pm</li>
                                        <li class="text-light">Monday Closed</li>
                                        <li>Rome,125 Ny 21 Kses </li>
                                        <li>artvista@gmail.com</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                                           
                    </div>
                </div>
            </div>
            <div class="copyright-wrap text-center">
                <div class="container">
                    <div class="row gy-3 justify-content-lg-between justify-content-center">
                        <div class="col-lg-auto align-self-center">
                            <p class="copyright-text text-white">© 2024 Artvista All Rights Reserved.</p>
                        </div>
                        <div class="col-lg-auto align-self-center">
                            <div class="footer-links">
                                <ul>
                                    <li><a href="about.html">Security</a></li>
                                    <li><a href="about.html">Privacy & Cookie Policy</a></li>
                                    <li><a href="about.html">Terms of Services</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>                
                </div>
            </div>
        </footer>

        </div>
    </div>

    <!--********************************
			Code End  Here 
	******************************** -->

    <!-- Scroll To Top -->
    <div class="scroll-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
        </svg>
    </div>

    <!--==============================
    All Js File
    ============================== -->
    <!-- Jquery -->
    <script src="{{ asset('assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
    <!-- Slick Slider -->
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Counter Up -->
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <!-- Range Slider -->
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <!-- Marquee JS-->
    <script src="{{ asset('assets/js/jquery.marquee.min.js') }}"></script>

    <!-- Isotope Filter -->
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    
    <!-- ScrollTrigger -->
    <script src="{{ asset('assets/js/ScrollTrigger.min.js') }}"></script>
    <!-- ScrollSmoother -->
    <script src="{{ asset('assets/js/ScrollSmoother.min.js') }}"></script>
    <!-- ScrollToPlugin -->
    <script src="{{ asset('assets/js/ScrollToPlugin.min.js') }}"></script>
    <!-- SplitText -->
    <script src="{{ asset('assets/js/SplitText.min.js') }}"></script>
    <!-- Gsap -->
    <script src="{{ asset('assets/js/gsap.min.js') }}"></script>

    <!-- WOW JS -->
    <script src="{{ asset('assets/js/waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    
    <!-- Main Js File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>