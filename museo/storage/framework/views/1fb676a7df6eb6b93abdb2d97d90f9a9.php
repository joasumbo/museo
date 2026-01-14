<h1>Olá, <?php echo e($visit->name); ?>.</h1>
<p>Lamentamos informar que a sua visita agendada para o dia <?php echo e($visit->visit_date->format('d/m/Y')); ?> foi cancelada.</p>
<?php if($visit->admin_notes): ?>
    <p><strong>Motivo:</strong> <?php echo e($visit->admin_notes ?? '---'); ?></p>
<?php endif; ?>
<p>Por favor, contacte-nos se desejar reagendar.</p>
<?php /**PATH C:\laravel_projects\museo\resources\views/emails/visit-cancelled.blade.php ENDPATH**/ ?>