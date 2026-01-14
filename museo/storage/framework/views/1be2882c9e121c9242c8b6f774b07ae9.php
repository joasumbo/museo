<!-- Top Header -->
<header class="sticky top-0 z-40 bg-admin-bg/80 backdrop-blur-xl border-b border-admin-border">
    <div class="flex h-16 items-center justify-between px-4 sm:px-6 lg:px-8">
        <!-- Left side -->
        <div class="flex items-center">
            <!-- Mobile menu button -->
            <button @click="sidebarOpen = true" class="lg:hidden -ml-2 p-2 text-gray-400 hover:text-white">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <!-- Breadcrumb -->
            <nav class="hidden sm:flex items-center space-x-2 text-sm">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-gray-500 hover:text-gray-300">Admin</a>
                <svg class="h-4 w-4 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                </svg>
                <span class="text-gray-300"><?php echo $__env->yieldContent('page-title', 'Dashboard'); ?></span>
            </nav>
        </div>

        <!-- Right side -->
        <div class="flex items-center space-x-4">
            <!-- Quick Stats -->
            <div class="hidden md:flex items-center space-x-4 text-sm">
                <?php $todayVisits = \App\Models\Visit::today()->whereIn('status', ['pending', 'confirmed'])->count(); ?>
                <?php if($todayVisits > 0): ?>
                    <div class="flex items-center text-gray-400">
                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span><?php echo e($todayVisits); ?> visitas hoje</span>
                    </div>
                <?php endif; ?>
            </div>

            <!-- View Site -->
            <a href="<?php echo e(route('home')); ?>" target="_blank" 
               class="hidden sm:flex items-center px-3 py-1.5 text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white border border-gray-300 dark:border-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                <svg class="h-4 w-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                Ver Site
            </a>

            <!-- User dropdown -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="flex items-center space-x-2 p-1.5 rounded-lg hover:bg-admin-hover transition-colors">
                    <img class="h-8 w-8 rounded-full object-cover ring-2 ring-admin-border" 
                         src="<?php echo e(auth()->user()->getAvatarUrl()); ?>" 
                         alt="<?php echo e(auth()->user()->name); ?>">
                    <svg class="h-4 w-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div x-show="open" 
                     @click.outside="open = false"
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="transform opacity-100 scale-100"
                     x-transition:leave-end="transform opacity-0 scale-95"
                     class="absolute right-0 mt-2 w-56 origin-top-right rounded-lg bg-admin-card border border-admin-border shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                     x-cloak>
                    <div class="py-1">
                        <div class="px-4 py-3 border-b border-admin-border">
                            <p class="text-sm font-medium text-white"><?php echo e(auth()->user()->name); ?></p>
                            <p class="text-xs text-gray-500 truncate"><?php echo e(auth()->user()->email); ?></p>
                        </div>
                        
                        <a href="<?php echo e(route('admin.settings.profile')); ?>" class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-admin-hover hover:text-white">
                            <svg class="mr-3 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Meu Perfil
                        </a>
                        
                        <a href="<?php echo e(route('admin.settings.password')); ?>" class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-admin-hover hover:text-white">
                            <svg class="mr-3 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                            </svg>
                            Alterar Password
                        </a>
                        
                        <div class="border-t border-admin-border my-1"></div>
                        
                        <form method="POST" action="<?php echo e(route('admin.logout')); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="flex w-full items-center px-4 py-2 text-sm text-red-400 hover:bg-admin-hover hover:text-red-300">
                                <svg class="mr-3 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                                Terminar Sessão
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<?php /**PATH C:\laravel_projects\museo\resources\views/admin/layouts/header.blade.php ENDPATH**/ ?>