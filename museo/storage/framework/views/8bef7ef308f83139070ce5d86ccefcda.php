<footer class="footer-wrapper footer-layout1 overflow-hidden">
    <div class="container">
        <div class="footer-menu-area" style="padding: 60px 0 30px;">
            <ul class="footer-menu-list" style="justify-content: center; display: flex; gap: 30px; flex-wrap: wrap; list-style: none; padding: 0; margin: 0;">
                <li><a href="<?php echo e(route('home')); ?>">INÍCIO</a></li>
                <li><a href="<?php echo e(route('sobre')); ?>">O MUSEU</a></li>
                <li><a href="<?php echo e(route('colecoes')); ?>">COLEÇÕES</a></li>
                <li><a href="<?php echo e(route('eventos')); ?>">EVENTOS</a></li>
                <li><a href="<?php echo e(route('horarios')); ?>">HORÁRIOS</a></li>
                <li><a href="<?php echo e(route('contactos')); ?>">CONTACTOS</a></li>
            </ul>
        </div>
        <div class="copyright-wrap text-center" style="padding: 30px 0; border-top: 1px solid rgba(255,255,255,0.1);">
            <p class="copyright-text text-white mb-0">© <?php echo e(date('Y')); ?> Museu Municipal de Alcanena. Todos os Direitos Reservados.</p>
        </div>
    </div>
</footer>
<?php /**PATH C:\laravel_projects\museo\resources\views/components/footer.blade.php ENDPATH**/ ?>