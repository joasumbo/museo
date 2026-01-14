<!doctype html>
<html class="no-js" lang="pt-PT">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Agendar Visita - Museu Municipal de Alcanena - Cultura e História</title>
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
                        <h1 class="breadcumb-title">Agendar Visita</h1>
                    </div>
                    <ul class="breadcumb-menu">
                        <li><a href="#">Início</a></li>
                        <li class="active">Agendar uma visita</li>
                    </ul>
                </div>
            </div>

            <div class="contact-form-wrap">
                <div class="title-area mb-30">
                    <span class="sub-title text-theme">AGENDAMENTO</span>
                    <h2 class="sec-title">Marque a Sua Visita</h2>
                </div>

                <?php if(session('success')): ?>
                    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                <?php endif; ?>

                <form action="<?php echo e(route('visits.store')); ?>" method="POST" class="contact-form">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group style-4 form-icon-left">
                                <i class="far fa-user text-theme"></i>
                                <input type="text"
                                    class="form-control style-border <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name"
                                    value="<?php echo e(old('name')); ?>" placeholder="Nome Completo" required>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group style-4 form-icon-left">
                                <i class="far fa-envelope text-theme"></i>
                                <input type="email"
                                    class="form-control style-border <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    name="email" value="<?php echo e(old('email')); ?>" placeholder="Endereço de Email" required>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group style-4 form-icon-left">
                                <i class="fas fa-phone text-theme"></i>
                                <input type="text" class="form-control style-border" name="phone"
                                    placeholder="Telefone/Telemóvel">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group style-4 form-icon-left">
                                <i class="fas fa-building text-theme"></i>
                                <input type="text" class="form-control style-border" name="organization"
                                    placeholder="Escola/Organização (Opcional)">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group style-4 form-icon-left">
                                <i class="fas fa-calendar-alt text-theme"></i>
                                <input type="date"
                                    class="form-control style-border <?php $__errorArgs = ['visit_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    name="visit_date" value="<?php echo e(old('visit_date')); ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group style-4 form-icon-left">
                                <i class="fas fa-clock text-theme"></i>
                                <input type="time"
                                    class="form-control style-border <?php $__errorArgs = ['preferred_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    name="preferred_time" value="<?php echo e(old('preferred_time')); ?>" required>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group style-4 form-icon-left">
                                <i class="fas fa-users text-theme"></i>
                                <select name="visit_type" class="form-control style-border" required>
                                    <option value="" disabled selected>Tipo de Visita</option>
                                    <option value="individual">Individual</option>
                                    <option value="group">Grupo</option>
                                    <option value="school">Escolar</option>
                                    <option value="guided">Visita Guiada</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group style-4 form-icon-left">
                                <i class="fas fa-sort-numeric-up text-theme"></i>
                                <input type="number" class="form-control style-border" name="group_size" min="1"
                                    placeholder="Nº de Pessoas" required>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group style-4 form-icon-left">
                                <i class="far fa-comment text-theme"></i>
                                <textarea name="special_requests" placeholder="Algum pedido especial ou observação?" class="form-control style-border"><?php echo e(old('special_requests')); ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-btn col-12">
                        <button type="submit" class="btn">SOLICITAR AGENDAMENTO</button>
                    </div>
                </form>
            </div>


            <?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        </div>
    </div>


    <?php echo $__env->make('components.js', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>

</html>
<?php /**PATH C:\laravel_projects\museo\resources\views/agendar-visita.blade.php ENDPATH**/ ?>