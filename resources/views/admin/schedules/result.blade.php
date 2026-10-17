@extends('layouts.admin')

@section('title', 'Entri Skor & Hasil Pertandingan')
@section('page-title', 'Entri / Input Skor & Pemenang Pertandingan')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-xl font-extrabold text-white">Entri Skor & Hasil Resmi</h3>
            <p class="text-xs text-slate-400">Masukkan hasil akhir pertandingan, skor, serta tentukan atlet/kontingen pemenang.</p>
        </div>
        <a href="{{ route('admin.schedules.index') }}" class="text-xs text-slate-400 hover:text-white flex items-center gap-1">
            &larr; Kembali ke Jadwal
        </a>
    </div>

    <!-- Info Pertandingan Card -->
    <div class="bg-slate-950 border border-slate-800 rounded-2xl p-5 shadow-xl flex items-center justify-between">
        <div>
            <span class="text-xs font-mono font-bold text-amber-400">{{ $schedule->match_code }}</span>
            <h4 class="text-base font-extrabold text-white">{{ $schedule->subSport->name ?? 'Nomor Lomba' }} &bull; {{ $schedule->round_name }}</h4>
            <p class="text-xs text-slate-400">{{ $schedule->subSport->sport->name ?? 'Cabor' }} | Venue: {{ $schedule->venue->name ?? 'Gelanggang' }}</p>
        </div>
        <div class="text-right">
            <span class="text-[11px] px-2.5 py-1 rounded-full font-bold uppercase {{ $schedule->status === 'completed' ? 'bg-emerald-500/20 text-emerald-400 border border-emerald-500/30' : ($schedule->status === 'ongoing' ? 'bg-rose-500/20 text-rose-400 border border-rose-500/30' : 'bg-slate-800 text-slate-300') }}">
                {{ $schedule->status }}
            </span>
            <p class="text-[11px] text-slate-500 mt-1">{{ $schedule->scheduled_at ? $schedule->scheduled_at->format('d M Y, H:i') : '-' }} WIB</p>
        </div>
    </div>

    <form action="{{ route('admin.schedules.update-result', $schedule->id) }}" method="POST" class="bg-slate-950 border border-slate-800 rounded-2xl p-6 sm:p-8 shadow-2xl space-y-6">
        @csrf

        <!-- Status Laga -->
        <div>
            <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Status Pertandingan *</label>
            <select name="status" required class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-rose-500 text-sm">
                <option value="completed" {{ old('status', $schedule->status) === 'completed' ? 'selected' : '' }}>Selesai (Completed)</option>
                <option value="ongoing" {{ old('status', $schedule->status) === 'ongoing' ? 'selected' : '' }}>Sedang Berlangsung (Ongoing / Live)</option>
                <option value="upcoming" {{ old('status', $schedule->status) === 'upcoming' ? 'selected' : '' }}>Akan Datang (Upcoming)</option>
                <option value="postponed" {{ old('status', $schedule->status) === 'postponed' ? 'selected' : '' }}>Ditunda (Postponed)</option>
            </select>
        </div>

        <!-- Ringkasan Skor -->
        <div>
            <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Ringkasan Skor / Hasil Akhir *</label>
            <input 
                type="text" 
                name="score_summary" 
                required 
                value="{{ old('score_summary', $schedule->matchResult->score_summary ?? '') }}" 
                placeholder="Contoh: 3 - 1 (25-20, 23-25, 25-18, 25-21) atau 10.25 dtk" 
                class="w-full px-4 py-3 bg-slate-900 border border-slate-700 rounded-xl text-white font-mono text-base focus:outline-none focus:ring-2 focus:ring-rose-500"
            >
            <p class="text-[11px] text-slate-500 mt-1">Masukkan skor set, waktu tempuh, atau poin akhir sesuai nomor perlombaan.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <!-- Atlet Pemenang -->
            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Atlet Pemenang (Jika Individu)</label>
                <select name="winner_athlete_id" class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-rose-500 text-sm">
                    <option value="">-- Tidak Dipilih / Nomor Beregu --</option>
                    @foreach($athletes as $athlete)
                        <option value="{{ $athlete->id }}" {{ old('winner_athlete_id', $schedule->matchResult->winner_athlete_id ?? '') == $athlete->id ? 'selected' : '' }}>
                            {{ $athlete->full_name }} ({{ $athlete->contingent->name ?? 'Kontingen' }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Kontingen Pemenang -->
            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Kontingen Daerah Pemenang</label>
                <select name="winner_contingent_id" class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-rose-500 text-sm">
                    <option value="">-- Pilih Kontingen Pemenang --</option>
                    @foreach($contingents as $con)
                        <option value="{{ $con->id }}" {{ old('winner_contingent_id', $schedule->matchResult->winner_contingent_id ?? '') == $con->id ? 'selected' : '' }}>
                            {{ $con->name }} ({{ $con->code }})
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Catatan Hasil -->
        <div>
            <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Catatan Wasit / Dewan Hakim (Opsional)</label>
            <textarea 
                name="remarks" 
                rows="3" 
                placeholder="Catatan pelanggaran, rekor baru terpecahkan, atau keterangan wasit resmi..." 
                class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-rose-500 text-sm"
            >{{ old('remarks', $schedule->matchResult->remarks ?? '') }}</textarea>
        </div>

        <div class="pt-4 border-t border-slate-800 flex items-center justify-end gap-3">
            <a href="{{ route('admin.schedules.index') }}" class="px-5 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-slate-300 text-xs font-bold transition">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-rose-600 hover:bg-rose-500 text-white text-xs font-bold transition shadow-lg shadow-rose-900/40 flex items-center gap-2">
                <i class="fa-solid fa-floppy-disk"></i> Simpan Hasil & Skor
            </button>
        </div>
    </form>
</div>
@endsection
