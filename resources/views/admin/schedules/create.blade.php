@extends('layouts.admin')

@section('title', 'Tambah Jadwal Pertandingan')
@section('page-title', 'Tambah / Entri Jadwal Pertandingan Baru')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-xl font-extrabold text-white">Formulir Jadwal Laga Baru</h3>
            <p class="text-xs text-slate-400">Tentukan nomor lomba, babak pertandingan, venue gelanggang, dan waktu.</p>
        </div>
        <a href="{{ route('admin.schedules.index') }}" class="text-xs text-slate-400 hover:text-white flex items-center gap-1">
            &larr; Kembali ke Jadwal
        </a>
    </div>

    <form action="{{ route('admin.schedules.store') }}" method="POST" class="bg-slate-950 border border-slate-800 rounded-2xl p-6 sm:p-8 shadow-2xl space-y-5">
        @csrf

        <div>
            <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Nomor Lomba / Cabang Olahraga *</label>
            <select name="sub_sport_id" required class="w-full px-4 py-3 bg-slate-900 border border-slate-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-rose-500 text-sm">
                <option value="">-- Pilih Nomor Pertandingan --</option>
                @foreach($subSports as $sub)
                    <option value="{{ $sub->id }}" {{ old('sub_sport_id') == $sub->id ? 'selected' : '' }}>
                        {{ $sub->sport->name ?? 'Cabor' }} - {{ $sub->name }} ({{ $sub->gender_category }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Babak Pertandingan *</label>
                <input type="text" name="round_name" required value="{{ old('round_name', 'Babak Penyisihan') }}" placeholder="Contoh: Semifinal / Final" class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-rose-500 text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Status Awal *</label>
                <select name="status" required class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-rose-500 text-sm">
                    <option value="upcoming">Akan Datang (Upcoming)</option>
                    <option value="ongoing">Sedang Berlangsung (Live)</option>
                    <option value="completed">Selesai (Completed)</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Lokasi / Venue *</label>
                <select name="venue_id" required class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-rose-500 text-sm">
                    <option value="">-- Pilih Lokasi Gelanggang --</option>
                    @foreach($venues as $v)
                        <option value="{{ $v->id }}" {{ old('venue_id') == $v->id ? 'selected' : '' }}>
                            {{ $v->name }} ({{ $v->city }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Tanggal & Waktu Pertandingan *</label>
                <input type="datetime-local" name="scheduled_at" required value="{{ old('scheduled_at') }}" class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-rose-500 text-sm">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Catatan Tambahan (Opsional)</label>
            <textarea name="notes" rows="2" placeholder="Catatan laga, peserta bertanding, rute tribun, dll..." class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-rose-500 text-sm">{{ old('notes') }}</textarea>
        </div>

        <div class="pt-4 border-t border-slate-800 flex items-center justify-end gap-3">
            <a href="{{ route('admin.schedules.index') }}" class="px-5 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-slate-300 text-xs font-bold transition">Batal</a>
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-rose-600 hover:bg-rose-500 text-white text-xs font-bold transition shadow-lg shadow-rose-900/40 flex items-center gap-2">
                <i class="fa-solid fa-floppy-disk"></i> Simpan Jadwal Laga
            </button>
        </div>
    </form>
</div>
@endsection
