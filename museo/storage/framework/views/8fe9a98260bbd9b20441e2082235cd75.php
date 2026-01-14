
<!doctype html>
<html class="no-js" lang="pt-PT">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo e($evento['title']); ?> - Museu Municipal de Alcanena</title>
    <?php echo $__env->make('components.css', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</head>


<body>
    <?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div id="smooth-wrapper">
        <div id="smooth-content">

            <div class="breadcumb-wrapper text-center" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('<?php echo e(asset('storage/' . $evento->image)); ?>'); padding: 140px 0 80px; background-position: center; background-size: cover;" >
                <!-- bg animated image/ -->
                <div class="container">
                    <br><br>
                    <br><br>
                    <br><br>
                     <div class="breadcumb-content">
                    <h1 class="breadcumb-title"><?php echo e($evento['title']); ?></h1>
                    <ul class="breadcumb-menu">
                        <li><a href="<?php echo e(url('/')); ?>">INÍCIO</a></li>
                        <li><a href="<?php echo e(url('/eventos')); ?>">EVENTOS</a></li>
                        <li class="active"><?php echo e(strtoupper($evento['title'])); ?></li>
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
                            <i class="far fa-calendar-alt"></i>  <?php echo e($evento->getFormattedDateRange()); ?></a>
                        </h3>
                    </div>
                </div>
                <div class="event-details-thumb">
                  
                    <span class="tag"><?php echo e($evento['type']); ?></span>
                    <?php if($evento['status'] == 'A decorrer'): ?>
                        <span class="tag status-badge" style="background: #28a745; left: auto; right: 20px;"><?php echo e($evento['status']); ?></span>
                    <?php elseif($evento['status'] == 'Brevemente'): ?>
                        <span class="tag status-badge" style="background: #d4a574; left: auto; right: 20px;"><?php echo e($evento['status']); ?></span>
                    <?php endif; ?>
                </div>
                <div class="row gx-60">
                    <div class="col-xl-4 sidebar-widget-area mt-50">
                        <aside class="sidebar-sticky-area sidebar-area">
                            <div class="widget widget-project-details">
                                <h3 class="widget_title">Informações do Evento</h3>
                                
                                <?php if(isset($evento['Horário_funcionamento'])): ?>
                                <div class="info-item">
                                    <h4 class="fw-medium mt-20 mb-10"><i class="far fa-clock text-theme"></i> Horário</h4>
                                    <p class="mb-0"><?php echo e($evento['Horário_funcionamento']); ?></p>
                                </div>
                                <?php endif; ?>

                                <?php if(isset($evento['localizacao'])): ?>
                                <div class="info-item">
                                    <h4 class="fw-medium mt-20 mb-10"><i class="fas fa-map-marker-alt text-theme"></i> Localização</h4>
                                    <p class="mb-0"><?php echo e($evento['localizacao']); ?></p>
                                </div>
                                <?php endif; ?>

                                <?php if(isset($evento['entrada'])): ?>
                                <div class="info-item">
                                    <h4 class="fw-medium mt-20 mb-10"><i class="fas fa-ticket-alt text-theme"></i> Entrada</h4>
                                    <p class="mb-0"><?php echo e($evento['entrada']); ?></p>
                                </div>
                                <?php endif; ?>

                                <?php if(isset($evento['curador'])): ?>
                                <div class="info-item">
                                    <h4 class="fw-medium mt-20 mb-10"><i class="fas fa-user-tie text-theme"></i> Curadoria</h4>
                                    <p class="mb-0"><?php echo e($evento['curador']); ?></p>
                                </div>
                                <?php endif; ?>

                                <?php if(isset($evento['parceiros'])): ?>
                                <div class="info-item">
                                    <h4 class="fw-medium mt-20 mb-10"><i class="fas fa-handshake text-theme"></i> Parceiros</h4>
                                    <p class="mb-0"><?php echo e($evento['parceiros']); ?></p>
                                </div>
                                <?php endif; ?>

                                <div class="btn-wrap mt-30">
                                    <a href="<?php echo e(url('/agendar-visita?evento=' . $evento['slug'])); ?>" class="btn">
                                       AGENDAR VISITA
                                    </a>
                                </div>

                                <div class="share-wrap mt-30">
                                    <h4 class="fw-medium mb-15">Partilhar Evento</h4>
                                    <div class="social-btn style2">
                                        <a href="https://facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(url()->current())); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="https://twitter.com/intent/tweet?url=<?php echo e(urlencode(url()->current())); ?>&text=<?php echo e(urlencode($evento['titulo'])); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="https://wa.me/?text=<?php echo e(urlencode($evento['titulo'] . ' - ' . url()->current())); ?>" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                        <a href="mailto:?subject=<?php echo e(urlencode($evento['titulo'])); ?>&body=<?php echo e(urlencode(url()->current())); ?>"><i class="fas fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="col-xl-8">
                        <div class="portfolio-details-wrap mt-40">
                            <h2 class="fw-semibold mb-20">Sobre o Evento</h2>
                            <?php echo nl2br(e($evento['description'])); ?>


                            <?php if(isset($evento['galeria']) && count($evento['galeria']) > 0): ?>
                            <h3 class="fw-semibold mt-40 mb-20">Galeria</h3>
                            <div class="row gy-4">
                                <?php $__currentLoopData = $evento['galeria']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imagem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-6">
                                    <div class="event-details-thumb">
                                        <a href="<?php echo e(asset($imagem['url'])); ?>" class="popup-image">
                                            <img class="w-100" src="<?php echo e(asset($imagem['url'])); ?>" alt="<?php echo e($imagem['titulo']); ?>">
                                        </a>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Outros Eventos -->
        <?php if(isset($outros_eventos) && count($outros_eventos) > 0): ?>
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
                    <?php $__currentLoopData = $outros_eventos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $outro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="event-highlight-card">
                            <div class="event-highlight-img">
                                <img src="<?php echo e(asset($outro['imagem'])); ?>" alt="<?php echo e($outro['titulo']); ?>">
                                <div class="event-highlight-overlay">
                                    <a href="<?php echo e(url('/eventos/' . $outro['slug'])); ?>" class="event-link-btn">
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                                <?php if($outro['status'] == 'A decorrer'): ?>
                                    <span class="event-status-badge active"><?php echo e($outro['status']); ?></span>
                                <?php elseif($outro['status'] == 'Brevemente'): ?>
                                    <span class="event-status-badge upcoming"><?php echo e($outro['status']); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="event-highlight-content">
                                <span class="event-type-tag"><?php echo e($outro['tipo']); ?></span>
                                <h3 class="event-highlight-title">
                                    <a href="<?php echo e(url('/eventos/' . $outro['slug'])); ?>"><?php echo e($outro['titulo']); ?></a>
                                </h3>
                                <div class="event-highlight-meta">
                                    <div class="meta-item">
                                        <i class="far fa-calendar-alt"></i>
                                        <span><?php echo e($outro['data']); ?></span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="far fa-clock"></i>
                                        <span><?php echo e($outro['Horário']); ?></span>
                                    </div>
                                </div>
                                <a href="<?php echo e(url('/eventos/' . $outro['slug'])); ?>" class="event-more-btn">
                                    Saber Mais <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="text-center mt-50">
                    <a href="<?php echo e(url('/eventos')); ?>" class="btn" style="padding: 16px 45px; font-size: 16px; font-weight: 600;">
                        <i class="far fa-calendar-alt me-2"></i>VER TODOS OS EVENTOS
                    </a>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    </div>

    <!-- Scripts -->
    <script src="<?php echo e(asset('assets/js/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/slick.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/gsap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/ScrollTrigger.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/smooth-scroll.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/odometer.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/wow.min.js')); ?>"></script>

    <script>
        $(document).ready(function() {
            // Magnific Popup para galeria
            $('.popup-image').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                },
                zoom: {
                    enabled: true,
                    duration: 300
                }
            });

            // Hover effect nos cards de features
            $('.feature-card').hover(
                function() {
                    $(this).css({
                        'transform': 'translateX(5px)',
                        'box-shadow': '0 8px 25px rgba(212, 165, 116, 0.2)'
                    });
                },
                function() {
                    $(this).css({
                        'transform': 'translateX(0)',
                        'box-shadow': 'none'
                    });
                }
            );
        });
    </script>

    <style>
        .text-theme {
            color: #d4a574;
        }

        .event-details-thumb {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 40px;
        }

        .event-details-thumb img {
            border-radius: 12px;
        }

        .tag {
            position: absolute;
            top: 20px;
            left: 20px;
            background: #d4a574;
            color: #fff;
            padding: 8px 20px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 14px;
            z-index: 1;
        }

        .status-badge {
            top: 20px;
            right: 20px;
            left: auto;
        }

        .widget-project-details {
            background: #f8f9fa;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .widget_title {
            font-size: 22px;
            color: #1a1a1a;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #d4a574;
        }

        .info-item {
            padding: 15px 0;
            border-bottom: 1px solid #e9ecef;
        }

        .info-item:last-of-type {
            border-bottom: none;
        }

        .info-item h4 {
            font-size: 16px;
            color: #1a1a1a;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-item p {
            color: #666;
            line-height: 1.8;
        }

        .share-wrap {
            padding-top: 20px;
            border-top: 2px solid #e9ecef;
        }

        .social-btn a {
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #d4a574;
            color: #fff;
            border-radius: 50%;
            margin-right: 10px;
            transition: all 0.3s;
        }

        .social-btn a:hover {
            background: #1a1a1a;
            transform: translateY(-3px);
        }

        /* Outros Eventos - Novo Design */
        .event-highlight-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
            transition: all 0.4s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .event-highlight-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(212, 165, 116, 0.25);
        }

        .event-highlight-img {
            position: relative;
            height: 260px;
            overflow: hidden;
        }

        .event-highlight-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .event-highlight-card:hover .event-highlight-img img {
            transform: scale(1.1);
        }

        .event-highlight-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.7) 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .event-highlight-card:hover .event-highlight-overlay {
            opacity: 1;
        }

        .event-link-btn {
            width: 60px;
            height: 60px;
            background: #d4a574;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 20px;
            transform: scale(0);
            transition: all 0.4s ease;
            text-decoration: none;
        }

        .event-highlight-card:hover .event-link-btn {
            transform: scale(1);
        }

        .event-link-btn:hover {
            background: #fff;
            color: #d4a574;
        }

        .event-status-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            padding: 6px 18px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            z-index: 2;
        }

        .event-status-badge.active {
            background: #28a745;
            color: #fff;
        }

        .event-status-badge.upcoming {
            background: #d4a574;
            color: #fff;
        }

        .event-highlight-content {
            padding: 25px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .event-type-tag {
            display: inline-block;
            color: #d4a574;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 12px;
        }

        .event-highlight-title {
            font-size: 20px;
            color: #1a1a1a;
            margin-bottom: 18px;
            line-height: 1.4;
            font-weight: 700;
        }

        .event-highlight-title a {
            color: #1a1a1a;
            text-decoration: none;
            transition: color 0.3s;
        }

        .event-highlight-title a:hover {
            color: #d4a574;
        }

        .event-highlight-meta {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e9ecef;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            color: #666;
        }

        .meta-item i {
            color: #d4a574;
            font-size: 16px;
            width: 20px;
        }

        .event-more-btn {
            margin-top: auto;
            color: #d4a574;
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s;
        }

        .event-more-btn:hover {
            color: #1a1a1a;
            gap: 12px;
        }

        .event-more-btn i {
            font-size: 12px;
            transition: transform 0.3s;
        }

        .event-more-btn:hover i {
            transform: translateX(3px);
        }

        .feature-card {
            transition: all 0.3s;
        }

        .popup-image {
            display: block;
            position: relative;
        }

        .popup-image::after {
            content: '\f00e';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 32px;
            color: #fff;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .popup-image:hover::after {
            opacity: 1;
        }

        .popup-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(212, 165, 116, 0.8);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .popup-image:hover::before {
            opacity: 1;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .breadcumb-wrapper {
                padding: 120px 0 70px !important;
            }
        }
        
        @media (max-width: 768px) {
            .breadcumb-wrapper {
                padding: 110px 0 60px !important;
            }
            
            .breadcumb-title {
                font-size: 32px !important;
            }

            .widget-project-details {
                padding: 25px;
            }
        }
        
        @media (max-width: 576px) {
            .breadcumb-wrapper {
                padding: 100px 0 50px !important;
            }
            
            .breadcumb-title {
                font-size: 28px !important;
            }
        }
    </style>
</body>

</html>
<?php /**PATH C:\laravel_projects\museo\resources\views/evento-detalhes.blade.php ENDPATH**/ ?>