

<?php $__env->startSection('title', $event->title . ' - Museu Municipal de Alcanena'); ?>

<?php $__env->startSection('content'); ?>
<!-- Breadcrumb -->
<div class="breadcumb-wrapper text-center" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('<?php echo e($event->image ? url('storage/' . $event->image) : asset('assets/img/gallery/DSC_3932.jpg')); ?>'); background-size: cover; background-position: center; min-height: 300px; display: flex; align-items: center;">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title" style="font-size: 36px;"><?php echo e($event->title); ?></h1>
        </div>
        <ul class="breadcumb-menu">
            <li><a href="<?php echo e(route('home')); ?>">Início</a></li>
            <li><a href="<?php echo e(route('eventos')); ?>">Eventos</a></li>
            <li class="active"><?php echo e(Str::limit($event->title, 30)); ?></li>
        </ul>                
    </div>
</div>

<!-- Event Details -->
<div class="space" style="padding: 60px 0;">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="event-info-box" style="background: #f8f9fa; padding: 30px; border-radius: 10px; position: sticky; top: 100px;">
                    <h3 style="font-size: 22px; margin-bottom: 25px; color: #1a1a1a;">Informações do Evento</h3>
                    
                    <div class="info-item" style="margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid #e0e0e0;">
                        <div style="display: flex; gap: 12px; align-items: flex-start;">
                            <i class="far fa-calendar" style="color: #d4a574; font-size: 20px; margin-top: 3px;"></i>
                            <div>
                                <h5 style="font-size: 14px; color: #999; margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Data</h5>
                                <p style="margin: 0; color: #333; font-size: 15px;">
                                    <?php echo e(\Carbon\Carbon::parse($event->start_date)->locale('pt')->translatedFormat('d \d\e F \d\e Y')); ?>

                                    <?php if($event->end_date && $event->end_date != $event->start_date): ?>
                                        <br><small style="color: #666;">até <?php echo e(\Carbon\Carbon::parse($event->end_date)->locale('pt')->translatedFormat('d/m/Y')); ?></small>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <?php if($event->start_time): ?>
                    <div class="info-item" style="margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid #e0e0e0;">
                        <div style="display: flex; gap: 12px; align-items: flex-start;">
                            <i class="far fa-clock" style="color: #d4a574; font-size: 20px; margin-top: 3px;"></i>
                            <div>
                                <h5 style="font-size: 14px; color: #999; margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Horário</h5>
                                <p style="margin: 0; color: #333; font-size: 15px;">
                                    <?php echo e(substr($event->start_time, 0, 5)); ?>

                                    <?php if($event->end_time): ?>
                                        - <?php echo e(substr($event->end_time, 0, 5)); ?>

                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if($event->location): ?>
                    <div class="info-item" style="margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid #e0e0e0;">
                        <div style="display: flex; gap: 12px; align-items: flex-start;">
                            <i class="fas fa-map-marker-alt" style="color: #d4a574; font-size: 20px; margin-top: 3px;"></i>
                            <div>
                                <h5 style="font-size: 14px; color: #999; margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Localização</h5>
                                <p style="margin: 0; color: #333; font-size: 15px;"><?php echo e($event->location); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="info-item" style="margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid #e0e0e0;">
                        <div style="display: flex; gap: 12px; align-items: flex-start;">
                            <i class="fas fa-ticket-alt" style="color: #d4a574; font-size: 20px; margin-top: 3px;"></i>
                            <div>
                                <h5 style="font-size: 14px; color: #999; margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Entrada</h5>
                                <p style="margin: 0; color: #333; font-size: 15px;">
                                    <?php if($event->is_free): ?>
                                        <span style="color: #28a745; font-weight: 600;">Gratuita</span>
                                    <?php else: ?>
                                        <?php echo e(number_format($event->price, 2, ',', '.')); ?>€
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="info-item" style="margin-bottom: 25px;">
                        <div style="display: flex; gap: 12px; align-items: flex-start;">
                            <i class="fas fa-tag" style="color: #d4a574; font-size: 20px; margin-top: 3px;"></i>
                            <div>
                                <h5 style="font-size: 14px; color: #999; margin-bottom: 5px; font-weight: 600; text-transform: uppercase;">Categoria</h5>
                                <span style="display: inline-block; background: #d4a574; color: #fff; padding: 5px 15px; border-radius: 20px; font-size: 13px; font-weight: 600;">
                                    <?php echo e($event->getTypeLabel()); ?>

                                </span>
                            </div>
                        </div>
                    </div>

                    <a href="<?php echo e(route('agendar.visita')); ?>" class="btn w-100 mb-3" style="padding: 14px; font-size: 15px;">
                        <i class="far fa-calendar-check me-2"></i>AGENDAR VISITA
                    </a>

                    <a href="<?php echo e(route('contactos')); ?>" class="btn style-border w-100" style="padding: 14px; font-size: 15px;">
                        <i class="fas fa-envelope me-2"></i>CONTACTAR
                    </a>
                </div>
            </div>

            <!-- Content -->
            <div class="col-lg-8">
                <!-- Event Image -->
                <?php if($event->image): ?>
                <div class="event-image" style="margin-bottom: 30px; border-radius: 10px; overflow: hidden; max-height: 450px;">
                    <img src="<?php echo e(url('storage/' . $event->image)); ?>" alt="<?php echo e($event->title); ?>" style="width: 100%; height: 450px; object-fit: cover;">
                    <div style="position: relative; margin-top: -50px;">
                        <span class="event-badge" style="position: relative; z-index: 2; display: inline-block; background: rgba(212, 165, 116, 0.95); color: #fff; padding: 10px 25px; border-radius: 30px; font-size: 13px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase; margin-left: 20px;">
                            <?php echo e($event->getTypeLabel()); ?>

                        </span>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Event Title & Meta -->
                <div style="margin-bottom: 30px;">
                    <div style="display: flex; gap: 20px; align-items: center; margin-bottom: 15px; flex-wrap: wrap;">
                        <span style="color: #666; font-size: 15px;">
                            <i class="far fa-calendar-alt" style="color: #d4a574; margin-right: 5px;"></i>
                            <?php echo e(\Carbon\Carbon::parse($event->start_date)->locale('pt')->translatedFormat('d \d\e F, Y')); ?>

                        </span>
                        <?php if($event->start_time): ?>
                        <span style="color: #666; font-size: 15px;">
                            <i class="far fa-clock" style="color: #d4a574; margin-right: 5px;"></i>
                            <?php echo e(substr($event->start_time, 0, 5)); ?>

                        </span>
                        <?php endif; ?>
                    </div>
                    <h2 style="font-size: 32px; margin-bottom: 15px; color: #1a1a1a; line-height: 1.3;"><?php echo e($event->title); ?></h2>
                    <?php if($event->short_description): ?>
                    <p style="font-size: 18px; color: #666; line-height: 1.6;"><?php echo e($event->short_description); ?></p>
                    <?php endif; ?>
                </div>

                <!-- Event Description -->
                <div class="event-content" style="margin-bottom: 40px;">
                    <h3 style="font-size: 24px; margin-bottom: 20px; color: #1a1a1a;">Sobre o Evento</h3>
                    <div style="color: #555; font-size: 16px; line-height: 1.8;">
                        <?php echo nl2br(e($event->description)); ?>

                    </div>
                </div>

                <!-- Share -->
                <div class="share-section" style="background: #f8f9fa; padding: 25px; border-radius: 10px; margin-bottom: 40px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
                        <h4 style="margin: 0; font-size: 16px; color: #1a1a1a;">Partilhar este evento:</h4>
                        <div style="display: flex; gap: 10px;">
                            <a href="https://facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(route('evento.detalhes.bd', $event->slug))); ?>" target="_blank" style="width: 40px; height: 40px; border-radius: 50%; background: #3b5998; display: flex; align-items: center; justify-content: center; color: #fff; transition: transform 0.3s;">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url=<?php echo e(urlencode(route('evento.detalhes.bd', $event->slug))); ?>&text=<?php echo e(urlencode($event->title)); ?>" target="_blank" style="width: 40px; height: 40px; border-radius: 50%; background: #1da1f2; display: flex; align-items: center; justify-content: center; color: #fff; transition: transform 0.3s;">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://wa.me/?text=<?php echo e(urlencode($event->title . ' - ' . route('evento.detalhes.bd', $event->slug))); ?>" target="_blank" style="width: 40px; height: 40px; border-radius: 50%; background: #25d366; display: flex; align-items: center; justify-content: center; color: #fff; transition: transform 0.3s;">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="mailto:?subject=<?php echo e(urlencode($event->title)); ?>&body=<?php echo e(urlencode(route('evento.detalhes.bd', $event->slug))); ?>" style="width: 40px; height: 40px; border-radius: 50%; background: #666; display: flex; align-items: center; justify-content: center; color: #fff; transition: transform 0.3s;">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Outros Eventos -->
<?php
    $otherEvents = \App\Models\Event::where('is_active', true)
        ->where('id', '!=', $event->id)
        ->where('start_date', '>=', now())
        ->orderBy('start_date', 'asc')
        ->limit(3)
        ->get();
?>

<?php if($otherEvents->count() > 0): ?>
<div style="background: #f8f9fa; padding: 60px 0;">
    <div class="container">
        <div class="text-center" style="margin-bottom: 50px;">
            <h2 style="font-size: 32px; color: #1a1a1a;">Outros Eventos</h2>
        </div>
        <div class="row gy-4">
            <?php $__currentLoopData = $otherEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $otherEvent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6">
                <div class="event-card-small" style="background: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); transition: transform 0.3s;">
                    <?php if($otherEvent->image): ?>
                    <div style="height: 200px; overflow: hidden;">
                        <img src="<?php echo e(url('storage/' . $otherEvent->image)); ?>" alt="<?php echo e($otherEvent->title); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <?php endif; ?>
                    <div style="padding: 25px;">
                        <span style="display: inline-block; background: #d4a574; color: #fff; padding: 5px 15px; border-radius: 20px; font-size: 12px; font-weight: 600; margin-bottom: 15px;">
                            <?php echo e($otherEvent->getTypeLabel()); ?>

                        </span>
                        <h3 style="font-size: 18px; margin-bottom: 10px; line-height: 1.4;">
                            <a href="<?php echo e(route('evento.detalhes.bd', $otherEvent->slug)); ?>" style="color: #1a1a1a;"><?php echo e(Str::limit($otherEvent->title, 60)); ?></a>
                        </h3>
                        <p style="color: #666; font-size: 14px; margin-bottom: 15px;">
                            <i class="far fa-calendar" style="color: #d4a574; margin-right: 5px;"></i>
                            <?php echo e(\Carbon\Carbon::parse($otherEvent->start_date)->locale('pt')->translatedFormat('d M, Y')); ?>

                        </p>
                        <a href="<?php echo e(route('evento.detalhes.bd', $otherEvent->slug)); ?>" class="btn btn-sm" style="font-size: 14px; padding: 8px 20px;">
                            SABER MAIS
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php endif; ?>

<style>
.event-card-small:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 20px rgba(0,0,0,0.15);
}

.share-section a:hover {
    transform: scale(1.1);
}

@media (max-width: 991px) {
    .event-info-box {
        position: static !important;
    }
    
    .event-image {
        max-height: 300px !important;
    }
    
    .event-image img {
        height: 300px !important;
    }
}
</style>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Bravantic\Desktop\Museu Municipal Alcanena\resources\views/evento-detalhes-bd.blade.php ENDPATH**/ ?>