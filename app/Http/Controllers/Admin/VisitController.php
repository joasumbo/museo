<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitController extends Controller
{
    public function index(Request $request)
    {
        $query = Visit::query();

        // Filtros
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('date')) {
            $query->whereDate('visit_date', $request->date);
        }

        if ($request->filled('type')) {
            $query->where('visit_type', $request->type);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('organization', 'like', "%{$search}%");
            });
        }

        $visits = $query->latest()->paginate(15);

        $statusCounts = [
            'all' => Visit::count(),
            'pending' => Visit::pending()->count(),
            'confirmed' => Visit::confirmed()->count(),
            'cancelled' => Visit::cancelled()->count(),
            'completed' => Visit::completed()->count(),
        ];

        return view('admin.visits.index', compact('visits', 'statusCounts'));
    }

    public function show(Visit $visit)
    {
        return view('admin.visits.show', compact('visit'));
    }

    public function confirm(Visit $visit)
    {
        $visit->confirm(Auth::id());

        // Aqui você pode enviar email de confirmação
        // Mail::to($visit->email)->send(new VisitConfirmed($visit));

        return response()->json([
            'success' => true,
            'message' => 'Visita confirmada com sucesso!',
        ]);
    }

    public function cancel(Request $request, Visit $visit)
    {
        $request->validate([
            'reason' => 'nullable|string|max:500',
        ]);

        if ($request->filled('reason')) {
            $visit->update(['admin_notes' => $request->reason]);
        }

        $visit->cancel();

        // Aqui você pode enviar email de cancelamento
        // Mail::to($visit->email)->send(new VisitCancelled($visit));

        return response()->json([
            'success' => true,
            'message' => 'Visita cancelada.',
        ]);
    }

    public function complete(Visit $visit)
    {
        $visit->complete();

        return response()->json([
            'success' => true,
            'message' => 'Visita marcada como concluída.',
        ]);
    }

    public function update(Request $request, Visit $visit)
    {
        $validated = $request->validate([
            'visit_date' => 'sometimes|date',
            'preferred_time' => 'sometimes|date_format:H:i',
            'group_size' => 'sometimes|integer|min:1',
            'admin_notes' => 'nullable|string|max:1000',
        ]);

        $visit->update($validated);

        return redirect()
            ->route('admin.visits.show', $visit)
            ->with('success', 'Visita atualizada com sucesso!');
    }

    public function destroy(Visit $visit)
    {
        $visit->delete();

        return redirect()
            ->route('admin.visits.index')
            ->with('success', 'Visita eliminada com sucesso!');
    }

    public function calendar()
    {
        $visits = Visit::whereIn('status', ['pending', 'confirmed'])
            ->where('visit_date', '>=', now()->subMonth())
            ->get()
            ->map(function ($visit) {
                return [
                    'id' => $visit->id,
                    'title' => $visit->name . ' (' . $visit->group_size . ' pessoas)',
                    'start' => $visit->visit_date->format('Y-m-d') . 'T' . $visit->preferred_time->format('H:i:s'),
                    'backgroundColor' => $visit->status === 'confirmed' ? '#10b981' : '#f59e0b',
                    'borderColor' => $visit->status === 'confirmed' ? '#10b981' : '#f59e0b',
                    'extendedProps' => [
                        'status' => $visit->status,
                        'type' => $visit->visit_type,
                        'organization' => $visit->organization,
                    ],
                ];
            });

        return response()->json($visits);
    }
}
