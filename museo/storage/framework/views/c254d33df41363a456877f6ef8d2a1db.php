<!doctype html>
<html class="no-js" lang="pt-PT">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Contactos - Museu Municipal de Alcanena - Cultura e História</title>
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
                        <h1 class="breadcumb-title">Contactos</h1>
                    </div>
                    <ul class="breadcumb-menu">
                        <li><a href="/">INÍCIO</a></li>
                        <li class="active">CONTACTOS</li>
                    </ul>
                </div>
            </div>

            <!--==============================
        Contact Area
        ==============================-->
            <div class="space">
                <div class="container">
                    <div class="contact-page-wrap">
                        <div class="row gx-0 justify-content-center flex-row-reverse">
                            <div class="col-xl-5">
                                <div class="map-sec">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3080.5061827072136!2d-8.6647717!3d39.457892!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd189100221195a7%3A0xa2600379e63b4957!2sMuseu%20Municipal%20de%20Alcanena!5e0!3m2!1spt-PT!2sao!4v1767117209461!5m2!1spt-PT!2sao"
                                        width="600" height="450" style="border:0;" allowfullscreen=""
                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                            <div class="col-xl-7">
                                <div class="contact-form-wrap">
                                    <div class="title-area mb-30">
                                        <span class="sub-title text-theme">CONTACTE-NOS</span>
                                        <h2 class="sec-title">Entre em Contacto!</h2>
                                    </div>

                                    
                                    <?php if(session('success')): ?>
                                        <div class="alert alert-success">
                                            <?php echo e(session('success')); ?>

                                        </div>
                                    <?php endif; ?>

                                    
                                    <?php if(session('error')): ?>
                                        <div class="alert alert-danger">
                                            <?php echo e(session('error')); ?>

                                        </div>
                                    <?php endif; ?>

                                    <form action="<?php echo e(route('contact.store')); ?>" method="POST" class="contact-form">
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
unset($__errorArgs, $__bag); ?>"
                                                        name="name" id="name" value="<?php echo e(old('name')); ?>"
                                                        placeholder="Introduza o Nome Completo" required>
                                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <small class="text-danger"><?php echo e($message); ?></small>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                                                        name="email" id="email" value="<?php echo e(old('email')); ?>"
                                                        placeholder="Endereço de Email" required>
                                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <small class="text-danger"><?php echo e($message); ?></small>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group style-4 form-icon-left">
                                                    <i class="far fa-comment text-theme"></i>
                                                    <textarea name="message" placeholder="Escreva a Sua Mensagem" id="contactForm"
                                                        class="form-control style-border <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required><?php echo e(old('message')); ?></textarea>
                                                    <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <small class="text-danger"><?php echo e($message); ?></small>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-btn col-12">
                                            <button type="submit" class="btn">ENVIAR MENSAGEM AGORA</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        </div>
    </div>


    <?php echo $__env->make('components.js', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>

</html>
<?php /**PATH C:\laravel_projects\museo\resources\views/contactos.blade.php ENDPATH**/ ?>