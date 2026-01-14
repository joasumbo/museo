<div class="sidemenu-wrapper">
    <div class="sidemenu-content">
        <button class="closeButton sideMenuCls"><i class="fas fa-times"></i></button>
        <div class="widget footer-widget">
            <div class="widget widget-about footer-widget">
                <div class="footer-logo">
                    <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset('assets/img/logo-bordalo-pinheiro-white.svg')); ?>" alt="Museu Municipal de Alcanena"></a>
                </div>
                <p class="about-text mb-4 text-white">Espaço dedicado à preservação e divulgação do património cultural e histórico de Alcanena.</p>
                
                <p class="footer-text text-white">
                    <a href="tel:+351249580170"><i class="fas fa-phone-alt me-2"></i>+351 249 580 170</a>
                </p>
                <p class="contact-text text-white"><i class="fa fa-map-marker-alt me-2"></i>Rua Pedro Teixeira, nº 8, Alcanena</p>
                <p class="footer-text text-white"><a href="mailto:museu@cm-alcanena.pt"><i class="fas fa-envelope me-2"></i>museu@cm-alcanena.pt</a></p>
                <div class="social-btn style2 mt-30">
                    <a href="https://www.facebook.com/museumunicipaldealcanena" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/museumunicipalalcanena" target="_blank"><i class="fab fa-instagram"></i></a>                           
                </div>
                <form class="newsletter-form mt-40">
                    <div class="form-group">
                        <input class="form-control" type="email" placeholder="Endereço de Email" required="">
                    </div>
                    <button type="submit" class="btn">SUBSCREVER</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="mobile-menu-wrapper">
    <div class="mobile-menu-area text-center">
        <button class="menu-toggle"><i class="fas fa-times"></i></button>
        <div class="mobile-logo">
            <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset('assets/img/logo-bordalo-pinheiro-white.svg')); ?>" alt="Museu Municipal de Alcanena"></a>
        </div>
        <div class="mobile-menu">
            <ul>
                <li><a href="<?php echo e(route('home')); ?>">Início</a></li>
                <li><a href="<?php echo e(route('sobre')); ?>">O Museu</a></li>
                <li><a href="<?php echo e(route('colecoes')); ?>">Coleções</a></li>
                <li><a href="<?php echo e(route('eventos')); ?>">Eventos</a></li>
                <li><a href="<?php echo e(route('horarios')); ?>">Horários</a></li>
                <li><a href="<?php echo e(route('contactos')); ?>">Contactos</a></li>
            </ul>
        </div>
    </div>
</div>
<?php /**PATH C:\laravel_projects\museo\resources\views/components/sidebar.blade.php ENDPATH**/ ?>