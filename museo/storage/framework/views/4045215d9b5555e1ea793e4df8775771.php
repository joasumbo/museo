<!doctype html>
<html class="no-js" lang="pt-PT">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Eventos - Museu Municipal de Alcanena - Cultura e História</title>
    <?php echo $__env->make('components.css', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</head>

<body>
    <!--********************************
   Code Start From Here
 ******************************** -->


    <!-- Cursor -->
    <div class="cursor"></div>
    <div class="cursor-follower"></div>
    <!-- Cursor End -->

    <?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <!--==============================
        Breadcumb
        ============================== -->
            <div class="breadcumb-wrapper text-center" data-bg-src="<?php echo e(asset('assets/img/gallery/DSC_3893.jpg')); ?>">
                <!-- bg animated image/ -->
                <div class="container">
                    <div class="breadcumb-content">
                        <h1 class="breadcumb-title">Eventos</h1>
                    </div>
                    <ul class="breadcumb-menu">
                        <li><a href="/">INÍCIO</a></li>
                        <li class="active">TODOS OS EVENTOS</li>
                    </ul>
                </div>
            </div>

            <!--==============================
        Exhibition Area
        ==============================-->
            <div class="space bg-title">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-8">
                            <div class="title-area">
                                <h2 class="sec-title text-white">Eventos e Exposições</h2>
                            </div>
                        </div>
                       
                    </div>
                    <div class="row justify-content-center exhibition-wrap-1 gy-40 gx-30">
                        <?php $__empty_1 = true; $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-lg-4 col-md-6 exhibition-card-wrap">
                                <div class="exhibition-card">
                                    <div class="exhibition-card-thumb">
                                        <?php if($event->image): ?>
                                            <img src="<?php echo e(asset('storage/' . $event->image)); ?>"
                                                alt="<?php echo e($event->title); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('assets/img/exhibition/default.png')); ?>" alt="Default">
                                        <?php endif; ?>
                                        <div class="shadow-text"><?php echo e($event->getTypeLabel()); ?></div>
                                    </div>
                                    <div class="exhibition-card-details">
                                        <div class="post-meta-item blog-meta">
                                            <a><i class="fas fa-calendar-alt"></i>
                                                <?php echo e($event->getFormattedDateRange()); ?></a>
                                            
                                        </div>
                                        <h3 class="event-card-title">
                                            <a href="<?php echo e(route('eventoShow', $event->slug)); ?>"><?php echo e($event->title); ?></a>
                                        </h3>
                                        <a class="btn style2" href="<?php echo e(route('eventoShow', $event->slug)); ?>">
                                            <?php echo e(strtoupper($event->getTypeLabel())); ?>

                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col-12 text-center">
                                <p class="text-white">Não existem eventos disponíveis de momento.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        </div>
    </div>

    <!--********************************
   Code End  Here
 ******************************** -->

    <?php echo $__env->make('components.js', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>

</html>
<?php /**PATH C:\laravel_projects\museo\resources\views/eventos.blade.php ENDPATH**/ ?>