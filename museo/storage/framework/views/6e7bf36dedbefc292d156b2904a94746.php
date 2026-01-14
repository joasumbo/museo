<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title', 'Museu Municipal de Alcanena - Cultura e História'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('description', 'Museu Municipal de Alcanena - Espaço dedicado à preservação e divulgação do património cultural e histórico de Alcanena'); ?>">
    <meta name="keywords" content="<?php echo $__env->yieldContent('keywords', 'Museu, Alcanena, Cultura, História, Património, Exposições, Eventos'); ?>">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('assets/img/favicons/favicon.png')); ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo e(asset('assets/img/favicons/ms-icon-144x144.png')); ?>">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/magnific-popup.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/slick.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/odometer.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
</head>

<body>
    <!-- Cursor -->
    <div class="cursor"></div>
    <div class="cursor-follower"></div>
    <!-- Cursor End -->

    <?php echo $__env->make('components.preloader', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('components.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <?php echo $__env->yieldContent('content'); ?>
    
    <?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <!-- Scroll To Top -->
    <div class="scroll-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
        </svg>
    </div>
    
    <script src="<?php echo e(asset('assets/js/vendor/jquery-3.7.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/slick.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.counterup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/imagesloaded.pkgd.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/isotope.pkgd.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/gsap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/circle-progress.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/ScrollTrigger.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/ScrollSmoother.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/SplitText.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/ScrollToPlugin.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.marquee.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/waypoints.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/wow.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>
</body>

</html>
<?php /**PATH C:\laravel_projects\museo\resources\views/layouts/app.blade.php ENDPATH**/ ?>