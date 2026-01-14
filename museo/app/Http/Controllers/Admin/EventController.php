<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::query();

        // Filtros
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->active();
            } elseif ($request->status === 'inactive') {
                $query->where('is_active', false);
            }
        }

        $events = $query->latest()->paginate(10);

        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }


    public function show(Event $event)
    {
        return view('admin.events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'             => 'required|string|max:255',
            'description'       => 'required|string',
            'short_description' => 'nullable|string|max:500',
            'image'             => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120', // Max 5MB
            'location'          => 'nullable|string|max:255',
            'start_date'        => 'required|date',
            'end_date'          => 'nullable|date|after_or_equal:start_date',
            'start_time'        => 'nullable|date_format:H:i',
            'end_time'          => 'nullable|date_format:H:i',
            'type'              => 'required|in:exhibition,workshop,conference,guided_tour,other',
            'is_featured'       => 'boolean',
            'is_active'         => 'boolean',
            'is_free'           => 'boolean',
            'price'             => 'nullable|numeric|min:0',
            'max_capacity'      => 'nullable|integer|min:1',
        ], [
            'title.required'      => 'O título é obrigatório.',
            'description.required' => 'A descrição é obrigatória.',
            'start_date.required' => 'A data de início é obrigatória.',
            'image.image'         => 'O ficheiro deve ser uma imagem válida.',
            'image.max'           => 'A imagem não pode ter mais de 5MB.',
        ]);

        try {
            DB::beginTransaction();

            $validated['slug']        = Str::slug($validated['title']);
            $validated['created_by']  = Auth::id();

            $validated['is_featured'] = $request->boolean('is_featured');
            $validated['is_active']   = $request->boolean('is_active', true);
            $validated['is_free']     = $request->boolean('is_free', true);

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $path = $request->file('image')->store('events', 'public');
                $validated['image'] = $path;
            }

            Event::create($validated);

            DB::commit();

            return redirect()
                ->route('admin.events.index')
                ->with('success', 'Evento criado com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();

            if (isset($validated['image']) && Storage::disk('public')->exists($validated['image'])) {
                Storage::disk('public')->delete($validated['image']);
            }

            Log::error("Erro ao criar evento: " . $e->getMessage(), [
                'user_id' => Auth::id(),
                'trace' => $e->getTraceAsString()
            ]);

            return back()
                ->withInput()
                ->with('error', 'Ocorreu um erro ao salvar o evento. Tente novamente.');
        }
    }

    public function update(Request $request, Event $event)
    {
        try {
            if ($request->has('start_date') && !$request->has('title')) {
                $validatedDates = $request->validate([
                    'start_date' => 'required|date',
                    'end_date'   => 'nullable|date|after_or_equal:start_date',
                    'start_time' => 'nullable|date_format:H:i',
                    'end_time'   => 'nullable|date_format:H:i',
                ]);

                $event->update($validatedDates);

                return response()->json([
                    'success' => true,
                    'message' => 'Datas atualizadas com sucesso!',
                ]);
            }

            $validated = $request->validate([
                'title'             => 'required|string|max:255',
                'description'       => 'required|string',
                'short_description' => 'nullable|string|max:500',
                'image'             => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
                'location'          => 'nullable|string|max:255',
                'start_date'        => 'required|date',
                'end_date'          => 'nullable|date|after_or_equal:start_date',
                'start_time'        => 'nullable|date_format:H:i',
                'end_time'          => 'nullable|date_format:H:i',
                'type'              => 'required|in:exhibition,workshop,conference,guided_tour,other',
                'is_featured'       => 'boolean',
                'is_active'         => 'boolean',
                'is_free'           => 'boolean',
                'price'             => 'nullable|numeric|min:0',
                'max_capacity'      => 'nullable|integer|min:1',
            ]);

            DB::beginTransaction();

            $validated['is_featured'] = $request->boolean('is_featured');
            $validated['is_active']   = $request->boolean('is_active');
            $validated['is_free']     = $request->boolean('is_free');

            if ($event->title !== $validated['title']) {
                $validated['slug'] = Str::slug($validated['title']);
            }

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                if ($event->image && Storage::disk('public')->exists($event->image)) {
                    Storage::disk('public')->delete($event->image);
                }

                $validated['image'] = $request->file('image')->store('events', 'public');
            }

            $event->update($validated);

            DB::commit();

            return redirect()
                ->route('admin.events.index')
                ->with('success', 'Evento atualizado com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error("Erro ao atualizar evento ID {$event->id}: " . $e->getMessage());

            return back()
                ->withInput()
                ->with('error', 'Ocorreu um erro ao atualizar o evento.');
        }
    }

    public function destroy(Event $event)
    {
        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }

        $event->delete();

        // Se for requisição AJAX, retornar JSON
        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Evento eliminado com sucesso!',
            ]);
        }

        return redirect()
            ->route('admin.events.index')
            ->with('success', 'Evento eliminado com sucesso!');
    }

    public function toggleActive(Event $event)
    {
        $event->update(['is_active' => !$event->is_active]);

        return response()->json([
            'success' => true,
            'is_active' => $event->is_active,
            'message' => $event->is_active ? 'Evento ativado.' : 'Evento desativado.',
        ]);
    }

    public function toggleFeatured(Event $event)
    {
        $event->update(['is_featured' => !$event->is_featured]);

        return response()->json([
            'success' => true,
            'is_featured' => $event->is_featured,
            'message' => $event->is_featured ? 'Evento destacado.' : 'Destaque removido.',
        ]);
    }

    public function calendar()
    {
        return view('admin.events.calendar');
    }

    public function calendarData(Request $request)
    {
        $events = Event::all()->map(function ($event) {
            // Extrair apenas a parte da data (Y-m-d)
            $startDate = substr($event->start_date, 0, 10);
            $endDate = $event->end_date ? substr($event->end_date, 0, 10) : $startDate;

            $start = $startDate . ($event->start_time ? 'T' . substr($event->start_time, 0, 5) : '');
            $end = $endDate . ($event->end_time ? 'T' . substr($event->end_time, 0, 5) : '');

            // Cores por tipo de evento
            $colors = [
                'exhibition' => ['bg' => '#eab308', 'border' => '#ca8a04'],
                'exposicao' => ['bg' => '#eab308', 'border' => '#ca8a04'],
                'workshop' => ['bg' => '#22c55e', 'border' => '#16a34a'],
                'conference' => ['bg' => '#3b82f6', 'border' => '#2563eb'],
                'conferencia' => ['bg' => '#3b82f6', 'border' => '#2563eb'],
                'guided_visit' => ['bg' => '#a855f7', 'border' => '#9333ea'],
                'visita_guiada' => ['bg' => '#a855f7', 'border' => '#9333ea'],
                'special' => ['bg' => '#ec4899', 'border' => '#db2777'],
            ];

            $eventColor = $colors[$event->type] ?? ['bg' => '#C57642', 'border' => '#a85f31'];

            if (!$event->is_active) {
                $eventColor = ['bg' => '#6b7280', 'border' => '#4b5563'];
            }

            $classNames = [];
            if ($event->is_featured) {
                $classNames[] = 'fc-event-featured';
            }

            return [
                'id' => (string) $event->id,
                'title' => $event->title,
                'start' => $start,
                'end' => $end,
                'backgroundColor' => $eventColor['bg'],
                'borderColor' => $eventColor['border'],
                'textColor' => '#ffffff',
                'classNames' => $classNames,
                'extendedProps' => [
                    'type' => $event->type,
                    'typeLabel' => $event->getTypeLabel(),
                    'location' => $event->location,
                    'is_active' => $event->is_active,
                    'is_featured' => $event->is_featured,
                    'image' => $event->image ? asset('storage/' . $event->image) : null,
                ],
            ];
        });

        return response()->json($events);
    }
}
