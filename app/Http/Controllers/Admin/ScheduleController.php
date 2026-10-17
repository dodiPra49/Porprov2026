<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Athlete;
use App\Models\Contingent;
use App\Models\MatchResult;
use App\Models\Schedule;
use App\Models\SubSport;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with(['subSport.sport', 'venue', 'matchResult.winnerAthlete', 'matchResult.winnerContingent'])
            ->orderBy('scheduled_at', 'desc')
            ->paginate(10);

        $athletes = Athlete::orderBy('full_name')->get();
        $contingents = Contingent::orderBy('name')->get();

        return view('admin.schedules.index', compact('schedules', 'athletes', 'contingents'));
    }

    public function create()
    {
        $subSports = SubSport::with('sport')->orderBy('name')->get();
        $venues = Venue::orderBy('name')->get();
        return view('admin.schedules.create', compact('subSports', 'venues'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sub_sport_id' => 'required|exists:sub_sports,id',
            'venue_id' => 'required|exists:venues,id',
            'round_name' => 'required|string|max:100',
            'scheduled_at' => 'required|date',
            'status' => 'required|in:upcoming,ongoing,completed,postponed',
            'notes' => 'nullable|string',
        ]);

        $validated['match_code'] = 'SCH-' . strtoupper(Str::random(3)) . '-' . rand(100, 999);

        Schedule::create($validated);

        return redirect()->route('admin.schedules.index')->with('success', 'Jadwal pertandingan baru berhasil ditambahkan!');
    }

    public function editResult($id)
    {
        $schedule = Schedule::with(['subSport.sport', 'venue', 'matchResult'])->findOrFail($id);
        $athletes = Athlete::where('sport_id', $schedule->subSport->sport_id ?? 0)->orWhereNotNull('id')->orderBy('full_name')->get();
        $contingents = Contingent::orderBy('name')->get();

        return view('admin.schedules.result', compact('schedule', 'athletes', 'contingents'));
    }

    public function updateResult(Request $request, $scheduleId)
    {
        $schedule = Schedule::findOrFail($scheduleId);

        $validated = $request->validate([
            'status' => 'required|in:upcoming,ongoing,completed,postponed',
            'score_summary' => 'required|string|max:100',
            'winner_athlete_id' => 'nullable|exists:athletes,id',
            'winner_contingent_id' => 'nullable|exists:contingents,id',
            'remarks' => 'nullable|string',
        ]);

        $schedule->update([
            'status' => $validated['status'],
            'finished_at' => $validated['status'] === 'completed' ? now() : null,
        ]);

        MatchResult::updateOrCreate(
            ['schedule_id' => $schedule->id],
            [
                'score_summary' => $validated['score_summary'],
                'winner_athlete_id' => $validated['winner_athlete_id'] ?? null,
                'winner_contingent_id' => $validated['winner_contingent_id'] ?? null,
                'remarks' => $validated['remarks'] ?? null,
                'verified_by' => auth()->id() ?? 1,
                'verified_at' => now(),
            ]
        );

        return redirect()->route('admin.schedules.index')->with('success', 'Hasil & skor pertandingan ' . $schedule->match_code . ' berhasil disimpan!');
    }

    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $code = $schedule->match_code;
        $schedule->delete();

        return redirect()->route('admin.schedules.index')->with('success', 'Jadwal pertandingan ' . $code . ' berhasil dihapus.');
    }
}
