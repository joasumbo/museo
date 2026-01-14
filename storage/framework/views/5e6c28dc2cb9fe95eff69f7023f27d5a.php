<!-- Sidebar -->
<aside class="fixed inset-y-0 left-0 z-50 w-64 bg-admin-card border-r border-admin-border transform transition-transform duration-200 ease-in-out lg:translate-x-0"
       :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
       x-cloak>
    
    <!-- Logo -->
    <div class="flex h-16 items-center justify-between px-4 border-b border-admin-border">
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="flex items-center space-x-3">
            <div class="h-8 w-8 rounded-lg bg-accent flex items-center justify-center">
                <span class="text-white font-bold text-sm">M</span>
            </div>
            <span class="text-lg font-semibold text-white">MMA Admin</span>
        </a>
        <button @click="sidebarOpen = false" class="lg:hidden text-gray-400 hover:text-white">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto py-4 px-3">
        <!-- Main Section -->
        <div class="space-y-1">
            <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Principal</p>
            
            <a href="<?php echo e(route('admin.dashboard')); ?>" 
               class="sidebar-link flex items-center px-3 py-2 rounded-lg text-sm font-medium <?php echo e(request()->routeIs('admin.dashboard') ? 'bg-accent/10 text-accent' : 'text-gray-300 hover:bg-admin-hover hover:text-white'); ?>">
                <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Dashboard
            </a>
        </div>

        <!-- Content Section -->
        <div class="mt-6 space-y-1">
            <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Conteúdo</p>
            
            <a href="<?php echo e(route('admin.events.index')); ?>" 
               class="sidebar-link flex items-center px-3 py-2 rounded-lg text-sm font-medium <?php echo e((request()->routeIs('admin.events.*') || request()->routeIs('admin.events.calendar')) ? 'bg-accent/10 text-accent' : 'text-gray-300 hover:bg-admin-hover hover:text-white'); ?>">
                <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                Eventos
            </a>

            <a href="<?php echo e(route('admin.schedules.index')); ?>" 
               class="sidebar-link flex items-center px-3 py-2 rounded-lg text-sm font-medium <?php echo e(request()->routeIs('admin.schedules.*') ? 'bg-accent/10 text-accent' : 'text-gray-300 hover:bg-admin-hover hover:text-white'); ?>">
                <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Horários
            </a>
        </div>

        <!-- Interactions Section -->
        <div class="mt-6 space-y-1">
            <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Interações</p>
            
            <a href="<?php echo e(route('admin.visits.index')); ?>" 
               class="sidebar-link flex items-center justify-between px-3 py-2 rounded-lg text-sm font-medium <?php echo e(request()->routeIs('admin.visits.*') ? 'bg-accent/10 text-accent' : 'text-gray-300 hover:bg-admin-hover hover:text-white'); ?>">
                <div class="flex items-center">
                    <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    Visitas Agendadas
                </div>
                <?php $pendingVisits = \App\Models\Visit::pending()->count(); ?>
                <?php if($pendingVisits > 0): ?>
                    <span class="inline-flex items-center justify-center px-2 py-0.5 text-xs font-medium rounded-full bg-yellow-500/20 text-yellow-400">
                        <?php echo e($pendingVisits); ?>

                    </span>
                <?php endif; ?>
            </a>

            <a href="<?php echo e(route('admin.contacts.index')); ?>" 
               class="sidebar-link flex items-center justify-between px-3 py-2 rounded-lg text-sm font-medium <?php echo e(request()->routeIs('admin.contacts.*') ? 'bg-accent/10 text-accent' : 'text-gray-300 hover:bg-admin-hover hover:text-white'); ?>">
                <div class="flex items-center">
                    <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Contactos
                </div>
                <?php $unreadContacts = \App\Models\Contact::unread()->count(); ?>
                <?php if($unreadContacts > 0): ?>
                    <span class="inline-flex items-center justify-center px-2 py-0.5 text-xs font-medium rounded-full bg-red-500/20 text-red-400">
                        <?php echo e($unreadContacts); ?>

                    </span>
                <?php endif; ?>
            </a>
        </div>

        <!-- Settings Section -->
        <div class="mt-6 space-y-1">
            <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Configurações</p>
            
            <a href="<?php echo e(route('admin.settings.profile')); ?>" 
               class="sidebar-link flex items-center px-3 py-2 rounded-lg text-sm font-medium <?php echo e(request()->routeIs('admin.settings.profile*') ? 'bg-accent/10 text-accent' : 'text-gray-300 hover:bg-admin-hover hover:text-white'); ?>">
                <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                Meu Perfil
            </a>

            <a href="<?php echo e(route('admin.settings.site')); ?>" 
               class="sidebar-link flex items-center px-3 py-2 rounded-lg text-sm font-medium <?php echo e(request()->routeIs('admin.settings.site*') ? 'bg-accent/10 text-accent' : 'text-gray-300 hover:bg-admin-hover hover:text-white'); ?>">
                <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Configurações do Site
            </a>

            <?php if(auth()->user()->isAdmin()): ?>
            <a href="<?php echo e(route('admin.settings.users')); ?>" 
               class="sidebar-link flex items-center px-3 py-2 rounded-lg text-sm font-medium <?php echo e(request()->routeIs('admin.settings.users*') ? 'bg-accent/10 text-accent' : 'text-gray-300 hover:bg-admin-hover hover:text-white'); ?>">
                <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                Utilizadores
            </a>
            <?php endif; ?>
        </div>
    </nav>

    <!-- User info at bottom -->
    <div class="border-t border-admin-border p-4">
        <div class="flex items-center">
            <img class="h-9 w-9 rounded-full object-cover" src="<?php echo e(auth()->user()->getAvatarUrl()); ?>" alt="<?php echo e(auth()->user()->name); ?>">
            <div class="ml-3 min-w-0 flex-1">
                <p class="text-sm font-medium text-white truncate"><?php echo e(auth()->user()->name); ?></p>
                <p class="text-xs text-gray-500 truncate"><?php echo e(auth()->user()->getRoleLabel()); ?></p>
            </div>
        </div>
    </div>
</aside>
<?php /**PATH C:\Users\Bravantic\Desktop\Museu Municipal Alcanena\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>