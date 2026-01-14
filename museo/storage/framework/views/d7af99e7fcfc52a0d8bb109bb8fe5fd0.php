<h1>Olá, <?php echo e($visit->name); ?>!</h1>
<p>É com prazer que confirmamos a sua visita ao Museu.</p>
<ul>
    <li><strong>Data:</strong> <?php echo e($visit->visit_date->format('d/m/Y')); ?></li>
    <li><strong>Hora:</strong> <?php echo e(\Carbon\Carbon::parse($visit->preferred_time)->format('H:i')); ?></li>
    <li><strong>Tipo:</strong> <?php echo e($visit->getVisitTypeLabel()); ?></li>
</ul>
<p>Esperamos por si!</p>
<?php /**PATH C:\laravel_projects\museo\resources\views/emails/visit-confirmed.blade.php ENDPATH**/ ?>