<h1>Olá, {{ $visit->name }}!</h1>
<p>É com prazer que confirmamos a sua visita ao Museu.</p>
<ul>
    <li><strong>Data:</strong> {{ $visit->visit_date->format('d/m/Y') }}</li>
    <li><strong>Hora:</strong> {{ \Carbon\Carbon::parse($visit->preferred_time)->format('H:i') }}</li>
    <li><strong>Tipo:</strong> {{ $visit->getVisitTypeLabel() }}</li>
</ul>
<p>Esperamos por si!</p>
