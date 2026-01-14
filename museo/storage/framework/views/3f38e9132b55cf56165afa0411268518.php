<?php $__env->startSection('title', 'Detalhes da Visita'); ?>
<?php $__env->startSection('page-title', 'Detalhes da Visita'); ?>

<?php $__env->startSection('content'); ?>
    <div class="max-w-4xl mx-auto">
        <div class="mb-6 flex items-center justify-between">
            <a href="<?php echo e(route('admin.visits.index')); ?>"
                class="inline-flex items-center text-sm text-gray-400 hover:text-white">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Voltar às visitas
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Info -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Visit Card -->
                <div class="bg-admin-card border border-admin-border rounded-xl overflow-hidden">
                    <div class="px-6 py-4 border-b border-admin-border flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div
                                class="h-10 w-10 rounded-full flex items-center justify-center
                            <?php if($visit->visit_type === 'school'): ?> bg-blue-500/10 text-blue-400
                            <?php elseif($visit->visit_type === 'group'): ?> bg-purple-500/10 text-purple-400
                            <?php else: ?> bg-gray-500/10 text-gray-400 <?php endif; ?>">
                                <?php if($visit->visit_type === 'school'): ?>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 14l9-5-9-5-9 5 9 5z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                    </svg>
                                <?php else: ?>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                <?php endif; ?>
                            </div>
                            <div>
                                <h2 class="text-lg font-medium text-white">
                                    <?php if($visit->visit_type === 'school'): ?>
                                        Visita Escolar
                                    <?php elseif($visit->visit_type === 'group'): ?>
                                        Visita de Grupo
                                    <?php else: ?>
                                        Visita Individual
                                    <?php endif; ?>
                                </h2>
                                <p class="text-sm text-gray-500">Ref: #<?php echo e(str_pad($visit->id, 5, '0', STR_PAD_LEFT)); ?></p>
                            </div>
                        </div>
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                        <?php if($visit->status === 'pending'): ?> bg-yellow-500/10 text-yellow-400
                        <?php elseif($visit->status === 'confirmed'): ?> bg-green-500/10 text-green-400
                        <?php elseif($visit->status === 'completed'): ?> bg-blue-500/10 text-blue-400
                        <?php else: ?> bg-red-500/10 text-red-400 <?php endif; ?>">
                            <?php if($visit->status === 'pending'): ?>
                                Pendente
                            <?php elseif($visit->status === 'confirmed'): ?>
                                Confirmada
                            <?php elseif($visit->status === 'completed'): ?>
                                Realizada
                            <?php else: ?>
                                Cancelada
                            <?php endif; ?>
                        </span>
                    </div>

                    <div class="p-6 space-y-6">
                        <!-- Date & Time -->
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Data</p>
                                <p class="text-sm text-white"><?php echo e($visit->visit_date->format('d/m/Y')); ?></p>
                                <p class="text-xs text-gray-500">
                                    <?php echo e(\Carbon\Carbon::parse($visit->preferred_time)->format('H:i')); ?></p>
                            </div>
                            <div>
                                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Hora</p>
                                <p class="text-lg font-medium text-white"> <?php echo e(\Carbon\Carbon::parse($visit->preferred_time)->format('H:i')); ?></p>
                            </div>
                        </div>

                        <!-- Visitors -->
                        <div>
                            <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Número de Visitantes
                            </p>
                            <div class="flex items-center space-x-2">
                                <span class="text-2xl font-bold text-white"><?php echo e($visit->group_size ?? ''); ?></span>
                                <span class="text-gray-500">pessoas</span>
                            </div>
                        </div>

                        <?php if($visit->notes): ?>
                            <div>
                                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-2">Observações</p>
                                <div class="bg-admin-bg rounded-lg p-4 text-sm text-gray-300">
                                    <?php echo nl2br(e($visit->notes)); ?>

                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Visitor Info -->
                <div class="bg-admin-card border border-admin-border rounded-xl overflow-hidden">
                    <div class="px-6 py-4 border-b border-admin-border">
                        <h3 class="text-sm font-medium text-white">Informações do Visitante</h3>
                    </div>
                    <div class="p-6">
                        <dl class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</dt>
                                <dd class="mt-1 text-sm text-white"><?php echo e($visit->name); ?></dd>
                            </div>
                            <div>
                                <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Email</dt>
                                <dd class="mt-1">
                                    <a href="mailto:<?php echo e($visit->email); ?>"
                                        class="text-sm text-accent hover:text-accent-hover"><?php echo e($visit->email); ?></a>
                                </dd>
                            </div>
                            <?php if($visit->phone): ?>
                                <div>
                                    <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Telefone</dt>
                                    <dd class="mt-1">
                                        <a href="tel:<?php echo e($visit->phone); ?>"
                                            class="text-sm text-gray-300 hover:text-white"><?php echo e($visit->phone); ?></a>
                                    </dd>
                                </div>
                            <?php endif; ?>
                            <?php if($visit->organization): ?>
                                <div>
                                    <dt class="text-xs font-medium text-gray-500 uppercase tracking-wider">Organização</dt>
                                    <dd class="mt-1 text-sm text-white"><?php echo e($visit->organization); ?></dd>
                                </div>
                            <?php endif; ?>
                        </dl>
                    </div>
                </div>
            </div>

            <!-- Sidebar Actions -->
            <div class="space-y-6">
                <!-- Actions Card -->
                <div class="bg-admin-card border border-admin-border rounded-xl p-6">
                    <h3 class="text-sm font-medium text-white mb-4">Ações</h3>
                    <div class="space-y-3">
                        <?php if($visit->status === 'pending'): ?>
                            <form action="<?php echo e(route('admin.visits.confirm', $visit)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>
                                <button type="submit"
                                    class="w-full px-4 py-2 bg-green-500/20 text-green-400 hover:bg-green-500/30 rounded-lg text-sm font-medium transition-colors">
                                    Confirmar Visita
                                </button>
                            </form>
                            <form action="<?php echo e(route('admin.visits.cancel', $visit)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>
                                <button type="submit"
                                    class="w-full px-4 py-2 bg-red-500/10 text-red-400 hover:bg-red-500/20 rounded-lg text-sm font-medium transition-colors">
                                    Cancelar Visita
                                </button>
                            </form>
                        <?php elseif($visit->status === 'confirmed'): ?>
                            <form action="<?php echo e(route('admin.visits.complete', $visit)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>
                                <button type="submit"
                                    class="w-full px-4 py-2 bg-blue-500/20 text-blue-400 hover:bg-blue-500/30 rounded-lg text-sm font-medium transition-colors">
                                    Marcar como Realizada
                                </button>
                            </form>
                            <form action="<?php echo e(route('admin.visits.cancel', $visit)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>
                                <button type="submit"
                                    class="w-full px-4 py-2 bg-red-500/10 text-red-400 hover:bg-red-500/20 rounded-lg text-sm font-medium transition-colors">
                                    Cancelar Visita
                                </button>
                            </form>
                        <?php endif; ?>

                        <a href="mailto:<?php echo e($visit->email); ?>"
                            class="block w-full px-4 py-2 bg-admin-bg text-gray-300 hover:text-white text-center rounded-lg text-sm font-medium transition-colors">
                            Enviar Email
                        </a>
                    </div>
                </div>

                <!-- Timeline -->
                <div class="bg-admin-card border border-admin-border rounded-xl p-6">
                    <h3 class="text-sm font-medium text-white mb-4">Histórico</h3>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <div class="w-2 h-2 mt-1.5 rounded-full bg-gray-600"></div>
                            <div>
                                <p class="text-sm text-gray-300">Pedido recebido</p>
                                <p class="text-xs text-gray-500"><?php echo e($visit->created_at->format('d/m/Y H:i')); ?></p>
                            </div>
                        </div>
                        <?php if($visit->confirmed_at): ?>
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 mt-1.5 rounded-full bg-green-500"></div>
                                <div>
                                    <p class="text-sm text-gray-300">Confirmada</p>
                                    <p class="text-xs text-gray-500"><?php echo e($visit->confirmed_at->format('d/m/Y H:i')); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if($visit->completed_at): ?>
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 mt-1.5 rounded-full bg-blue-500"></div>
                                <div>
                                    <p class="text-sm text-gray-300">Realizada</p>
                                    <p class="text-xs text-gray-500"><?php echo e($visit->completed_at->format('d/m/Y H:i')); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if($visit->cancelled_at): ?>
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 mt-1.5 rounded-full bg-red-500"></div>
                                <div>
                                    <p class="text-sm text-gray-300">Cancelada</p>
                                    <p class="text-xs text-gray-500"><?php echo e($visit->cancelled_at->format('d/m/Y H:i')); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laravel_projects\museo\resources\views/admin/visits/show.blade.php ENDPATH**/ ?>