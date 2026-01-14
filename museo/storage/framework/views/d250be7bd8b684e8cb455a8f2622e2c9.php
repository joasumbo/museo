<?php $__env->startSection('title', 'Novo Evento'); ?>
<?php $__env->startSection('page-title', 'Novo Evento'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <a href="<?php echo e(request()->has('start_date') ? route('admin.events.calendar') : route('admin.events.index')); ?>" 
           class="inline-flex items-center text-sm text-gray-400 hover:text-white">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Voltar <?php echo e(request()->has('start_date') ? 'ao calendário' : 'aos eventos'); ?>

        </a>
    </div>

    <div class="bg-admin-card border border-admin-border rounded-xl">
        <div class="px-6 py-4 border-b border-admin-border">
            <h2 class="text-lg font-medium text-white">Criar Novo Evento</h2>
            <p class="text-sm text-gray-500">Preencha os detalhes do evento</p>
        </div>

        <form action="<?php echo e(route('admin.events.store')); ?>" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            <?php echo csrf_field(); ?>

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-300 mb-2">Título *</label>
                <input type="text" name="title" id="title" value="<?php echo e(old('title')); ?>" required
                       class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white placeholder-gray-500 focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none"
                       placeholder="Nome do evento">
                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-1 text-sm text-red-400"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Type & Location -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-300 mb-2">Tipo *</label>
                    <select name="type" id="type" required
                            class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none">
                        <option value="exhibition" <?php echo e(old('type') === 'exhibition' ? 'selected' : ''); ?>>Exposição</option>
                        <option value="workshop" <?php echo e(old('type') === 'workshop' ? 'selected' : ''); ?>>Workshop</option>
                        <option value="conference" <?php echo e(old('type') === 'conference' ? 'selected' : ''); ?>>Conferência</option>
                        <option value="guided_tour" <?php echo e(old('type') === 'guided_tour' ? 'selected' : ''); ?>>Visita Guiada</option>
                        <option value="other" <?php echo e(old('type') === 'other' ? 'selected' : ''); ?>>Outro</option>
                    </select>
                </div>
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-300 mb-2">Local</label>
                    <input type="text" name="location" id="location" value="<?php echo e(old('location', 'Museu Municipal de Alcanena')); ?>"
                           class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white placeholder-gray-500 focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none">
                </div>
            </div>

            <!-- Dates -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="start_date" class="block text-sm font-medium text-gray-300 mb-2">Data de Início *</label>
                    <input type="date" name="start_date" id="start_date" value="<?php echo e(old('start_date', request('start_date'))); ?>" required
                           class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none">
                </div>
                <div>
                    <label for="end_date" class="block text-sm font-medium text-gray-300 mb-2">Data de Fim</label>
                    <input type="date" name="end_date" id="end_date" value="<?php echo e(old('end_date', request('end_date'))); ?>"
                           class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none">
                </div>
            </div>

            <!-- Times -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="start_time" class="block text-sm font-medium text-gray-300 mb-2">Hora de Início</label>
                    <input type="time" name="start_time" id="start_time" value="<?php echo e(old('start_time', request('start_time'))); ?>"
                           class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none">
                </div>
                <div>
                    <label for="end_time" class="block text-sm font-medium text-gray-300 mb-2">Hora de Fim</label>
                    <input type="time" name="end_time" id="end_time" value="<?php echo e(old('end_time', request('end_time'))); ?>"
                           class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none">
                </div>
            </div>

            <!-- Short Description -->
            <div>
                <label for="short_description" class="block text-sm font-medium text-gray-300 mb-2">Descrição Curta</label>
                <input type="text" name="short_description" id="short_description" value="<?php echo e(old('short_description')); ?>" maxlength="500"
                       class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white placeholder-gray-500 focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none"
                       placeholder="Breve descrição para listagens">
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-300 mb-2">Descrição Completa *</label>
                <textarea name="description" id="description" rows="6" required
                          class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white placeholder-gray-500 focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none"
                          placeholder="Descrição detalhada do evento..."><?php echo e(old('description')); ?></textarea>
                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-1 text-sm text-red-400"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Image -->
            <div>
                <label for="image" class="block text-sm font-medium text-gray-300 mb-2">Imagem</label>
                <div class="flex items-center justify-center w-full">
                    <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-admin-border border-dashed rounded-lg cursor-pointer bg-admin-bg hover:bg-admin-hover transition-colors">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <p class="text-xs text-gray-500">Clique para carregar imagem (max 2MB)</p>
                        </div>
                        <input type="file" name="image" id="image" class="hidden" accept="image/*">
                    </label>
                </div>
            </div>

            <!-- Price & Capacity -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="flex items-center space-x-3 cursor-pointer">
                        <input type="checkbox" name="is_free" value="1" <?php echo e(old('is_free', true) ? 'checked' : ''); ?>

                               class="h-4 w-4 rounded border-admin-border bg-admin-bg text-accent focus:ring-accent/20">
                        <span class="text-sm text-gray-300">Entrada Gratuita</span>
                    </label>
                </div>
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-300 mb-2">Preço (€)</label>
                    <input type="number" name="price" id="price" value="<?php echo e(old('price')); ?>" step="0.01" min="0"
                           class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none"
                           placeholder="0.00">
                </div>
                <div>
                    <label for="max_capacity" class="block text-sm font-medium text-gray-300 mb-2">Capacidade Máxima</label>
                    <input type="number" name="max_capacity" id="max_capacity" value="<?php echo e(old('max_capacity')); ?>" min="1"
                           class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none"
                           placeholder="Sem limite">
                </div>
            </div>

            <!-- Toggles -->
            <div class="flex flex-wrap gap-6">
                <label class="flex items-center space-x-3 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" <?php echo e(old('is_active', true) ? 'checked' : ''); ?>

                           class="h-4 w-4 rounded border-admin-border bg-admin-bg text-accent focus:ring-accent/20">
                    <span class="text-sm text-gray-300">Evento Ativo</span>
                </label>
                <label class="flex items-center space-x-3 cursor-pointer">
                    <input type="checkbox" name="is_featured" value="1" <?php echo e(old('is_featured') ? 'checked' : ''); ?>

                           class="h-4 w-4 rounded border-admin-border bg-admin-bg text-accent focus:ring-accent/20">
                    <span class="text-sm text-gray-300">Destacar na Homepage</span>
                </label>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-admin-border">
                <a href="<?php echo e(route('admin.events.index')); ?>" 
                   class="px-4 py-2 text-sm font-medium text-gray-400 hover:text-white transition-colors">
                    Cancelar
                </a>
                <button type="submit" 
                        class="px-6 py-2 bg-accent hover:bg-accent-hover text-white text-sm font-medium rounded-lg transition-colors">
                    Criar Evento
                </button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laravel_projects\museo\resources\views/admin/events/create.blade.php ENDPATH**/ ?>