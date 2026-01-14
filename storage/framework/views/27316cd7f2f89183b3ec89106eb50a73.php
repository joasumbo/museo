

<?php $__env->startSection('title', 'Coleções - Museu Municipal de Alcanena'); ?>
<?php $__env->startSection('description', 'Explore as diversas coleções do Museu Municipal de Alcanena, desde arqueologia até arte contemporânea.'); ?>

<?php $__env->startSection('content'); ?>
<!--==============================
Breadcumb
============================== -->
<?php
    $bgImage = $latestGallery && $latestGallery->image 
        ? url('storage/' . $latestGallery->image) 
        : asset('assets/img/gallery/DSC_3932.jpg');
?>
<div class="breadcumb-wrapper text-center" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('<?php echo e($bgImage); ?>'); background-size: cover; background-position: center; min-height: 400px; display: flex; align-items: center;">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Coleções</h1>
        </div>
        <ul class="breadcumb-menu">
            <li><a href="<?php echo e(route('home')); ?>">Início</a></li>
            <li class="active">Coleções</li>
        </ul>                
    </div>
</div>

<!--==============================
Portfolio Area  
==============================-->
<div class="portfolio-standard-area space overflow-hidden">
    <div class="container">
        <?php if($galleries->count() > 0): ?>
        <div class="row gx-120 gy-120 masonary-active justify-content-center">                    
            <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-6 filter-item">
                <div class="portfolio-card-4">
                    <div class="portfolio-thumb">
                        <a href="<?php echo e(route('colecao.detalhes', $gallery->slug)); ?>">
                            <img src="<?php echo e($gallery->image ? url('storage/' . $gallery->image) : asset('assets/img/portfolio/mma_portfolio_1.jpg')); ?>" alt="<?php echo e($gallery->title); ?>">
                        </a>
                    </div>
                    <div class="portfolio-details">
                        <span class="portfilio-card-subtitle">Coleção</span>
                        <h3 class="portfilio-card-title">
                            <a href="<?php echo e(route('colecao.detalhes', $gallery->slug)); ?>"><?php echo e($gallery->title); ?></a>
                        </h3>
                        <?php if($gallery->description): ?>
                        <p class="portfolio-text"><?php echo e(Str::limit($gallery->description, 120)); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php else: ?>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-info text-center" style="padding: 60px 20px;">
                    <i class="fas fa-images" style="font-size: 48px; color: #d4a574; margin-bottom: 20px;"></i>
                    <h3 style="margin-bottom: 15px;">Nenhuma Coleção Disponível</h3>
                    <p style="color: #666; font-size: 16px;">As coleções do museu estão sendo organizadas e estarão disponíveis em breve.</p>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Bravantic\Desktop\Museu Municipal Alcanena\resources\views/colecoes.blade.php ENDPATH**/ ?>