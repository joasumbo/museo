<?php $__env->startSection('title', 'Visitas'); ?>
<?php $__env->startSection('page-title', 'Visitas'); ?>

<?php $__env->startSection('content'); ?>
    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-semibold text-white">Visitas Agendadas</h1>
                <p class="mt-1 text-sm text-gray-500">Gestão de marcações de visitas ao museu</p>
            </div>
        </div>

        <!-- Status Tabs -->
        <div class="border-b border-admin-border">
            <nav class="-mb-px flex space-x-6">
                <a href="<?php echo e(route('admin.visits.index')); ?>"
                    class="py-3 px-1 border-b-2 font-medium text-sm transition-colors
               <?php echo e(!request('status') ? 'border-accent text-accent' : 'border-transparent text-gray-500 hover:text-gray-300'); ?>">
                    Todas
                    <span class="ml-1 px-1.5 py-0.5 text-xs rounded-full bg-admin-bg"><?php echo e($stats['all']); ?></span>
                </a>
                <a href="<?php echo e(route('admin.visits.index', ['status' => 'pending'])); ?>"
                    class="py-3 px-1 border-b-2 font-medium text-sm transition-colors
               <?php echo e(request('status') === 'pending' ? 'border-accent text-accent' : 'border-transparent text-gray-500 hover:text-gray-300'); ?>">
                    Pendentes
                    <?php if($stats['pending'] > 0): ?>
                        <span
                            class="ml-1 px-1.5 py-0.5 text-xs rounded-full bg-yellow-500/20 text-yellow-400"><?php echo e($stats['pending']); ?></span>
                    <?php endif; ?>
                </a>
                <a href="<?php echo e(route('admin.visits.index', ['status' => 'confirmed'])); ?>"
                    class="py-3 px-1 border-b-2 font-medium text-sm transition-colors
               <?php echo e(request('status') === 'confirmed' ? 'border-accent text-accent' : 'border-transparent text-gray-500 hover:text-gray-300'); ?>">
                    Confirmadas
                    <span
                        class="ml-1 px-1.5 py-0.5 text-xs rounded-full bg-green-500/20 text-green-400"><?php echo e($stats['confirmed']); ?></span>
                </a>
                <a href="<?php echo e(route('admin.visits.index', ['status' => 'completed'])); ?>"
                    class="py-3 px-1 border-b-2 font-medium text-sm transition-colors
               <?php echo e(request('status') === 'completed' ? 'border-accent text-accent' : 'border-transparent text-gray-500 hover:text-gray-300'); ?>">
                    Realizadas
                </a>
                <a href="<?php echo e(route('admin.visits.index', ['status' => 'cancelled'])); ?>"
                    class="py-3 px-1 border-b-2 font-medium text-sm transition-colors
               <?php echo e(request('status') === 'cancelled' ? 'border-accent text-accent' : 'border-transparent text-gray-500 hover:text-gray-300'); ?>">
                    Canceladas
                </a>
            </nav>
        </div>

        <!-- Visits Table -->
        <div class="bg-admin-card border border-admin-border rounded-xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-admin-border">
                    <thead class="bg-admin-bg">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Visitante</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Data/Hora</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Pessoas</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Estado</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-admin-border">
                        <?php $__empty_1 = true; $__currentLoopData = $visits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="hover:bg-admin-hover transition-colors">
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="text-sm font-medium text-white"><?php echo e($visit->name); ?></p>
                                        <p class="text-xs text-gray-500"><?php echo e($visit->email); ?></p>
                                        <?php if($visit->organization): ?>
                                            <p class="text-xs text-accent"><?php echo e($visit->organization); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                    <?php if($visit->visit_type === 'school'): ?> bg-blue-500/10 text-blue-400
                                    <?php elseif($visit->visit_type === 'group'): ?> bg-purple-500/10 text-purple-400
                                    <?php else: ?> bg-gray-500/10 text-gray-400 <?php endif; ?>">
                                        <?php if($visit->visit_type === 'school'): ?>
                                            Escolar
                                        <?php elseif($visit->visit_type === 'group'): ?>
                                            Grupo
                                        <?php else: ?>
                                            Individual
                                        <?php endif; ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="text-sm text-white"><?php echo e($visit->visit_date->format('d/m/Y')); ?></p>
                                        <p class="text-xs text-gray-500">
                                            <?php echo e(\Carbon\Carbon::parse($visit->preferred_time)->format('H:i')); ?></p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-gray-300"><?php echo e($visit->number_of_people); ?></span>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
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
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end space-x-2">
                                        <a href="<?php echo e(route('admin.visits.show', $visit)); ?>"
                                            class="px-3 py-1.5 text-xs font-medium text-gray-300 hover:text-white bg-admin-bg rounded-lg hover:bg-admin-border transition-colors">
                                            Ver
                                        </a>
                                        <?php if($visit->status === 'pending'): ?>
                                            <form action="<?php echo e(route('admin.visits.confirm', $visit)); ?>" method="POST"
                                                class="inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PATCH'); ?>
                                                <button type="submit"
                                                    class="px-3 py-1.5 text-xs font-medium text-green-400 bg-green-500/10 rounded-lg hover:bg-green-500/20 transition-colors">
                                                    Confirmar
                                                </button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <p class="mt-4 text-sm text-gray-500">Nenhuma visita encontrada</p>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <?php if($visits->hasPages()): ?>
                <div class="px-6 py-4 border-t border-admin-border">
                    <?php echo e($visits->links()); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laravel_projects\museo\resources\views/admin/visits/index.blade.php ENDPATH**/ ?>