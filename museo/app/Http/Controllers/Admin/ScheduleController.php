<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $currentSeason = $request->input('season', Schedule::getCurrentSeason());
        
        $schedules = Schedule::bySeason($currentSeason)
            ->orderByRaw("FIELD(day_of_week, 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday')")
            ->get();

        return view('admin.schedules.index', compact('schedules', 'currentSeason'));
    }

    public function edit(Schedule $schedule)
    {
        return view('admin.schedules.edit', compact('schedule'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $validated = $request->validate([
            'is_open' => 'boolean',
            'morning_open' => 'nullable|date_format:H:i',
            'morning_close' => 'nullable|date_format:H:i|after:morning_open',
            'afternoon_open' => 'nullable|date_format:H:i',
            'afternoon_close' => 'nullable|date_format:H:i|after:afternoon_open',
            'notes' => 'nullable|string|max:500',
        ], [
            'morning_close.after' => 'A hora de fecho da manhã deve ser depois da hora de abertura.',
            'afternoon_close.after' => 'A hora de fecho da tarde deve ser depois da hora de abertura.',
        ]);

        $validated['is_open'] = $request->boolean('is_open');

        // Se está fechado, limpar os horários
        if (!$validated['is_open']) {
            $validated['morning_open'] = null;
            $validated['morning_close'] = null;
            $validated['afternoon_open'] = null;
            $validated['afternoon_close'] = null;
        }

        $schedule->update($validated);

        return redirect()
            ->route('admin.schedules.index')
            ->with('success', 'Horário atualizado com sucesso!');
    }

    public function updateBatch(Request $request)
    {
        $request->validate([
            'schedules' => 'required|array',
            'schedules.*.id' => 'required|exists:schedules,id',
            'schedules.*.is_open' => 'boolean',
            'schedules.*.morning_open' => 'nullable|date_format:H:i',
            'schedules.*.morning_close' => 'nullable|date_format:H:i',
            'schedules.*.afternoon_open' => 'nullable|date_format:H:i',
            'schedules.*.afternoon_close' => 'nullable|date_format:H:i',
        ]);

        foreach ($request->schedules as $scheduleData) {
            $schedule = Schedule::find($scheduleData['id']);
            
            $isOpen = isset($scheduleData['is_open']) && $scheduleData['is_open'];
            
            $schedule->update([
                'is_open' => $isOpen,
                'morning_open' => $isOpen ? ($scheduleData['morning_open'] ?? null) : null,
                'morning_close' => $isOpen ? ($scheduleData['morning_close'] ?? null) : null,
                'afternoon_open' => $isOpen ? ($scheduleData['afternoon_open'] ?? null) : null,
                'afternoon_close' => $isOpen ? ($scheduleData['afternoon_close'] ?? null) : null,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Horários atualizados com sucesso!',
        ]);
    }
}
