<!doctype html>
<html class="no-js" lang="pt-PT">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Coleções - Museu Municipal de Alcanena - Cultura e História</title>
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
                    <h1 class="breadcumb-title">Portfolio </h1>
                </div>
                <ul class="breadcumb-menu">
                    <li><a href="index.html">MAIN HOME</a></li>
                    <li class="active">PORTFOLIO STANDARD</li>
                </ul>                
            </div>
        </div>

        <!--==============================
        Portfolio Area  
        ==============================-->
        <div class="portfolio-standard-area space overflow-hidden">
            <div class="container">
                <div class="row gx-120 gy-120 masonary-active justify-content-center">                    
                    
                    <div class="col-lg-6 filter-item">
                        <div class="portfolio-card-4">
                            <div class="portfolio-thumb">
                                <a href="project-details.html">
                                    <img src="<?php echo e(asset('assets/img/portfolio/portfolio_page1_3.png')); ?>" alt="portfolio">
                                </a>
                            </div>
                            <div class="portfolio-details">
                                <span class="portfilio-card-subtitle">Culture Canvas</span>
                                <h3 class="portfilio-card-title"><a href="project-details.html" tabindex="0">Museum's Gallery Log Unraveling the Stories and Significance </a></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 filter-item">
                        <div class="portfolio-card-4">
                            <div class="portfolio-thumb">
                                <a href="project-details.html">
                                    <img src="<?php echo e(asset('assets/img/portfolio/portfolio_page1_4.png')); ?>" alt="portfolio">
                                </a>
                            </div>
                            <div class="portfolio-details">
                                <span class="portfilio-card-subtitle">Culture Canvas</span>
                                <h3 class="portfilio-card-title"><a href="project-details.html" tabindex="0">The Stories Behind Each Brushstro Comprehensive Gallery Log</a></h3>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 filter-item">
                        <div class="portfolio-card-4">
                            <div class="portfolio-thumb">
                                <a href="project-details.html">
                                    <img src="<?php echo e(asset('assets/img/portfolio/portfolio_page1_5.png')); ?>" alt="portfolio">
                                </a>
                            </div>
                            <div class="portfolio-details">
                                <span class="portfilio-card-subtitle">Culture Canvas</span>
                                <h3 class="portfilio-card-title"><a href="project-details.html" tabindex="0">Recording the Colorful and Varied Exhibitions Gracing Museum's</a></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 filter-item">
                        <div class="portfolio-card-4">
                            <div class="portfolio-thumb">
                                <a href="project-details.html">
                                    <img src="<?php echo e(asset('assets/img/portfolio/portfolio_page1_6.png')); ?>" alt="portfolio">
                                </a>
                            </div>
                            <div class="portfolio-details">
                                <span class="portfilio-card-subtitle">Culture Canvas</span>
                                <h3 class="portfilio-card-title"><a href="project-details.html" tabindex="0">A Fascinating Exploration of Our Museum's Diverse Collections </a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 filter-item">
                        <div class="portfolio-card-4">
                            <div class="portfolio-thumb">
                                <a href="project-details.html">
                                    <img src="<?php echo e(asset('assets/img/portfolio/portfolio_page1_1.png')); ?>" alt="portfolio">
                                </a>
                            </div>
                            <div class="portfolio-details">
                                <span class="portfilio-card-subtitle">Culture Canvas</span>
                                <h3 class="portfilio-card-title"><a href="project-details.html" tabindex="0">A Comprehensive Artistic and Historical Significance of</a></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 filter-item">
                        <div class="portfolio-card-4">
                            <div class="portfolio-thumb">
                                <a href="project-details.html">
                                    <img src="<?php echo e(asset('assets/img/portfolio/portfolio_page1_2.png')); ?>" alt="portfolio">
                                </a>
                            </div>
                            <div class="portfolio-details">
                                <span class="portfilio-card-subtitle">Culture Canvas</span>
                                <h3 class="portfilio-card-title"><a href="project-details.html" tabindex="0">Through Time Depth Our Museum Some Exhibitions  Housed Within </a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--==============================
            FooTerçarea
        ==============================-->
      <?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        </div>
    </div>

    <!--********************************
			Code End  Here 
	******************************** -->

 <?php echo $__env->make('components.js', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>

</html><?php /**PATH C:\laravel_projects\museo\resources\views/colecoes.blade.php ENDPATH**/ ?>