<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contingent;
use App\Models\MedalTally;
use Illuminate\Http\Request;

class MedalController extends Controller
{
    public function index()
    {
        $medals = MedalTally::with('contingent')
            ->orderBy('gold', 'desc')
            ->orderBy('silver', 'desc')
            ->orderBy('bronze', 'desc')
            ->get();

        $allContingents = Contingent::orderBy('name')->get();

        return view('admin.medals.index', compact('medals', 'allContingents'));
    }

    public function create()
    {
        $contingents = Contingent::with('medalTally')->orderBy('name')->get();
        return view('admin.medals.create', compact('contingents'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'contingent_id' => 'required|exists:contingents,id',
            'gold' => 'required|integer|min:0',
            'silver' => 'required|integer|min:0',
            'bronze' => 'required|integer|min:0',
        ]);

        $contingent = Contingent::findOrFail($validated['contingent_id']);
        $existing = MedalTally::where('contingent_id', $validated['contingent_id'])->first();

        $prevGold = $existing ? (int)$existing->gold : 0;
        $prevSilver = $existing ? (int)$existing->silver : 0;
        $prevBronze = $existing ? (int)$existing->bronze : 0;

        // Akumulasi: Menambahkan data medali baru ke medali yang sudah ada di database
        $newGold = $prevGold + (int)$validated['gold'];
        $newSilver = $prevSilver + (int)$validated['silver'];
        $newBronze = $prevBronze + (int)$validated['bronze'];
        $total = $newGold + $newSilver + $newBronze;

        if ($existing) {
            $existing->update([
                'gold' => $newGold,
                'silver' => $newSilver,
                'bronze' => $newBronze,
                'total_medals' => $total,
                'last_updated_at' => now(),
            ]);
        } else {
            MedalTally::create([
                'contingent_id' => $validated['contingent_id'],
                'gold' => $newGold,
                'silver' => $newSilver,
                'bronze' => $newBronze,
                'total_medals' => $total,
                'rank_position' => 99,
                'last_updated_at' => now(),
            ]);
        }

        $this->recalculateRanks();

        $message = "Sukses menambahkan akumulasi medali untuk {$contingent->name} (+{$validated['gold']} Emas, +{$validated['silver']} Perak, +{$validated['bronze']} Perunggu). Total akumulasi saat ini: {$newGold} Emas, {$newSilver} Perak, {$newBronze} Perunggu (Total: {$total} Medali).";

        return redirect()->route('admin.medals.index')->with('success', $message);
    }

    public function edit($id)
    {
        $medal = MedalTally::with('contingent')->findOrFail($id);
        $contingents = Contingent::orderBy('name')->get();
        return view('admin.medals.edit', compact('medal', 'contingents'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'gold' => 'required|integer|min:0',
            'silver' => 'required|integer|min:0',
            'bronze' => 'required|integer|min:0',
        ]);

        $medal = MedalTally::findOrFail($id);
        $total = $validated['gold'] + $validated['silver'] + $validated['bronze'];

        $medal->update([
            'gold' => $validated['gold'],
            'silver' => $validated['silver'],
            'bronze' => $validated['bronze'],
            'total_medals' => $total,
            'last_updated_at' => now(),
        ]);

        $this->recalculateRanks();

        return redirect()->route('admin.medals.index')->with('success', 'Perolehan medali ' . $medal->contingent->name . ' berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $medal = MedalTally::findOrFail($id);
        $contingentName = $medal->contingent->name;
        $medal->delete();

        $this->recalculateRanks();

        return redirect()->route('admin.medals.index')->with('success', 'Data medali ' . $contingentName . ' berhasil dihapus.');
    }

    private function recalculateRanks(): void
    {
        $all = MedalTally::orderBy('gold', 'desc')
            ->orderBy('silver', 'desc')
            ->orderBy('bronze', 'desc')
            ->get();

        $rank = 1;
        foreach ($all as $item) {
            $item->update(['rank_position' => $rank++]);
        }
    }
}
