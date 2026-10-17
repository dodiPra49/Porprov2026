@extends('layouts.admin')

@section('title', 'Jadwal & Skor Pertandingan')
@section('page-title', 'Jadwal Pertandingan & Entri Skor')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h3 class="text-xl font-extrabold text-white">Jadwal & Hasil Pertandingan PORPROV 2026</h3>
            <p class="text-xs text-slate-400">Entrikan jadwal laga baru, perbarui status pertandingan (Live / Selesai), dan input perolehan skor pertandingan.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.schedules.create') }}" class="px-4 py-2.5 bg-rose-600 hover:bg-rose-500 text-white font-black text-xs rounded-xl shadow-lg shadow-rose-950/40 transition flex items-center gap-2">
                <i class="fa-solid fa-plus"></i>
                <span>+ Tambah Jadwal Pertandingan</span>
            </a>
        </div>
    </div>

    <div class="bg-slate-950 border border-slate-800 rounded-2xl overflow-hidden shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="bg-slate-900 border-b border-slate-800 text-slate-400 text-xs uppercase tracking-wider">
                        <th class="py-4 px-4">Kode & Babak</th>
                        <th class="py-4 px-4">Nomor Lomba / Cabor</th>
                        <th class="py-4 px-4">Venue & Waktu</th>
                        <th class="py-4 px-4 text-center">Status</th>
                        <th class="py-4 px-4">Skor / Hasil Terkini</th>
                        <th class="py-4 px-4 text-center">Aksi Manajemen</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/80">
                    @forelse($schedules as $sch)
                    <tr class="hover:bg-slate-900/60 transition">
                        <td class="py-4 px-4">
                            <span class="text-xs font-mono font-bold text-amber-400 block">{{ $sch->match_code }}</span>
                            <span class="text-xs font-semibold text-white">{{ $sch->round_name }}</span>
                        </td>
                        <td class="py-4 px-4">
                            <p class="text-xs font-bold text-white">{{ $sch->subSport->name ?? '-' }}</p>
                            <p class="text-[11px] text-rose-400">{{ $sch->subSport->sport->name ?? '-' }} ({{ $sch->subSport->gender_category ?? '-' }})</p>
                        </td>
                        <td class="py-4 px-4 text-xs text-slate-300">
                            <p class="font-medium text-white">{{ $sch->venue->name ?? '-' }}</p>
                            <p class="text-[11px] text-slate-500">{{ $sch->scheduled_at ? $sch->scheduled_at->format('d M Y, H:i') : '-' }} WIB</p>
                        </td>
                        <td class="py-4 px-4 text-center">
                            @if($sch->status === 'completed')
                                <span class="px-2.5 py-1 rounded-full text-[11px] font-bold bg-emerald-500/20 text-emerald-400 border border-emerald-500/30">
                                    Completed
                                </span>
                            @elseif($sch->status === 'ongoing')
                                <span class="px-2.5 py-1 rounded-full text-[11px] font-bold bg-rose-500/20 text-rose-400 border border-rose-500/30 animate-pulse">
                                    Live (Ongoing)
                                </span>
                            @elseif($sch->status === 'postponed')
                                <span class="px-2.5 py-1 rounded-full text-[11px] font-bold bg-amber-500/20 text-amber-400 border border-amber-500/30">
                                    Postponed
                                </span>
                            @else
                                <span class="px-2.5 py-1 rounded-full text-[11px] font-bold bg-slate-800 text-slate-300">
                                    Upcoming
                                </span>
                            @endif
                        </td>
                        <td class="py-4 px-4">
                            @if($sch->matchResult && $sch->matchResult->score_summary)
                                <span class="font-mono font-black text-amber-400 text-sm block">{{ $sch->matchResult->score_summary }}</span>
                                @if($sch->matchResult->winnerContingent)
                                    <span class="text-[11px] text-emerald-400 font-medium">🏆 {{ $sch->matchResult->winnerContingent->name }}</span>
                                @elseif($sch->matchResult->winnerAthlete)
                                    <span class="text-[11px] text-emerald-400 font-medium">🏆 {{ $sch->matchResult->winnerAthlete->full_name }}</span>
                                @endif
                            @else
                                <span class="text-xs text-slate-500 italic">Belum ada skor dientrikan</span>
                            @endif
                        </td>
                        <td class="py-4 px-4 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.schedules.edit-result', $sch->id) }}" class="px-3 py-1.5 bg-rose-600 hover:bg-rose-500 text-white text-xs font-bold rounded-lg shadow transition flex items-center gap-1.5">
                                    <i class="fa-solid fa-trophy"></i>
                                    <span>Entri Skor</span>
                                </a>
                                <form action="{{ route('admin.schedules.destroy', $sch->id) }}" method="POST" onsubmit="return confirm('Hapus jadwal pertandingan {{ $sch->match_code }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 bg-slate-900 hover:bg-rose-950 text-rose-400 text-xs rounded-lg transition" title="Hapus Jadwal">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-8 text-center text-slate-500 text-sm">
                            Belum ada jadwal pertandingan. Klik tombol "+ Tambah Jadwal Pertandingan" untuk menambahkan jadwal baru.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-slate-800 bg-slate-950">
            {{ $schedules->links() }}
        </div>
    </div>
</div>
@endsection
