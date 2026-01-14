

<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('page-title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Welcome & Date -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-white">Olá, <?php echo e(auth()->user()->name); ?>!</h1>
            <p class="mt-1 text-sm text-gray-500"><?php echo e(now()->translatedFormat('l, d \\d\\e F \\d\\e Y')); ?></p>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Eventos Ativos -->
        <div class="bg-admin-card border border-admin-border rounded-xl p-5 hover:border-admin-hover transition-colors">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Eventos Ativos</p>
                    <p class="mt-1 text-2xl font-semibold text-white"><?php echo e($stats['active_events']); ?></p>
                </div>
                <div class="p-3 rounded-lg bg-blue-500/10">
                    <svg class="h-6 w-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-3">
                <a href="<?php echo e(route('admin.events.index')); ?>" class="text-xs text-gray-500 hover:text-accent">Ver todos →</a>
            </div>
        </div>

        <!-- Visitas Pendentes -->
        <div class="bg-admin-card border border-admin-border rounded-xl p-5 hover:border-admin-hover transition-colors">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Visitas Pendentes</p>
                    <p class="mt-1 text-2xl font-semibold text-white"><?php echo e($stats['pending_visits']); ?></p>
                </div>
                <div class="p-3 rounded-lg bg-yellow-500/10">
                    <svg class="h-6 w-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-3">
                <a href="<?php echo e(route('admin.visits.index')); ?>?status=pending" class="text-xs text-gray-500 hover:text-accent">Gerir visitas →</a>
            </div>
        </div>

        <!-- Contactos Não Lidos -->
        <div class="bg-admin-card border border-admin-border rounded-xl p-5 hover:border-admin-hover transition-colors">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Contactos Não Lidos</p>
                    <p class="mt-1 text-2xl font-semibold text-white"><?php echo e($stats['unread_contacts']); ?></p>
                </div>
                <div class="p-3 rounded-lg bg-red-500/10">
                    <svg class="h-6 w-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-3">
                <a href="<?php echo e(route('admin.contacts.index')); ?>?status=unread" class="text-xs text-gray-500 hover:text-accent">Ver mensagens →</a>
            </div>
        </div>

        <!-- Visualizações do Mês -->
        <div class="bg-admin-card border border-admin-border rounded-xl p-5 hover:border-admin-hover transition-colors">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Visualizações (Mês)</p>
                    <p class="mt-1 text-2xl font-semibold text-white"><?php echo e(number_format($stats['month_views'])); ?></p>
                </div>
                <div class="p-3 rounded-lg bg-green-500/10">
                    <svg class="h-6 w-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-3">
                <span class="text-xs text-gray-500"><?php echo e($stats['today_views']); ?> hoje</span>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
        <!-- Views Chart -->
        <div class="bg-admin-card border border-admin-border rounded-xl p-6">
            <h3 class="text-sm font-medium text-gray-400 mb-4">Visualizações (últimos 30 dias)</h3>
            <div class="h-64">
                <canvas id="viewsChart"></canvas>
            </div>
        </div>

        <!-- Visits by Type -->
        <div class="bg-admin-card border border-admin-border rounded-xl p-6">
            <h3 class="text-sm font-medium text-gray-400 mb-4">Visitas por Tipo (este mês)</h3>
            <div class="h-64 flex items-center justify-center">
                <canvas id="visitsTypeChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Two Column Layout -->
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
        <!-- Today's Visits -->
        <div class="bg-admin-card border border-admin-border rounded-xl">
            <div class="px-6 py-4 border-b border-admin-border flex items-center justify-between">
                <h3 class="text-sm font-medium text-white">Visitas de Hoje</h3>
                <span class="text-xs text-gray-500"><?php echo e($todayVisits->count()); ?> agendadas</span>
            </div>
            <div class="divide-y divide-admin-border">
                <?php $__empty_1 = true; $__currentLoopData = $todayVisits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="px-6 py-4 flex items-center justify-between hover:bg-admin-hover transition-colors">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <div class="h-10 w-10 rounded-full bg-accent/10 flex items-center justify-center">
                                    <span class="text-accent font-medium"><?php echo e(substr($visit->name, 0, 1)); ?></span>
                                </div>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-white"><?php echo e($visit->name); ?></p>
                                <p class="text-xs text-gray-500"><?php echo e($visit->group_size); ?> pessoas • <?php echo e($visit->preferred_time->format('H:i')); ?></p>
                            </div>
                        </div>
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium
                            <?php if($visit->status === 'confirmed'): ?> bg-green-500/10 text-green-400
                            <?php else: ?> bg-yellow-500/10 text-yellow-400 <?php endif; ?>">
                            <?php echo e($visit->getStatusLabel()); ?>

                        </span>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="px-6 py-8 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <p class="mt-2 text-sm text-gray-500">Nenhuma visita agendada para hoje</p>
                    </div>
                <?php endif; ?>
            </div>
            <?php if($todayVisits->count() > 0): ?>
                <div class="px-6 py-3 border-t border-admin-border">
                    <a href="<?php echo e(route('admin.visits.index')); ?>" class="text-xs text-accent hover:text-accent-hover">Ver todas as visitas →</a>
                </div>
            <?php endif; ?>
        </div>

        <!-- Recent Contacts -->
        <div class="bg-admin-card border border-admin-border rounded-xl">
            <div class="px-6 py-4 border-b border-admin-border flex items-center justify-between">
                <h3 class="text-sm font-medium text-white">Contactos Recentes</h3>
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-red-500/10 text-red-400">
                    <?php echo e($stats['unread_contacts']); ?> não lidos
                </span>
            </div>
            <div class="divide-y divide-admin-border">
                <?php $__empty_1 = true; $__currentLoopData = $recentContacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <a href="<?php echo e(route('admin.contacts.show', $contact)); ?>" class="block px-6 py-4 hover:bg-admin-hover transition-colors">
                        <div class="flex items-start justify-between">
                            <div class="min-w-0 flex-1">
                                <p class="text-sm font-medium text-white truncate"><?php echo e($contact->name); ?></p>
                                <p class="text-xs text-gray-500 truncate"><?php echo e($contact->subject); ?></p>
                                <p class="mt-1 text-xs text-gray-600 line-clamp-1"><?php echo e(Str::limit($contact->message, 80)); ?></p>
                            </div>
                            <span class="ml-4 flex-shrink-0 text-xs text-gray-600">
                                <?php echo e($contact->created_at->diffForHumans()); ?>

                            </span>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="px-6 py-8 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <p class="mt-2 text-sm text-gray-500">Nenhum contacto por ler</p>
                    </div>
                <?php endif; ?>
            </div>
            <?php if($recentContacts->count() > 0): ?>
                <div class="px-6 py-3 border-t border-admin-border">
                    <a href="<?php echo e(route('admin.contacts.index')); ?>" class="text-xs text-accent hover:text-accent-hover">Ver todos os contactos →</a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Upcoming Visits & Active Events -->
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
        <!-- Upcoming Visits -->
        <div class="bg-admin-card border border-admin-border rounded-xl">
            <div class="px-6 py-4 border-b border-admin-border">
                <h3 class="text-sm font-medium text-white">Próximas Visitas (7 dias)</h3>
            </div>
            <div class="divide-y divide-admin-border max-h-80 overflow-y-auto">
                <?php $__empty_1 = true; $__currentLoopData = $upcomingVisits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="px-6 py-3 flex items-center justify-between hover:bg-admin-hover transition-colors">
                        <div>
                            <p class="text-sm text-white"><?php echo e($visit->name); ?></p>
                            <p class="text-xs text-gray-500">
                                <?php echo e($visit->visit_date->format('d/m')); ?> às <?php echo e($visit->preferred_time->format('H:i')); ?> • 
                                <?php echo e($visit->group_size); ?> pessoas
                            </p>
                        </div>
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium
                            <?php if($visit->status === 'confirmed'): ?> bg-green-500/10 text-green-400
                            <?php else: ?> bg-yellow-500/10 text-yellow-400 <?php endif; ?>">
                            <?php echo e($visit->getStatusLabel()); ?>

                        </span>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="px-6 py-8 text-center">
                        <p class="text-sm text-gray-500">Nenhuma visita nos próximos 7 dias</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Active Events -->
        <div class="bg-admin-card border border-admin-border rounded-xl">
            <div class="px-6 py-4 border-b border-admin-border flex items-center justify-between">
                <h3 class="text-sm font-medium text-white">Eventos Ativos</h3>
                <a href="<?php echo e(route('admin.events.create')); ?>" class="text-xs text-accent hover:text-accent-hover">+ Novo evento</a>
            </div>
            <div class="divide-y divide-admin-border max-h-80 overflow-y-auto">
                <?php $__empty_1 = true; $__currentLoopData = $activeEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <a href="<?php echo e(route('admin.events.edit', $event)); ?>" class="block px-6 py-3 hover:bg-admin-hover transition-colors">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-white"><?php echo e($event->title); ?></p>
                                <p class="text-xs text-gray-500">
                                    <?php echo e($event->getFormattedDateRange()); ?> • <?php echo e($event->getTypeLabel()); ?>

                                </p>
                            </div>
                            <?php if($event->is_featured): ?>
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-accent/10 text-accent">
                                    Destaque
                                </span>
                            <?php endif; ?>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="px-6 py-8 text-center">
                        <p class="text-sm text-gray-500">Nenhum evento ativo</p>
                        <a href="<?php echo e(route('admin.events.create')); ?>" class="mt-2 inline-block text-xs text-accent hover:text-accent-hover">
                            Criar primeiro evento →
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
    // Views Chart
    const viewsCtx = document.getElementById('viewsChart').getContext('2d');
    new Chart(viewsCtx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($viewsData['labels'], 15, 512) ?>,
            datasets: [{
                label: 'Visualizações',
                data: <?php echo json_encode($viewsData['data'], 15, 512) ?>,
                borderColor: '#6366f1',
                backgroundColor: 'rgba(99, 102, 241, 0.1)',
                fill: true,
                tension: 0.4,
                pointRadius: 0,
                pointHoverRadius: 4,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                x: {
                    grid: { color: '#262626' },
                    ticks: { color: '#6b7280', maxTicksLimit: 7 }
                },
                y: {
                    grid: { color: '#262626' },
                    ticks: { color: '#6b7280' },
                    beginAtZero: true
                }
            }
        }
    });

    // Visits Type Chart
    const visitsCtx = document.getElementById('visitsTypeChart').getContext('2d');
    new Chart(visitsCtx, {
        type: 'doughnut',
        data: {
            labels: <?php echo json_encode($visitsTypeData['labels'], 15, 512) ?>,
            datasets: [{
                data: <?php echo json_encode($visitsTypeData['data'], 15, 512) ?>,
                backgroundColor: ['#6366f1', '#10b981', '#f59e0b', '#ef4444'],
                borderWidth: 0,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { color: '#9ca3af', padding: 20 }
                }
            }
        }
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Bravantic\Desktop\Museu Municipal Alcanena\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>