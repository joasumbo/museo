<!DOCTYPE html>
<html lang="pt" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Dashboard'); ?> - Admin MMA</title>
    
    <!-- Favicons -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('assets/img/favicons/favicon.ico')); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('assets/img/favicons/apple-icon-180x180.png')); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('assets/img/favicons/favicon-32x32.png')); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('assets/img/favicons/favicon-16x16.png')); ?>">
    <meta name="msapplication-TileColor" content="#C57642">
    <meta name="msapplication-TileImage" content="<?php echo e(asset('assets/img/favicons/ms-icon-144x144.png')); ?>">
    <meta name="theme-color" content="#C57642">
    
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        'admin-bg': '#0a0a0a',
                        'admin-card': '#171717',
                        'admin-border': '#262626',
                        'admin-hover': '#1f1f1f',
                        'accent': '#C57642',
                        'accent-hover': '#a85f31',
                        'accent-light': '#d4a574',
                    },
                    fontFamily: {
                        sans: ['Roboto', 'system-ui', '-apple-system', 'sans-serif'],
                        title: ['Jost', 'system-ui', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <!-- Heroicons -->
    <script src="https://unpkg.com/@heroicons/vue@2.0.18/dist/cjs/index.cjs"></script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        [x-cloak] { display: none !important; }
        
        /* Skeleton Animation */
        .skeleton {
            background: linear-gradient(90deg, #1f1f1f 25%, #2a2a2a 50%, #1f1f1f 75%);
            background-size: 200% 100%;
            animation: skeleton-loading 1.5s infinite;
        }
        
        @keyframes skeleton-loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        
        ::-webkit-scrollbar-track {
            background: #171717;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #404040;
            border-radius: 3px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #525252;
        }
        
        /* Smooth transitions */
        .sidebar-link {
            transition: all 0.15s ease;
        }
        
        /* Toast animations */
        .toast-enter {
            animation: toast-in 0.3s ease-out;
        }
        
        @keyframes toast-in {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        /* Alert Styles */
        .alert {
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            animation: slideDown 0.3s ease-out;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .alert-success {
            background-color: rgba(34, 197, 94, 0.1);
            border: 1px solid rgba(34, 197, 94, 0.2);
            color: #86efac;
        }
        
        .alert-error {
            background-color: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #fca5a5;
        }
        
        .alert-warning {
            background-color: rgba(251, 191, 36, 0.1);
            border: 1px solid rgba(251, 191, 36, 0.2);
            color: #fde047;
        }
        
        .alert-info {
            background-color: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.2);
            color: #93c5fd;
        }
        
        @keyframes slideDown {
            from {
                transform: translateY(-1rem);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        /* Titles */
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Jost', sans-serif;
        }
    </style>
    
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="h-full bg-admin-bg text-gray-100 font-sans antialiased" x-data="{ sidebarOpen: false }">
    <div class="min-h-full">
        <!-- Mobile sidebar backdrop -->
        <div x-show="sidebarOpen" 
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-black/50 z-40 lg:hidden"
             @click="sidebarOpen = false"
             x-cloak>
        </div>

        <!-- Sidebar -->
        <?php echo $__env->make('admin.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <!-- Main content -->
        <div class="lg:pl-64">
            <!-- Top header -->
            <?php echo $__env->make('admin.layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            <!-- Page content -->
            <main class="py-6">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <!-- Flash Messages -->
                    <?php if(session('success')): ?>
                        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                             class="mb-6 rounded-lg bg-green-500/10 border border-green-500/20 p-4 toast-enter">
                            <div class="flex items-center">
                                <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <p class="ml-3 text-sm text-green-400"><?php echo e(session('success')); ?></p>
                                <button @click="show = false" class="ml-auto text-green-400 hover:text-green-300">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($errors->any()): ?>
                        <div class="mb-6 rounded-lg bg-red-500/10 border border-red-500/20 p-4">
                            <div class="flex">
                                <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                                <div class="ml-3">
                                    <ul class="list-disc list-inside text-sm text-red-400">
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </main>
        </div>
    </div>

    <?php echo $__env->yieldPushContent('scripts'); ?>
    
    <script>
        // Toast Notification System
        function showToast(message, type = 'success') {
            const toast = document.createElement('div');
            toast.className = `fixed top-6 right-6 z-50 max-w-sm w-full bg-admin-card border rounded-lg shadow-2xl p-4 transform transition-all duration-300 ease-out`;
            
            const colors = {
                success: { border: 'border-green-500/30', icon: 'text-green-400', bg: 'bg-green-500/10' },
                error: { border: 'border-red-500/30', icon: 'text-red-400', bg: 'bg-red-500/10' },
                warning: { border: 'border-yellow-500/30', icon: 'text-yellow-400', bg: 'bg-yellow-500/10' },
                info: { border: 'border-blue-500/30', icon: 'text-blue-400', bg: 'bg-blue-500/10' }
            };
            
            const icons = {
                success: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>',
                error: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>',
                warning: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>',
                info: '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>'
            };
            
            const color = colors[type];
            toast.classList.add(color.border);
            
            toast.innerHTML = `
                <div class="flex items-start">
                    <div class="flex-shrink-0 ${color.bg} rounded-lg p-2">
                        <svg class="w-5 h-5 ${color.icon}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            ${icons[type]}
                        </svg>
                    </div>
                    <div class="ml-3 flex-1">
                        <p class="text-sm text-white">${message}</p>
                    </div>
                    <button onclick="this.parentElement.parentElement.remove()" class="ml-4 flex-shrink-0 text-gray-400 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            `;
            
            document.body.appendChild(toast);
            
            // Animate in
            setTimeout(() => {
                toast.style.transform = 'translateX(0)';
                toast.style.opacity = '1';
            }, 10);
            
            // Auto remove after 5 seconds
            setTimeout(() => {
                toast.style.transform = 'translateX(400px)';
                toast.style.opacity = '0';
                setTimeout(() => toast.remove(), 300);
            }, 5000);
        }
        
        // Initialize toast from session flash messages
        document.addEventListener('DOMContentLoaded', function() {
            <?php if(session('success')): ?>
                showToast('<?php echo e(session('success')); ?>', 'success');
            <?php endif; ?>
            
            <?php if(session('error')): ?>
                showToast('<?php echo e(session('error')); ?>', 'error');
            <?php endif; ?>
            
            <?php if(session('warning')): ?>
                showToast('<?php echo e(session('warning')); ?>', 'warning');
            <?php endif; ?>
            
            <?php if(session('info')): ?>
                showToast('<?php echo e(session('info')); ?>', 'info');
            <?php endif; ?>
        });
    </script>
</body>
</html>
<?php /**PATH C:\laravel_projects\museo\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>