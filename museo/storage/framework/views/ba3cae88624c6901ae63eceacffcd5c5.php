<?php $__env->startSection('title', 'Configurações do Site'); ?>
<?php $__env->startSection('page-title', 'Configurações do Site'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-white">Configurações do Site</h1>
        <p class="mt-1 text-sm text-gray-500">Informações de contacto e redes sociais</p>
    </div>

    <form action="<?php echo e(route('admin.settings.site.update')); ?>" method="POST" class="space-y-6">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <!-- Contact Information -->
        <div class="bg-admin-card border border-admin-border rounded-xl overflow-hidden">
            <div class="px-6 py-4 border-b border-admin-border">
                <h2 class="text-lg font-medium text-white">Informações de Contacto</h2>
                <p class="text-sm text-gray-500">Dados exibidos no site e rodapé</p>
            </div>
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="contact_email" class="block text-sm font-medium text-gray-300 mb-2">Email Principal</label>
                        <input type="email" name="settings[contact_email]" id="contact_email" 
                               value="<?php echo e($settings['contact_email'] ?? ''); ?>"
                               class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none"
                               placeholder="museu@exemplo.pt">
                    </div>
                    <div>
                        <label for="contact_phone" class="block text-sm font-medium text-gray-300 mb-2">Telefone</label>
                        <input type="tel" name="settings[contact_phone]" id="contact_phone" 
                               value="<?php echo e($settings['contact_phone'] ?? ''); ?>"
                               class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none"
                               placeholder="+351 249 000 000">
                    </div>
                </div>
                <div>
                    <label for="contact_address" class="block text-sm font-medium text-gray-300 mb-2">Morada</label>
                    <textarea name="settings[contact_address]" id="contact_address" rows="2"
                              class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none"
                              placeholder="Rua..., Alcanena"><?php echo e($settings['contact_address'] ?? ''); ?></textarea>
                </div>
                <div>
                    <label for="google_maps_url" class="block text-sm font-medium text-gray-300 mb-2">Link Google Maps</label>
                    <input type="url" name="settings[google_maps_url]" id="google_maps_url" 
                           value="<?php echo e($settings['google_maps_url'] ?? ''); ?>"
                           class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none"
                           placeholder="https://maps.google.com/...">
                </div>
            </div>
        </div>

        <!-- Social Media -->
        <div class="bg-admin-card border border-admin-border rounded-xl overflow-hidden">
            <div class="px-6 py-4 border-b border-admin-border">
                <h2 class="text-lg font-medium text-white">Redes Sociais</h2>
                <p class="text-sm text-gray-500">Links para as páginas oficiais</p>
            </div>
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="facebook_url" class="block text-sm font-medium text-gray-300 mb-2">
                            <span class="inline-flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z"/></svg>
                                Facebook
                            </span>
                        </label>
                        <input type="url" name="settings[facebook_url]" id="facebook_url" 
                               value="<?php echo e($settings['facebook_url'] ?? ''); ?>"
                               class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none"
                               placeholder="https://facebook.com/...">
                    </div>
                    <div>
                        <label for="instagram_url" class="block text-sm font-medium text-gray-300 mb-2">
                            <span class="inline-flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zM12 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                                Instagram
                            </span>
                        </label>
                        <input type="url" name="settings[instagram_url]" id="instagram_url" 
                               value="<?php echo e($settings['instagram_url'] ?? ''); ?>"
                               class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none"
                               placeholder="https://instagram.com/...">
                    </div>
                    <div>
                        <label for="twitter_url" class="block text-sm font-medium text-gray-300 mb-2">
                            <span class="inline-flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                X (Twitter)
                            </span>
                        </label>
                        <input type="url" name="settings[twitter_url]" id="twitter_url" 
                               value="<?php echo e($settings['twitter_url'] ?? ''); ?>"
                               class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none"
                               placeholder="https://x.com/...">
                    </div>
                    <div>
                        <label for="youtube_url" class="block text-sm font-medium text-gray-300 mb-2">
                            <span class="inline-flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                                YouTube
                            </span>
                        </label>
                        <input type="url" name="settings[youtube_url]" id="youtube_url" 
                               value="<?php echo e($settings['youtube_url'] ?? ''); ?>"
                               class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none"
                               placeholder="https://youtube.com/...">
                    </div>
                </div>
            </div>
        </div>

        <!-- SEO Settings -->
        <div class="bg-admin-card border border-admin-border rounded-xl overflow-hidden">
            <div class="px-6 py-4 border-b border-admin-border">
                <h2 class="text-lg font-medium text-white">SEO e Metadados</h2>
                <p class="text-sm text-gray-500">Otimização para motores de busca</p>
            </div>
            <div class="p-6 space-y-6">
                <div>
                    <label for="site_title" class="block text-sm font-medium text-gray-300 mb-2">Título do Site</label>
                    <input type="text" name="settings[site_title]" id="site_title" 
                           value="<?php echo e($settings['site_title'] ?? 'Museu Municipal de Alcanena'); ?>"
                           class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none">
                </div>
                <div>
                    <label for="site_description" class="block text-sm font-medium text-gray-300 mb-2">Descrição</label>
                    <textarea name="settings[site_description]" id="site_description" rows="3"
                              class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none"
                              placeholder="Descrição do museu para motores de busca..."><?php echo e($settings['site_description'] ?? ''); ?></textarea>
                    <p class="mt-1 text-xs text-gray-500">Recomendado: 150-160 caracteres</p>
                </div>
                <div>
                    <label for="site_keywords" class="block text-sm font-medium text-gray-300 mb-2">Palavras-chave</label>
                    <input type="text" name="settings[site_keywords]" id="site_keywords" 
                           value="<?php echo e($settings['site_keywords'] ?? ''); ?>"
                           class="w-full rounded-lg bg-admin-bg border border-admin-border px-4 py-2.5 text-white focus:border-accent focus:outline-none"
                           placeholder="museu, alcanena, curtumes, património, história">
                    <p class="mt-1 text-xs text-gray-500">Separadas por vírgula</p>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-end">
            <button type="submit" 
                    class="px-6 py-2 bg-accent hover:bg-accent-hover text-white text-sm font-medium rounded-lg transition-colors">
                Guardar Configurações
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laravel_projects\museo\resources\views/admin/settings/site.blade.php ENDPATH**/ ?>