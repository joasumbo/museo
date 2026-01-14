<?php $__env->startSection('title', 'Perfil'); ?>
<?php $__env->startSection('page-title', 'Perfil'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-2xl mx-auto">
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-white">O Meu Perfil</h1>
        <p class="mt-1 text-sm text-gray-500">Atualizar informações da conta</p>
    </div>

    <div class="bg-admin-card border border-admin-border rounded-xl overflow-hidden">
        <form action="<?php echo e(route('admin.settings.profile.update')); ?>" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <!-- Avatar -->
            <div class="flex items-center space-x-6">
                <div class="relative">
                    <?php if(auth()->user()->avatar): ?>
                        <img src="<?php echo e(asset('storage/' . auth()->user()->avatar)); ?>" 
                             alt="" 
                             class="h-20 w-20 rounded-full object-cover">
                    <?php else: ?>
                        <div class="h-20 w-20 rounded-full bg-accent/20 flex items-center justify-center text-accent text-2xl font-medium">
                            <?php echo e(strtoupper(substr(auth()->user()->name, 0, 1))); ?>

                        </div>
                    <?php endif; ?>
                </div>
                <div>
                    <label class="block">
                        <span class="px-4 py-2 bg-admin-bg hover:bg-admin-hover text-sm text-gray-300 hover:text-white rounded-lg cursor-pointer transition-colors inline-block">
                            Alterar foto
                        </span>
                        <input type="file" name="avatar" class="hidden" accept="image/*">
                    </label>
                    <p class="mt-1 text-xs text-gray-500">JPG, PNG ou GIF. Máximo 2MB.</p>
                </div>
            </div>

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Nome</label>
                <input type="text" name="name" id="name" value="<?php echo e(old('name', auth()->user()->name)); ?>" required
                       class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white placeholder-gray-500 focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none">
                <?php $__errorArgs = ['name'];
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

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                <input type="email" name="email" id="email" value="<?php echo e(old('email', auth()->user()->email)); ?>" required
                       class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white placeholder-gray-500 focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none">
                <?php $__errorArgs = ['email'];
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

            <!-- Phone -->
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-300 mb-2">Telefone</label>
                <input type="tel" name="phone" id="phone" value="<?php echo e(old('phone', auth()->user()->phone)); ?>"
                       class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white placeholder-gray-500 focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none">
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end pt-6 border-t border-admin-border">
                <button type="submit" 
                        class="px-6 py-2 bg-accent hover:bg-accent-hover text-white text-sm font-medium rounded-lg transition-colors">
                    Guardar Alterações
                </button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laravel_projects\museo\resources\views/admin/settings/profile.blade.php ENDPATH**/ ?>