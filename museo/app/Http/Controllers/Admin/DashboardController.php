<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Event;
use App\Models\PageView;
use App\Models\Visit;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Estatísticas gerais
        $stats = [
            'total_events' => Event::count(),
            'active_events' => Event::active()->upcoming()->count(),
            'pending_visits' => Visit::pending()->count(),
            'unread_contacts' => Contact::unread()->count(),
            'today_views' => PageView::today()->count(),
            'month_views' => PageView::thisMonth()->count(),
        ];

        // Visitas agendadas para hoje
        $todayVisits = Visit::today()
            ->whereIn('status', ['pending', 'confirmed'])
            ->orderBy('preferred_time')
            ->get();

        // Próximas visitas (7 dias)
        $upcomingVisits = Visit::whereBetween('visit_date', [
                now()->toDateString(),
                now()->addDays(7)->toDateString()
            ])
            ->whereIn('status', ['pending', 'confirmed'])
            ->orderBy('visit_date')
            ->orderBy('preferred_time')
            ->limit(10)
            ->get();

        // Últimos contatos não lidos
        $recentContacts = Contact::unread()
            ->latest()
            ->limit(5)
            ->get();

        // Eventos ativos
        $activeEvents = Event::active()
            ->upcoming()
            ->orderBy('start_date')
            ->limit(5)
            ->get();

        // Dados para gráfico de visualizações (últimos 30 dias)
        $viewsData = $this->getViewsChartData();

        // Dados para gráfico de visitas por tipo
        $visitsTypeData = $this->getVisitsTypeData();

        return view('admin.dashboard', compact(
            'stats',
            'todayVisits',
            'upcomingVisits',
            'recentContacts',
            'activeEvents',
            'viewsData',
            'visitsTypeData'
        ));
    }

    private function getViewsChartData(): array
    {
        $views = PageView::getViewsPerDay(30);
        
        $labels = [];
        $data = [];
        
        for ($i = 29; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $labels[] = now()->subDays($i)->format('d/m');
            $data[] = $views[$date] ?? 0;
        }

        return [
            'labels' => $labels,
            'data' => $data,
        ];
    }

    private function getVisitsTypeData(): array
    {
        $visits = Visit::selectRaw('visit_type, COUNT(*) as count')
            ->whereMonth('created_at', now()->month)
            ->groupBy('visit_type')
            ->pluck('count', 'visit_type')
            ->toArray();

        return [
            'labels' => ['Individual', 'Grupo', 'Escolar', 'Visita Guiada'],
            'data' => [
                $visits['individual'] ?? 0,
                $visits['group'] ?? 0,
                $visits['school'] ?? 0,
                $visits['guided'] ?? 0,
            ],
        ];
    }
}
