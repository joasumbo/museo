

<?php $__env->startSection('title', 'Calendário de Eventos'); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-semibold text-white">Calendário de Eventos</h1>
            <p class="mt-1 text-sm text-gray-400">Gerir eventos de forma visual e interativa</p>
        </div>
        
        <div class="flex items-center gap-3">
            <!-- Toggle View -->
            <div class="flex items-center bg-admin-card border border-admin-border rounded-lg p-1">
                <a href="<?php echo e(route('admin.events.index')); ?>" 
                   class="flex items-center gap-2 px-4 py-2 text-sm text-gray-400 hover:text-white rounded transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                    </svg>
                    <span>Lista</span>
                </a>
                <button 
                   class="flex items-center gap-2 px-4 py-2 text-sm text-white bg-accent rounded transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span>Calendário</span>
                </button>
            </div>

            <!-- Create Button -->
            <a href="<?php echo e(route('admin.events.create')); ?>" 
               class="inline-flex items-center gap-2 px-4 py-2 bg-accent hover:bg-accent-hover text-white text-sm font-medium rounded-lg transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Novo Evento
            </a>
        </div>
    </div>
</div>

<!-- Calendar Container -->
<div class="bg-admin-card border border-admin-border rounded-lg shadow-sm">
    <!-- Legenda de Cores -->
    <div class="px-6 pt-4 pb-2 border-b border-admin-border">
        <div class="flex flex-wrap items-center gap-4 text-sm">
            <span class="text-gray-400 font-medium">Tipos de Eventos:</span>
            
            <div class="flex items-center gap-2">
                <div class="w-3 h-3 rounded-sm" style="background: rgba(197, 118, 66, 0.3); border-left: 3px solid #C57642;"></div>
                <span class="text-gray-300">Geral</span>
            </div>
            
            <div class="flex items-center gap-2">
                <div class="w-3 h-3 rounded-sm" style="background: rgba(234, 179, 8, 0.3); border-left: 3px solid #eab308;"></div>
                <span class="text-gray-300">Exposição</span>
            </div>
            
            <div class="flex items-center gap-2">
                <div class="w-3 h-3 rounded-sm" style="background: rgba(34, 197, 94, 0.3); border-left: 3px solid #22c55e;"></div>
                <span class="text-gray-300">Workshop</span>
            </div>
            
            <div class="flex items-center gap-2">
                <div class="w-3 h-3 rounded-sm" style="background: rgba(59, 130, 246, 0.3); border-left: 3px solid #3b82f6;"></div>
                <span class="text-gray-300">Conferência</span>
            </div>
            
            <div class="flex items-center gap-2">
                <div class="w-3 h-3 rounded-sm" style="background: rgba(168, 85, 247, 0.3); border-left: 3px solid #a855f7;"></div>
                <span class="text-gray-300">Visita Guiada</span>
            </div>
            
            <div class="flex items-center gap-2">
                <div class="w-3 h-3 rounded-sm" style="background: rgba(236, 72, 153, 0.3); border-left: 3px solid #ec4899;"></div>
                <span class="text-gray-300">Especial</span>
            </div>
            
            <div class="flex items-center gap-2 ml-4">
                <span class="text-yellow-500">⭐</span>
                <span class="text-gray-300">= Destacado</span>
            </div>
        </div>
    </div>
    
    <div id="calendar"></div>
</div>

<!-- Event Details Modal -->
<div id="eventModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-admin-card border border-admin-border rounded-lg shadow-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div class="sticky top-0 bg-admin-card border-b border-admin-border px-6 py-4 flex items-center justify-between">
            <h3 id="modalTitle" class="text-xl font-semibold text-white"></h3>
            <button onclick="closeModal()" class="text-gray-400 hover:text-white transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        
        <div id="modalBody" class="p-6">
            <!-- Content will be injected here -->
        </div>
        
        <div class="sticky bottom-0 bg-admin-card border-t border-admin-border px-6 py-4 flex items-center justify-between">
            <button onclick="deleteEvent()" id="deleteBtn" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition-colors">
                Eliminar Evento
            </button>
            <div class="flex gap-3">
                <button onclick="closeModal()" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white text-sm font-medium rounded-lg transition-colors">
                    Fechar
                </button>
                <a href="#" id="editBtn" class="px-4 py-2 bg-accent hover:bg-accent-hover text-white text-sm font-medium rounded-lg transition-colors">
                    Editar Evento
                </a>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.css' rel='stylesheet' />
<style>
    /* FullCalendar Custom Styles */
    .fc {
        font-family: 'Roboto', sans-serif;
    }
    
    .fc .fc-toolbar {
        padding: 1.5rem;
        background: #0a0a0a;
        border-bottom: 1px solid #262626;
        flex-wrap: wrap;
        gap: 1rem;
    }
    
    .fc .fc-toolbar-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #ffffff;
        font-family: 'Jost', sans-serif;
    }
    
    .fc .fc-button {
        background: #171717;
        border: 1px solid #262626;
        color: #ffffff;
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
        border-radius: 0.5rem;
        text-transform: capitalize;
        transition: all 0.2s;
    }
    
    .fc .fc-button:hover {
        background: #1f1f1f;
        border-color: #C57642;
    }
    
    .fc .fc-button-primary:not(:disabled):active,
    .fc .fc-button-primary:not(:disabled).fc-button-active {
        background: #C57642;
        border-color: #C57642;
        color: #ffffff;
    }
    
    .fc .fc-button:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }
    
    .fc-theme-standard td,
    .fc-theme-standard th {
        border-color: #262626;
    }
    
    .fc-theme-standard .fc-scrollgrid {
        border-color: #262626;
    }
    
    .fc .fc-daygrid-day-number,
    .fc .fc-col-header-cell-cushion {
        color: #9ca3af;
        text-decoration: none;
        padding: 0.5rem;
    }
    
    .fc .fc-col-header-cell {
        background: #0a0a0a;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.05em;
    }
    
    .fc .fc-daygrid-day {
        background: #0a0a0a;
        transition: background 0.2s;
    }
    
    .fc .fc-daygrid-day:hover {
        background: #171717;
        cursor: pointer;
    }
    
    .fc .fc-daygrid-day.fc-day-today {
        background: #171717 !important;
    }
    
    .fc .fc-daygrid-day.fc-day-today .fc-daygrid-day-number {
        background: #C57642;
        color: #ffffff;
        border-radius: 50%;
        width: 2rem;
        height: 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
    }
    
    .fc .fc-event {
        border: none;
        border-left: 3px solid;
        padding: 0.375rem 0.625rem;
        margin: 0.25rem 0.25rem;
        border-radius: 0.375rem;
        font-size: 0.813rem;
        cursor: pointer;
        transition: all 0.2s;
        background: rgba(197, 118, 66, 0.15) !important;
        border-left-color: #C57642;
        overflow: hidden;
        display: block !important;
    }
    
    .fc .fc-event:hover {
        background: rgba(197, 118, 66, 0.25) !important;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(197, 118, 66, 0.3);
    }
    
    .fc .fc-event-title {
        font-weight: 500;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        color: #ffffff !important;
    }
    
    .fc .fc-event-time {
        font-weight: 600;
        color: #C57642 !important;
        margin-right: 0.375rem;
    }
    
    /* Limitar eventos mostrados por padrão */
    .fc .fc-daygrid-day-events {
        margin-top: 0.25rem;
    }
    
    .fc .fc-daygrid-more-link {
        color: #C57642;
        font-size: 0.75rem;
        font-weight: 600;
        background: rgba(197, 118, 66, 0.1);
        padding: 0.25rem 0.5rem;
        border-radius: 0.25rem;
        margin: 0.25rem;
        transition: all 0.2s;
    }
    
    .fc .fc-daygrid-more-link:hover {
        background: rgba(197, 118, 66, 0.2);
        color: #d4a574;
    }
    
    .fc .fc-popover {
        background: #171717;
        border: 1px solid #262626;
        border-radius: 0.5rem;
        box-shadow: 0 10px 25px rgba(0,0,0,0.5);
        z-index: 9999;
        min-width: 300px;
    }
    
    .fc .fc-popover-header {
        background: #0a0a0a;
        color: #ffffff;
        padding: 0.875rem 1rem;
        border-radius: 0.5rem 0.5rem 0 0;
        border-bottom: 1px solid #262626;
        font-weight: 600;
    }
    
    .fc .fc-popover-body {
        padding: 0.5rem;
    }
    
    .fc .fc-popover .fc-event {
        margin: 0.25rem 0;
    }
    
    .fc .fc-popover-close {
        color: #9ca3af;
        font-size: 1.25rem;
        opacity: 1;
        transition: color 0.2s;
    }
    
    .fc .fc-popover-close:hover {
        color: #ffffff;
    }
        transition: color 0.2s;
    }
    
    .fc .fc-popover-close:hover {
        color: #ffffff;
    }
    
    /* Time Grid Styles */
    .fc .fc-timegrid-slot {
        height: 3rem;
    }
    
    .fc .fc-timegrid-slot-label {
        color: #9ca3af;
        font-size: 0.75rem;
    }
    
    .fc .fc-timegrid-event {
        border-radius: 0.25rem;
        padding: 0.25rem;
    }
    
    /* Cores por tipo de evento */
    .fc-event[data-type="exhibition"],
    .fc-event[data-type="exposicao"] {
        background: rgba(234, 179, 8, 0.15) !important;
        border-left-color: #eab308 !important;
    }
    
    .fc-event[data-type="exhibition"]:hover,
    .fc-event[data-type="exposicao"]:hover {
        background: rgba(234, 179, 8, 0.25) !important;
        box-shadow: 0 4px 8px rgba(234, 179, 8, 0.3);
    }
    
    .fc-event[data-type="workshop"] {
        background: rgba(34, 197, 94, 0.15) !important;
        border-left-color: #22c55e !important;
    }
    
    .fc-event[data-type="workshop"]:hover {
        background: rgba(34, 197, 94, 0.25) !important;
        box-shadow: 0 4px 8px rgba(34, 197, 94, 0.3);
    }
    
    .fc-event[data-type="conference"],
    .fc-event[data-type="conferencia"] {
        background: rgba(59, 130, 246, 0.15) !important;
        border-left-color: #3b82f6 !important;
    }
    
    .fc-event[data-type="conference"]:hover,
    .fc-event[data-type="conferencia"]:hover {
        background: rgba(59, 130, 246, 0.25) !important;
        box-shadow: 0 4px 8px rgba(59, 130, 246, 0.3);
    }
    
    .fc-event[data-type="guided_visit"],
    .fc-event[data-type="visita_guiada"] {
        background: rgba(168, 85, 247, 0.15) !important;
        border-left-color: #a855f7 !important;
    }
    
    .fc-event[data-type="guided_visit"]:hover,
    .fc-event[data-type="visita_guiada"]:hover {
        background: rgba(168, 85, 247, 0.25) !important;
        box-shadow: 0 4px 8px rgba(168, 85, 247, 0.3);
    }
    
    .fc-event[data-type="special"] {
        background: rgba(236, 72, 153, 0.15) !important;
        border-left-color: #ec4899 !important;
    }
    
    .fc-event[data-type="special"]:hover {
        background: rgba(236, 72, 153, 0.25) !important;
        box-shadow: 0 4px 8px rgba(236, 72, 153, 0.3);
    }
    
    /* Badge de evento destacado */
    .fc-event.fc-event-featured::before {
        content: '⭐';
        margin-right: 0.25rem;
        font-size: 0.75rem;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
<script>
    let calendar;
    let currentEventId;
    
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        
        calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            buttonText: {
                today: 'Hoje',
                month: 'Mês',
                week: 'Semana',
                day: 'Dia'
            },
            locale: 'pt',
            firstDay: 1,
            height: 'auto',
            slotMinTime: '09:00:00',
            slotMaxTime: '19:00:00',
            allDaySlot: true,
            navLinks: true,
            selectable: true,
            selectMirror: true,
            editable: true,
            dayMaxEvents: 3, // Mostrar máximo 3 eventos, depois link "+X mais"
            eventMaxStack: 3,
            moreLinkClick: 'popover', // Mostrar popover ao clicar em "+X mais"
            eventDisplay: 'block',
            displayEventTime: true,
            displayEventEnd: false,
            events: function(info, successCallback, failureCallback) {
                fetch('<?php echo e(route('admin.events.calendar.data')); ?>')
                    .then(response => response.json())
                    .then(data => {
                        console.log('Eventos do banco:', data);
                        console.log('Primeiro evento:', data[0]);
                        console.log('Total de eventos:', data.length);
                        successCallback(data);
                    })
                    .catch(error => {
                        console.error('Erro:', error);
                        failureCallback(error);
                    });
            },
            
            // Click em evento existente
            eventClick: function(info) {
                showEventDetails(info.event);
            },
            
            // Click em dia vazio ou arrastar para criar
            select: function(info) {
                createEventFromSelection(info);
            },
            
            // Arrastar evento para nova data
            eventDrop: function(info) {
                updateEventDates(info.event);
            },
            
            // Redimensionar evento
            eventResize: function(info) {
                updateEventDates(info.event);
            }
        });
        
        calendar.render();
    });
    
    function showEventDetails(event) {
        currentEventId = event.id;
        const props = event.extendedProps;
        
        document.getElementById('modalTitle').textContent = event.title;
        document.getElementById('editBtn').href = `/admin/events/${event.id}/edit`;
        
        let imageHtml = '';
        if (props.image) {
            imageHtml = `
                <div class="mb-4">
                    <img src="${props.image}" alt="${event.title}" class="w-full h-48 object-cover rounded-lg">
                </div>
            `;
        }
        
        let statusBadge = props.is_active 
            ? '<span class="px-2 py-1 bg-green-600 text-white text-xs font-medium rounded">Ativo</span>'
            : '<span class="px-2 py-1 bg-gray-600 text-white text-xs font-medium rounded">Inativo</span>';
            
        let featuredBadge = props.is_featured 
            ? '<span class="px-2 py-1 bg-accent text-white text-xs font-medium rounded">⭐ Destacado</span>'
            : '';
        
        document.getElementById('modalBody').innerHTML = `
            ${imageHtml}
            
            <div class="flex gap-2 mb-4">
                ${statusBadge}
                ${featuredBadge}
                <span class="px-2 py-1 bg-blue-600 text-white text-xs font-medium rounded">${props.typeLabel}</span>
            </div>
            
            <div class="space-y-3">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-accent flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <div>
                        <p class="text-sm text-gray-400">Data e Hora</p>
                        <p class="text-white">${formatDate(event.start)} - ${formatDate(event.end)}</p>
                    </div>
                </div>
                
                ${props.location ? `
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-accent flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <div>
                        <p class="text-sm text-gray-400">Localização</p>
                        <p class="text-white">${props.location}</p>
                    </div>
                </div>
                ` : ''}
            </div>
        `;
        
        document.getElementById('eventModal').classList.remove('hidden');
    }
    
    function createEventFromSelection(info) {
        const startDate = info.startStr.split('T')[0];
        const startTime = info.startStr.includes('T') ? info.startStr.split('T')[1].substring(0, 5) : '';
        const endDate = info.endStr.split('T')[0];
        const endTime = info.endStr.includes('T') ? info.endStr.split('T')[1].substring(0, 5) : '';
        
        // Redirecionar para página de criação com datas pré-preenchidas
        const url = new URL('<?php echo e(route('admin.events.create')); ?>', window.location.origin);
        url.searchParams.append('start_date', startDate);
        if (startTime) url.searchParams.append('start_time', startTime);
        url.searchParams.append('end_date', endDate);
        if (endTime) url.searchParams.append('end_time', endTime);
        
        window.location.href = url.toString();
    }
    
    function updateEventDates(event) {
        const formData = new FormData();
        formData.append('_method', 'PATCH');
        formData.append('start_date', event.startStr.split('T')[0]);
        formData.append('end_date', event.endStr.split('T')[0]);
        
        if (event.startStr.includes('T')) {
            formData.append('start_time', event.startStr.split('T')[1].substring(0, 5));
        }
        if (event.endStr.includes('T')) {
            formData.append('end_time', event.endStr.split('T')[1].substring(0, 5));
        }
        
        fetch(`/admin/events/${event.id}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showToast('Evento atualizado com sucesso!', 'success');
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            showToast('Erro ao atualizar evento', 'error');
            event.revert();
        });
    }
    
    function deleteEvent() {
        if (!confirm('Tem certeza que deseja eliminar este evento?')) {
            return;
        }
        
        fetch(`/admin/events/${currentEventId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({
                _method: 'DELETE'
            })
        })
        .then(response => response.json())
        .then(data => {
            showToast('Evento eliminado com sucesso!', 'success');
            closeModal();
            calendar.refetchEvents();
        })
        .catch(error => {
            console.error('Erro:', error);
            showToast('Erro ao eliminar evento', 'error');
        });
    }
    
    function closeModal() {
        document.getElementById('eventModal').classList.add('hidden');
        currentEventId = null;
    }
    
    function formatDate(date) {
        if (!date) return '';
        const d = new Date(date);
        const options = { 
            day: '2-digit', 
            month: 'short', 
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        };
        return d.toLocaleDateString('pt-PT', options);
    }
    
    // Fechar modal ao clicar fora
    document.getElementById('eventModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Bravantic\Desktop\Museu Municipal Alcanena\resources\views/admin/events/calendar.blade.php ENDPATH**/ ?>