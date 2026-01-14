<!DOCTYPE html>
<html lang="pt" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Login - Painel Administrativo</title>
    
    <!-- Favicons -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('assets/img/favicons/favicon.ico')); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('assets/img/favicons/apple-icon-180x180.png')); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('assets/img/favicons/favicon-32x32.png')); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('assets/img/favicons/favicon-16x16.png')); ?>">
    <meta name="msapplication-TileColor" content="#C57642">
    <meta name="msapplication-TileImage" content="<?php echo e(asset('assets/img/favicons/ms-icon-144x144.png')); ?>">
    <meta name="theme-color" content="#C57642">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'accent': '#C57642',
                        'accent-hover': '#a85f31',
                        'accent-light': '#d4a574',
                    },
                    fontFamily: {
                        sans: ['Roboto', 'system-ui', 'sans-serif'],
                        title: ['Jost', 'system-ui', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Jost', sans-serif;
        }
        
        /* Animated gradient background */
        @keyframes gradientShift {
            0%, 100% { 
                background-position: 0% 50%; 
            }
            50% { 
                background-position: 100% 50%; 
            }
        }
        
        .animated-gradient {
            background: linear-gradient(-45deg, #0a0a0a, #1a0f0a, #0f0a0a, #0a0a0a);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
        }
        
        /* Floating particles */
        .particle {
            position: absolute;
            background: radial-gradient(circle, rgba(197, 118, 66, 0.3), transparent);
            border-radius: 50%;
            pointer-events: none;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.3; }
            50% { transform: translateY(-20px) rotate(180deg); opacity: 0.6; }
        }
        
        /* Card animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }
        
        /* Input focus effect */
        .input-wrapper {
            position: relative;
            overflow: hidden;
        }
        
        .input-wrapper::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, #C57642, transparent);
            transition: all 0.4s ease;
            transform: translateX(-50%);
        }
        
        .input-wrapper:focus-within::before {
            width: 100%;
        }
        
        /* Button ripple effect */
        .btn-ripple {
            position: relative;
            overflow: hidden;
        }
        
        .btn-ripple::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }
        
        .btn-ripple:active::after {
            width: 300px;
            height: 300px;
        }
        
        /* Logo glow */
        @keyframes glow {
            0%, 100% { 
                filter: drop-shadow(0 0 5px rgba(197, 118, 66, 0.3));
            }
            50% { 
                filter: drop-shadow(0 0 20px rgba(197, 118, 66, 0.6));
            }
        }
        
        .logo-glow {
            animation: glow 3s ease-in-out infinite;
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }
    </style>
</head>
<body class="h-full animated-gradient">
    <!-- Particles -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="particle" style="width: 150px; height: 150px; top: 10%; left: 10%; animation: float 8s ease-in-out infinite;"></div>
        <div class="particle" style="width: 100px; height: 100px; top: 60%; left: 80%; animation: float 10s ease-in-out infinite 1s;"></div>
        <div class="particle" style="width: 120px; height: 120px; top: 80%; left: 20%; animation: float 12s ease-in-out infinite 2s;"></div>
        <div class="particle" style="width: 80px; height: 80px; top: 30%; right: 15%; animation: float 9s ease-in-out infinite 1.5s;"></div>
    </div>

    <div class="flex min-h-full items-center justify-center px-4 py-12 sm:px-6 lg:px-8 relative z-10">
        <div class="w-full max-w-md space-y-8 fade-in-up">
            <!-- Logo -->
            <div class="text-center">
                <img src="<?php echo e(asset('assets/img/Logo_MMA.png')); ?>" alt="Museu Municipal de Alcanena" class="mx-auto h-24 w-auto logo-glow">
                <h2 class="mt-6 text-3xl font-bold tracking-tight text-white">Painel Administrativo</h2>
                <p class="mt-2 text-sm text-gray-400">Museu Municipal de Alcanena</p>
            </div>

            <!-- Login Card -->
            <div class="rounded-2xl bg-black/40 backdrop-blur-xl p-8 shadow-2xl border border-white/10">
                <?php if($errors->any()): ?>
                    <div class="mb-6 rounded-lg bg-red-500/10 border border-red-500/30 p-4 animate-[shake_0.5s]">
                        <div class="flex items-start">
                            <svg class="h-5 w-5 text-red-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-400">Erro no login</h3>
                                <ul class="mt-2 text-sm text-red-300 space-y-1">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>• <?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <form action="<?php echo e(route('admin.login')); ?>" method="POST" class="space-y-6">
                    <?php echo csrf_field(); ?>
                    
                    <!-- Email -->
                    <div class="input-wrapper">
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                        <input id="email" 
                               name="email" 
                               type="email" 
                               autocomplete="email" 
                               required 
                               value="<?php echo e(old('email')); ?>"
                               class="w-full rounded-lg bg-white/5 border border-white/10 px-4 py-3 text-white placeholder-gray-500 focus:border-accent focus:ring-2 focus:ring-accent/50 focus:outline-none transition-all duration-300"
                               placeholder="admin@museu-alcanena.pt">
                    </div>

                    <!-- Password -->
                    <div class="input-wrapper">
                        <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                        <input id="password" 
                               name="password" 
                               type="password" 
                               autocomplete="current-password" 
                               required 
                               class="w-full rounded-lg bg-white/5 border border-white/10 px-4 py-3 text-white placeholder-gray-500 focus:border-accent focus:ring-2 focus:ring-accent/50 focus:outline-none transition-all duration-300"
                               placeholder="••••••••">
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember" 
                                   name="remember" 
                                   type="checkbox" 
                                   class="h-4 w-4 rounded border-white/20 bg-white/5 text-accent focus:ring-accent/50 focus:ring-offset-0 transition-colors">
                            <label for="remember" class="ml-2 block text-sm text-gray-400">Manter-me conectado</label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                            class="btn-ripple w-full rounded-lg bg-gradient-to-r from-accent to-accent-light hover:from-accent-hover hover:to-accent px-4 py-3 text-sm font-semibold text-white shadow-lg shadow-accent/20 hover:shadow-accent/40 focus:outline-none focus:ring-2 focus:ring-accent focus:ring-offset-2 focus:ring-offset-gray-900 transition-all duration-300 transform hover:scale-[1.02]">
                        <span class="flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                            </svg>
                            Entrar no Painel
                        </span>
                    </button>
                </form>
            </div>

            <!-- Footer Info -->
            <div class="text-center">
                <p class="text-xs text-gray-500">
                    © <?php echo e(date('Y')); ?> Museu Municipal de Alcanena. Todos os direitos reservados.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\laravel_projects\museo\resources\views/admin/auth/login.blade.php ENDPATH**/ ?>