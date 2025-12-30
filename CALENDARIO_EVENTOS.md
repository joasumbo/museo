# Sistema de Calendário de Eventos

## Funcionalidades Implementadas

### Visualização
- ✅ **Calendário Interativo** (FullCalendar.js 6.1.10)
  - Vista semanal (padrão)
  - Vista mensal
  - Vista diária
  - Alternância entre lista e calendário

### Interatividade
- ✅ **Criar Evento**
  - Clicar em dia vazio → redireciona para criação com data pré-preenchida
  - Arrastar para selecionar período → cria com intervalo
  - Mesmo quando já existe evento no dia, permite criar mais

- ✅ **Editar Evento**
  - Clicar em evento → modal com detalhes completos
  - Botão "Editar Evento" → formulário completo
  - Arrastar evento → atualiza datas automaticamente
  - Redimensionar evento → atualiza duração

- ✅ **Eliminar Evento**
  - Modal de detalhes → botão "Eliminar"
  - Confirmação antes de eliminar
  - Atualização automática do calendário

### Integração com BD
- ✅ Todos os eventos vêm da base de dados
- ✅ CRUD completo funcional
- ✅ Atualizações em tempo real
- ✅ Validação de dados

### Design
- ✅ Tema escuro consistente com o painel admin
- ✅ Cores do site (#C57642) aplicadas
- ✅ Animações suaves
- ✅ Responsivo
- ✅ Badges de status (ativo/inativo/destacado/tipo)

## Rotas Criadas

```php
// Visualização do calendário
GET /admin/events/calendar

// API de dados do calendário (JSON)
GET /admin/events/calendar/data

// Atualização parcial (arrastar eventos)
PATCH /admin/events/{id} (com apenas start_date, end_date, start_time, end_time)

// CRUD completo (já existia)
Resource /admin/events
```

## Controllers

### EventController
- `calendar()` - Renderiza view do calendário
- `calendarData()` - Retorna eventos em formato JSON para FullCalendar
- `update()` - Atualização completa OU parcial (detecta automaticamente)
- `destroy()` - Suporta JSON response para requisições AJAX

## Views

### calendar.blade.php
- Layout completo do calendário
- Modal de detalhes de evento
- JavaScript integrado com FullCalendar
- Estilos personalizados

### Alterações em views existentes
- `index.blade.php` - Toggle Lista/Calendário
- `create.blade.php` - Aceita parâmetros de data da URL

## JavaScript

### Funções Principais
- `showEventDetails(event)` - Exibe modal com detalhes
- `createEventFromSelection(info)` - Redireciona para criação
- `updateEventDates(event)` - Atualiza via AJAX ao arrastar
- `deleteEvent()` - Elimina evento via AJAX
- `closeModal()` - Fecha modal de detalhes

### Eventos FullCalendar
- `eventClick` - Click em evento existente
- `select` - Seleção de período (criar novo)
- `eventDrop` - Arrastar evento
- `eventResize` - Redimensionar evento

## Database

### Eventos de Exemplo (EventSeeder)
6 eventos criados para demonstração:
1. Exposição: Memórias de Alcanena (destacada)
2. Workshop: Arqueologia para Crianças
3. Conferência: Indústria dos Curtumes (destacada)
4. Visita Guiada: Coleção de Arqueologia
5. Noite Europeia dos Museus (destacada)
6. Workshop: Fotografia de Património

## Testes Realizados
✅ Conexão com BD verificada
✅ Eventos criados com sucesso
✅ Sem erros de sintaxe nos controllers
✅ Sem erros nas views
✅ Rotas configuradas corretamente

## Como Usar

1. Aceder ao painel: http://localhost:8000/admin/login
2. Ir para Eventos
3. Clicar no botão "Calendário" (ícone de calendário)
4. Interagir:
   - **Ver detalhes**: Clicar em evento
   - **Criar**: Clicar em dia vazio ou arrastar para selecionar
   - **Mover**: Arrastar evento para nova data
   - **Redimensionar**: Arrastar borda do evento
   - **Eliminar**: Abrir detalhes → Botão "Eliminar"
   - **Editar**: Abrir detalhes → Botão "Editar"

## Próximas Melhorias (Opcionais)
- [ ] Filtros no calendário (por tipo, status)
- [ ] Cores diferentes por tipo de evento
- [ ] Duplicar evento
- [ ] Exportar para iCal/Google Calendar
- [ ] Notificações de eventos próximos
- [ ] Recurring events (eventos recorrentes)
