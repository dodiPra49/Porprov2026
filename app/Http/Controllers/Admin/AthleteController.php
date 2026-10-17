<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Athlete;
use App\Models\Contingent;
use App\Models\Sport;
use Illuminate\Http\Request;

class AthleteController extends Controller
{
    public function index(Request $request)
    {
        $query = Athlete::with('contingent', 'sport');

        if ($request->has('contingent_id') && $request->contingent_id != '') {
            $query->where('contingent_id', $request->contingent_id);
        }

        if ($request->has('sport_id') && $request->sport_id != '') {
            $query->where('sport_id', $request->sport_id);
        }

        if ($request->has('search') && $request->search != '') {
            $query->where(function ($q) use ($request) {
                $q->where('full_name', 'like', '%' . $request->search . '%')
                  ->orWhere('nik', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->wantsJson() || $request->isJson() || $request->ajax() || str_contains($request->header('Accept', ''), 'application/json')) {
            $all = $query->latest()->get();
            return response()->json([
                'success' => true,
                'data' => $all,
                'total' => $all->count(),
            ]);
        }

        $athletes = $query->latest()->paginate(10);
        $contingents = Contingent::orderBy('name')->get();
        $sports = Sport::orderBy('name')->get();

        return view('admin.athletes.index', compact('athletes', 'contingents', 'sports'));
    }

    public function create()
    {
        $contingents = Contingent::orderBy('name')->get();
        $sports = Sport::orderBy('name')->get();
        return view('admin.athletes.create', compact('contingents', 'sports'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'contingent_id' => 'required|exists:contingents,id',
            'sport_id' => 'required|exists:sports,id',
            'nik' => 'required|string|size:16|unique:athletes,nik',
            'full_name' => 'required|string|max:255',
            'gender' => 'required|in:L,P',
            'birth_place' => 'nullable|string|max:100',
            'birth_date' => 'nullable|date',
            'height_cm' => 'nullable|integer|min:100|max:250',
            'weight_kg' => 'nullable|integer|min:30|max:200',
            'achievements' => 'nullable|string',
            'photo_url' => 'nullable|string',
        ]);

        $validated['is_verified'] = $request->has('is_verified')
            ? filter_var($request->input('is_verified'), FILTER_VALIDATE_BOOLEAN)
            : false;

        $athlete = Athlete::create($validated);

        if ($request->wantsJson() || $request->isJson() || $request->ajax() || str_contains($request->header('Accept', ''), 'application/json')) {
            return response()->json([
                'success' => true,
                'message' => 'Data atlet baru berhasil didaftarkan!',
                'data' => $athlete->load(['contingent', 'sport']),
            ], 201);
        }

        return redirect()->route('admin.athletes.index')->with('success', 'Data atlet baru berhasil didaftarkan!');
    }

    public function edit($id)
    {
        $athlete = Athlete::findOrFail($id);
        $contingents = Contingent::orderBy('name')->get();
        $sports = Sport::orderBy('name')->get();
        return view('admin.athletes.edit', compact('athlete', 'contingents', 'sports'));
    }

    public function update(Request $request, $id)
    {
        $athlete = Athlete::findOrFail($id);

        $validated = $request->validate([
            'contingent_id' => 'required|exists:contingents,id',
            'sport_id' => 'required|exists:sports,id',
            'nik' => 'required|string|size:16|unique:athletes,nik,' . $athlete->id,
            'full_name' => 'required|string|max:255',
            'gender' => 'required|in:L,P',
            'birth_place' => 'nullable|string|max:100',
            'birth_date' => 'nullable|date',
            'height_cm' => 'nullable|integer|min:100|max:250',
            'weight_kg' => 'nullable|integer|min:30|max:200',
            'achievements' => 'nullable|string',
            'photo_url' => 'nullable|string',
        ]);

        $validated['is_verified'] = $request->has('is_verified');

        $athlete->update($validated);

        return redirect()->route('admin.athletes.index')->with('success', 'Data atlet ' . $athlete->full_name . ' berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $athlete = Athlete::findOrFail($id);
        $name = $athlete->full_name;
        $athlete->delete();

        return redirect()->route('admin.athletes.index')->with('success', 'Data atlet ' . $name . ' berhasil dihapus.');
    }

    public function toggleVerify($id)
    {
        $athlete = Athlete::findOrFail($id);
        $athlete->is_verified = !$athlete->is_verified;
        $athlete->save();

        return back()->with('success', 'Status verifikasi atlet ' . $athlete->full_name . ' berhasil diubah.');
    }
}
