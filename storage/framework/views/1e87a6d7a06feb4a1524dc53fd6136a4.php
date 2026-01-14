

<?php $__env->startSection('title', 'Agendar Visita - Museu Municipal de Alcanena'); ?>

<?php $__env->startSection('description', 'Agende a sua visita ao Museu Municipal de Alcanena. Escolha a data, hora e tipo de visita que prefere.'); ?>

<?php $__env->startSection('content'); ?>
<!--==============================
Breadcumb
============================== -->
<div class="breadcumb-wrapper text-center" data-bg-src="<?php echo e(asset('assets/img/gallery/DSC_3893.jpg')); ?>">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Agendar Visita</h1>
        </div>
        <ul class="breadcumb-menu">
            <li><a href="<?php echo e(route('home')); ?>">Início</a></li>
            <li class="active">Agendar uma visita</li>
        </ul>
    </div>
</div>

<!--==============================
Contact Form Area
============================== -->
<section class="space">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="contact-form-wrap" style="background: #f8f9fa; padding: 50px; border-radius: 15px;">
                    <div class="title-area text-center mb-40">
                        <span class="sub-title" style="color: #d4a574; font-weight: 600; font-size: 14px; letter-spacing: 2px;">AGENDAMENTO</span>
                        <h2 class="sec-title" style="font-size: 32px; margin-top: 10px;">Marque a Sua Visita</h2>
                        <p style="color: #666; margin-top: 15px;">Preencha o formulário abaixo para agendar a sua visita ao Museu Municipal de Alcanena</p>
                    </div>

                    <?php if(session('success')): ?>
                        <div class="alert alert-success" style="background: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 30px;">
                            <i class="fas fa-check-circle"></i> <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger" style="background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 30px;">
                            <i class="fas fa-exclamation-circle"></i> Por favor, corrija os seguintes erros:
                            <ul style="margin: 10px 0 0 20px;">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('visits.store')); ?>" method="POST" class="contact-form">
                        <?php echo csrf_field(); ?>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="font-weight: 600; color: #333; margin-bottom: 10px; display: block;">
                                        <i class="far fa-user text-theme me-2"></i>Nome Completo *
                                    </label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           name="name" value="<?php echo e(old('name')); ?>" required 
                                           style="padding: 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 15px;">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="font-weight: 600; color: #333; margin-bottom: 10px; display: block;">
                                        <i class="far fa-envelope text-theme me-2"></i>Email *
                                    </label>
                                    <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           name="email" value="<?php echo e(old('email')); ?>" required 
                                           style="padding: 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 15px;">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="font-weight: 600; color: #333; margin-bottom: 10px; display: block;">
                                        <i class="fas fa-phone text-theme me-2"></i>Telefone/Telemóvel
                                    </label>
                                    <input type="text" class="form-control" name="phone" value="<?php echo e(old('phone')); ?>" 
                                           style="padding: 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 15px;">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="font-weight: 600; color: #333; margin-bottom: 10px; display: block;">
                                        <i class="fas fa-building text-theme me-2"></i>Escola/Organização (Opcional)
                                    </label>
                                    <input type="text" class="form-control" name="organization" value="<?php echo e(old('organization')); ?>" 
                                           style="padding: 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 15px;">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="font-weight: 600; color: #333; margin-bottom: 10px; display: block;">
                                        <i class="fas fa-calendar-alt text-theme me-2"></i>Data da Visita *
                                    </label>
                                    <input type="date" class="form-control <?php $__errorArgs = ['visit_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           name="visit_date" value="<?php echo e(old('visit_date')); ?>" required 
                                           style="padding: 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 15px;">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="font-weight: 600; color: #333; margin-bottom: 10px; display: block;">
                                        <i class="fas fa-clock text-theme me-2"></i>Hora Preferida *
                                    </label>
                                    <input type="time" class="form-control <?php $__errorArgs = ['preferred_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           name="preferred_time" value="<?php echo e(old('preferred_time')); ?>" required 
                                           style="padding: 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 15px;">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="font-weight: 600; color: #333; margin-bottom: 10px; display: block;">
                                        <i class="fas fa-users text-theme me-2"></i>Tipo de Visita *
                                    </label>
                                    <select name="visit_type" class="form-control" required 
                                            style="padding: 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 15px;">
                                        <option value="">Selecione o tipo de visita</option>
                                        <option value="individual" <?php echo e(old('visit_type') == 'individual' ? 'selected' : ''); ?>>Individual</option>
                                        <option value="group" <?php echo e(old('visit_type') == 'group' ? 'selected' : ''); ?>>Grupo</option>
                                        <option value="school" <?php echo e(old('visit_type') == 'school' ? 'selected' : ''); ?>>Escolar</option>
                                        <option value="guided" <?php echo e(old('visit_type') == 'guided' ? 'selected' : ''); ?>>Visita Guiada</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="font-weight: 600; color: #333; margin-bottom: 10px; display: block;">
                                        <i class="fas fa-sort-numeric-up text-theme me-2"></i>Número de Pessoas *
                                    </label>
                                    <input type="number" class="form-control" name="group_size" min="1" 
                                           value="<?php echo e(old('group_size', 1)); ?>" required 
                                           style="padding: 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 15px;">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label style="font-weight: 600; color: #333; margin-bottom: 10px; display: block;">
                                        <i class="far fa-comment text-theme me-2"></i>Observações ou Pedidos Especiais
                                    </label>
                                    <textarea name="special_requests" rows="5" class="form-control" 
                                              style="padding: 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 15px; resize: vertical;" 
                                              placeholder="Algum pedido especial ou observação?"><?php echo e(old('special_requests')); ?></textarea>
                                </div>
                            </div>

                            <div class="col-12 text-center">
                                <button type="submit" class="btn" style="padding: 15px 50px; font-size: 16px;">
                                    <i class="fas fa-calendar-check me-2"></i>SOLICITAR AGENDAMENTO
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Info Box -->
                <div class="row mt-40 g-4">
                    <div class="col-md-4">
                        <div class="text-center" style="background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                            <i class="fas fa-clock" style="font-size: 40px; color: #d4a574; margin-bottom: 15px;"></i>
                            <h5 style="font-size: 16px; margin-bottom: 10px;">Horário</h5>
                            <p style="color: #666; font-size: 14px; margin: 0;">Quarta a Domingo<br>10h00 - 13h00 | 14h00 - 18h00</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center" style="background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                            <i class="fas fa-ticket-alt" style="font-size: 40px; color: #d4a574; margin-bottom: 15px;"></i>
                            <h5 style="font-size: 16px; margin-bottom: 10px;">Entrada</h5>
                            <p style="color: #666; font-size: 14px; margin: 0;">Gratuita para todos<br>Visitas guiadas sob consulta</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center" style="background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                            <i class="fas fa-phone-alt" style="font-size: 40px; color: #d4a574; margin-bottom: 15px;"></i>
                            <h5 style="font-size: 16px; margin-bottom: 10px;">Contacto</h5>
                            <p style="color: #666; font-size: 14px; margin: 0;">+351 249 580 170<br>museu@cm-alcanena.pt</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Bravantic\Desktop\Museu Municipal Alcanena\resources\views/agendar-visita.blade.php ENDPATH**/ ?>