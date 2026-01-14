<!-- Preloader -->
<div class="preloader">
    <div class="preloader-inner">
        <div class="loader-logo">
            <img src="{{ asset('assets/img/Logo_MMA.png') }}" alt="Museu Municipal de Alcanena">
        </div>
        <div class="loader-spinner">
            <div class="spinner"></div>
        </div>
        <p class="loader-text">A carregar...</p>
    </div>
</div>

<!-- Cursor -->
<div class="cursor"></div>
<div class="cursor-follower"></div>

<!-- Sidebar Menu -->
<div class="sidemenu-wrapper">
    <div class="sidemenu-content">
        <button class="closeButton sideMenuCls"><i class="fas fa-times"></i></button>
        <div class="widget footer-widget">
            <div class="widget widget-about footer-widget">
                <div class="footer-logo">
                    <a href="{{ url('/') }}"><img src="{{ asset('assets/img/logo-bordalo-pinheiro-white.svg') }}" alt="Museu Municipal de Alcanena"></a>
                </div>
                <p class="about-text mb-4 text-white">Espaço dedicado à preservação e divulgação do património cultural e histórico de Alcanena.</p>
                
                <p class="footer-text text-white">
                    <a href="tel:+351249580170"><i class="fas fa-phone-alt me-2"></i>+351 249 580 170</a>
                </p>
                <p class="contact-text text-white"><i class="fa fa-map-marker-alt me-2"></i>Rua Pedro Teixeira, nº 8, Alcanena</p>
                <p class="footer-text text-white"><a href="mailto:museu@cm-alcanena.pt"><i class="fas fa-envelope me-2"></i>museu@cm-alcanena.pt</a></p>
                <div class="social-btn style2 mt-30">
                    <a href="https://www.facebook.com/museumunicipaldealcanena"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/museumunicipalalcanena"><i class="fab fa-instagram"></i></a>                           
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mobile Menu -->
<div class="mobile-menu-wrapper">
    <div class="mobile-menu-area text-center">
        <button class="menu-toggle"><i class="fas fa-times"></i></button>
        <div class="mobile-logo">
            <a href="{{ url('/') }}"><img src="{{ asset('assets/img/logo-bordalo-pinheiro-white.svg') }}" alt="Museu Municipal de Alcanena"></a>
        </div>
        <div class="mobile-menu">
            <ul>
                <li>
                    <a href="{{ url('/') }}">Início</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">O Museu</a>
                    <ul class="sub-menu">
                        <li><a href="{{ url('/sobre') }}">Sobre Nós</a></li>
                        <li><a href="{{ url('/colecoes') }}">Coleções</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('/galeria') }}">Galeria</a>
                </li>
                <li>
                    <a href="{{ url('/eventos') }}">Eventos</a>
                </li>
                <li>
                    <a href="{{ url('/horarios') }}">Horários</a>
                </li>
                <li>
                    <a href="{{ url('/contactos') }}">Contactos</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Header -->
<header class="nav-header header-layout1">
    <div class="header-top d-md-block d-none">
        <div class="container">
            <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                <div class="col-auto">
                    <div class="header-links">
                        <ul>
                            <li><svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 11.0312L11.9375 9.71875C11.25 9.40625 10.4688 9.625 10 10.1875L9.15625 11.2188C7.75 10.4062 6.59375 9.25 5.78125 7.875L6.84375 7.03125C7.375 6.5625 7.59375 5.78125 7.3125 5.125L5.96875 2C5.65625 1.28125 4.875 0.875 4.09375 1.0625L1.25 1.71875C0.5 1.875 0 2.53125 0 3.3125C0 10.875 6.125 17 13.6875 17C14.4688 17 15.125 16.5 15.25 15.75L15.9062 12.9062C16.125 12.125 15.7188 11.3438 15 11.0312ZM14.4688 12.5625L13.8125 15.4062C13.8125 15.4375 13.75 15.5 13.6875 15.5C6.96875 15.5 1.46875 10.0312 1.46875 3.3125C1.46875 3.25 1.53125 3.1875 1.59375 3.1875L4.4375 2.53125L4.46875 2.5C4.53125 2.5 4.5625 2.5625 4.59375 2.59375L5.90625 5.65625C5.9375 5.71875 5.9375 5.78125 5.875 5.8125L4.34375 7.0625C4.09375 7.28125 4 7.65625 4.15625 7.96875C5.1875 10.0625 6.90625 11.7812 9 12.8125C9.3125 12.9688 9.71875 12.9062 9.9375 12.625L11.1875 11.0938C11.2188 11.0625 11.2812 11.0312 11.3438 11.0625L14.4062 12.375C14.4688 12.4375 14.5 12.5 14.4688 12.5625Z" fill="inherit"/>
                                </svg>
                                <a href="tel:+351249580170">Alguma Questão?</a></li>
                            <li><i class="far fa-envelope"></i><a href="mailto:museu@cm-alcanena.pt">Email: museu@cm-alcanena.pt</a></li>
                            <li><i class="far fa-clock"></i>Ter - Dom: 10:00 - 13:00 | 14:00 - 18:00</li>
                        </ul>
                    </div>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <div class="header-links header-links-right">
                        <ul>
                            <li>
                                <button type="button" class="sidebar-btn sideMenuToggler">
                                    <span class="line"></span>                                        
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-wrapper">
        <div class="menu-area">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <div class="header-logo">
                            <a href="{{ url('/') }}"><img src="{{ asset('assets/img/Logo_MMA.png') }}" alt="Museu Municipal de Alcanena" style="max-height: 80px;"></a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <nav class="main-menu d-none d-lg-inline-block">
                            <ul>
                                <li>
                                    <a href="{{ url('/') }}">Início</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">O Museu</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ url('/sobre') }}">Sobre Nós</a></li>
                                        <li><a href="{{ url('/colecoes') }}">Coleções</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ url('/galeria') }}">Galeria</a>
                                </li>
                                <li>
                                    <a href="{{ url('/eventos') }}">Eventos</a>
                                </li>
                                <li>
                                    <a href="{{ url('/horarios') }}">Horários</a>
                                </li>
                                <li>
                                    <a href="{{ url('/contactos') }}">Contactos</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="navbar-right d-inline-flex d-lg-none">
                            <button type="button" class="menu-toggle icon-btn"><i class="fas fa-bars"></i></button>
                        </div>
                    </div>
                    <div class="col-auto d-none d-xl-block">
                        <div class="header-button">
                            <a href="{{ url('/agendar-visita') }}" class="btn d-none d-xl-block">
                                AGENDAR VISITA
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
