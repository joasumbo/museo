<h1>Olá, {{ $visit->name }}.</h1>
<p>Lamentamos informar que a sua visita agendada para o dia {{ $visit->visit_date->format('d/m/Y') }} foi cancelada.</p>
@if ($visit->admin_notes)
    <p><strong>Motivo:</strong> {{ $visit->admin_notes ?? '---' }}</p>
@endif
<p>Por favor, contacte-nos se desejar reagendar.</p>
