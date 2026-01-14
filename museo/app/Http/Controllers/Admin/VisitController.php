<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Mail\VisitConfirmedMail;
use App\Mail\VisitCancelledMail;
use Illuminate\Support\Facades\Mail;

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

        $stats = [
            'all' => Visit::count(),
            'pending' => Visit::pending()->count(),
            'confirmed' => Visit::confirmed()->count(),
            'cancelled' => Visit::cancelled()->count(),
            'completed' => Visit::completed()->count(),
        ];

        return view('admin.visits.index', compact('visits', 'stats'));
    }

    public function show(Visit $visit)
    {
        return view('admin.visits.show', compact('visit'));
    }
    public function confirm(Visit $visit)
    {
        try {
            DB::beginTransaction();

            $visit->confirm(Auth::id());

            // Enviar Email
            Mail::to($visit->email)->send(new VisitConfirmedMail($visit));

            DB::commit();

            return redirect()->back()
                ->with('success', 'Visita confirmada e email enviado com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Erro ao confirmar visita ID {$visit->id}: " . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Erro técnico ao processar confirmação. Verifique o log do sistema.');
        }
    }

    public function cancel(Request $request, Visit $visit)
    {
        $request->validate([
            'reason' => 'nullable|string|max:500',
        ]);

        try {
            DB::beginTransaction();

            if ($request->filled('reason')) {
                $visit->update(['admin_notes' => $request->reason]);
            }

            $visit->cancel();

            // Enviar Email
            Mail::to($visit->email)->send(new VisitCancelledMail($visit));

            DB::commit();

            return redirect()->back()
                ->with('success', 'Visita cancelada e email de aviso enviado ao cliente.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Erro ao cancelar visita ID {$visit->id}: " . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Ocorreu um erro ao cancelar a visita.');
        }
    }

    public function complete(Visit $visit)
    {
        $visit->complete();

         return redirect()->back()
                ->with('success', 'Visita marcada como concluída.');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'             => 'required|string|max:255',
            'email'            => 'required|email|max:255',
            'phone'            => 'nullable|string|max:20',
            'organization'     => 'nullable|string|max:255',
            'visit_date'       => 'required|date|after:today',
            'preferred_time'   => 'required',
            'group_size'       => 'required|integer|min:1',
            'visit_type'       => 'required|in:individual,group,school,guided',
            'special_requests' => 'nullable|string|max:1000',
        ], [
            'visit_date.after' => 'A data da visita deve ser posterior a hoje.',
            'visit_type.required' => 'Por favor, selecione o tipo de visita.',
        ]);

        try {
            DB::beginTransaction();

            $validated['status'] = 'pending';

            Visit::create($validated);

            DB::commit();

            return back()->with('success', 'Pedido de agendamento enviado! Aguarde a nossa confirmação por email.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Erro ao agendar visita: " . $e->getMessage());

            return back()
                ->withInput()
                ->with('error', 'Erro técnico ao processar agendamento. Tente novamente mais tarde.');
        }
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
