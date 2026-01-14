<?php $__env->startSection('title', 'Contactos'); ?>
<?php $__env->startSection('page-title', 'Contactos'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-semibold text-white">Contactos Recebidos</h1>
            <p class="mt-1 text-sm text-gray-500">Mensagens enviadas através do formulário de contacto</p>
        </div>
    </div>

    <!-- Status Tabs -->
    <div class="border-b border-admin-border">
        <nav class="-mb-px flex space-x-6">
            <a href="<?php echo e(route('admin.contacts.index')); ?>" 
               class="py-3 px-1 border-b-2 font-medium text-sm transition-colors
               <?php echo e(!request('status') ? 'border-accent text-accent' : 'border-transparent text-gray-500 hover:text-gray-300'); ?>">
                Todas
                <span class="ml-1 px-1.5 py-0.5 text-xs rounded-full bg-admin-bg"><?php echo e($stats['all']); ?></span>
            </a>
            <a href="<?php echo e(route('admin.contacts.index', ['status' => 'unread'])); ?>" 
               class="py-3 px-1 border-b-2 font-medium text-sm transition-colors
               <?php echo e(request('status') === 'unread' ? 'border-accent text-accent' : 'border-transparent text-gray-500 hover:text-gray-300'); ?>">
                Não lidas
                <?php if($stats['unread'] > 0): ?>
                    <span class="ml-1 px-1.5 py-0.5 text-xs rounded-full bg-accent/20 text-accent"><?php echo e($stats['unread']); ?></span>
                <?php endif; ?>
            </a>
            <a href="<?php echo e(route('admin.contacts.index', ['status' => 'read'])); ?>" 
               class="py-3 px-1 border-b-2 font-medium text-sm transition-colors
               <?php echo e(request('status') === 'read' ? 'border-accent text-accent' : 'border-transparent text-gray-500 hover:text-gray-300'); ?>">
                Lidas
            </a>
            <a href="<?php echo e(route('admin.contacts.index', ['status' => 'replied'])); ?>" 
               class="py-3 px-1 border-b-2 font-medium text-sm transition-colors
               <?php echo e(request('status') === 'replied' ? 'border-accent text-accent' : 'border-transparent text-gray-500 hover:text-gray-300'); ?>">
                Respondidas
            </a>
            <a href="<?php echo e(route('admin.contacts.index', ['status' => 'archived'])); ?>" 
               class="py-3 px-1 border-b-2 font-medium text-sm transition-colors
               <?php echo e(request('status') === 'archived' ? 'border-accent text-accent' : 'border-transparent text-gray-500 hover:text-gray-300'); ?>">
                Arquivadas
            </a>
        </nav>
    </div>

    <!-- Contacts List -->
    <div class="bg-admin-card border border-admin-border rounded-xl overflow-hidden">
        <div class="divide-y divide-admin-border">
            <?php $__empty_1 = true; $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <a href="<?php echo e(route('admin.contacts.show', $contact)); ?>" 
                   class="block p-4 hover:bg-admin-hover transition-colors <?php echo e($contact->status === 'unread' ? 'bg-accent/5' : ''); ?>">
                    <div class="flex items-start justify-between">
                        <div class="flex items-start space-x-3">
                            <!-- Status Indicator -->
                            <div class="mt-1">
                                <?php if($contact->status === 'unread'): ?>
                                    <div class="w-2 h-2 rounded-full bg-accent"></div>
                                <?php elseif($contact->status === 'replied'): ?>
                                    <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                <?php else: ?>
                                    <div class="w-2 h-2 rounded-full bg-gray-600"></div>
                                <?php endif; ?>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center space-x-2">
                                    <p class="text-sm font-medium text-white truncate <?php echo e($contact->status === 'unread' ? 'font-semibold' : ''); ?>">
                                        <?php echo e($contact->name); ?>

                                    </p>
                                    <?php if($contact->subject): ?>
                                        <span class="text-gray-600">•</span>
                                        <p class="text-sm text-gray-400 truncate"><?php echo e($contact->subject); ?></p>
                                    <?php endif; ?>
                                </div>
                                <p class="mt-1 text-sm text-gray-500 truncate"><?php echo e($contact->email); ?></p>
                                <p class="mt-1 text-sm text-gray-400 line-clamp-2"><?php echo e(Str::limit($contact->message, 150)); ?></p>
                            </div>
                        </div>
                        <div class="ml-4 text-right">
                            <p class="text-xs text-gray-500"><?php echo e($contact->created_at->diffForHumans()); ?></p>
                            <?php if($contact->status === 'replied'): ?>
                                <span class="inline-flex items-center mt-1 px-2 py-0.5 text-xs rounded-full bg-green-500/10 text-green-400">
                                    Respondida
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="p-12 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <p class="mt-4 text-sm text-gray-500">Nenhuma mensagem encontrada</p>
                </div>
            <?php endif; ?>
        </div>

        <?php if($contacts->hasPages()): ?>
            <div class="px-6 py-4 border-t border-admin-border">
                <?php echo e($contacts->links()); ?>

            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laravel_projects\museo\resources\views/admin/contacts/index.blade.php ENDPATH**/ ?>