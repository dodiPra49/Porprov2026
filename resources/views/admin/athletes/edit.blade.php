@extends('layouts.admin')

@section('title', 'Edit Data Atlet')
@section('page-title', 'Edit Data Atlet: ' . $athlete->full_name)

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-xl font-extrabold text-white">Edit Identitas & Cabor Atlet</h3>
            <p class="text-xs text-slate-400">NIK: {{ $athlete->nik }} &bull; Terdaftar di Kontingen {{ $athlete->contingent->name ?? '-' }}</p>
        </div>
        <a href="{{ route('admin.athletes.index') }}" class="text-xs text-slate-400 hover:text-white flex items-center gap-1">
            &larr; Kembali ke Daftar Atlet
        </a>
    </div>

    <form action="{{ route('admin.athletes.update', $athlete->id) }}" method="POST" class="bg-slate-950 border border-slate-800 rounded-2xl p-6 sm:p-8 shadow-2xl space-y-5">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Nama Lengkap Atlet *</label>
                <input type="text" name="full_name" required value="{{ old('full_name', $athlete->full_name) }}" class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-rose-500 text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">NIK *</label>
                <input type="text" name="nik" required maxlength="16" value="{{ old('nik', $athlete->nik) }}" class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-white font-mono placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-rose-500 text-sm">
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Kontingen Asal Daerah *</label>
                <select name="contingent_id" required class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-rose-500 text-sm">
                    @foreach($contingents as $con)
                        <option value="{{ $con->id }}" {{ (old('contingent_id', $athlete->contingent_id) == $con->id) ? 'selected' : '' }}>{{ $con->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Cabang Olahraga (Cabor) *</label>
                <select name="sport_id" required class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-rose-500 text-sm">
                    @foreach($sports as $sp)
                        <option value="{{ $sp->id }}" {{ (old('sport_id', $athlete->sport_id) == $sp->id) ? 'selected' : '' }}>{{ $sp->name }} ({{ $sp->category }})</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Jenis Kelamin *</label>
                <select name="gender" required class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-rose-500 text-sm">
                    <option value="L" {{ old('gender', $athlete->gender) === 'L' ? 'selected' : '' }}>Laki-laki (Putra)</option>
                    <option value="P" {{ old('gender', $athlete->gender) === 'P' ? 'selected' : '' }}>Perempuan (Putri)</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Tempat Lahir</label>
                <input type="text" name="birth_place" value="{{ old('birth_place', $athlete->birth_place) }}" class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-rose-500 text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Tanggal Lahir</label>
                <input type="date" name="birth_date" value="{{ old('birth_date', $athlete->birth_date ? $athlete->birth_date->format('Y-m-d') : '') }}" class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-rose-500 text-sm">
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Tinggi Badan (cm)</label>
                <input type="number" name="height_cm" value="{{ old('height_cm', $athlete->height_cm) }}" min="100" max="250" class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-rose-500 text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Berat Badan (kg)</label>
                <input type="number" name="weight_kg" value="{{ old('weight_kg', $athlete->weight_kg) }}" min="30" max="200" class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-rose-500 text-sm">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Prestasi Utama / Riwayat Medali</label>
            <textarea name="achievements" rows="3" class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-rose-500 text-sm">{{ old('achievements', $athlete->achievements) }}</textarea>
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">URL Foto Atlet</label>
            <input type="text" name="photo_url" value="{{ old('photo_url', $athlete->photo_url) }}" class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-rose-500 text-sm">
        </div>

        <div class="flex items-center space-x-2 pt-2">
            <input type="checkbox" name="is_verified" id="is_verified" value="1" {{ $athlete->is_verified ? 'checked' : '' }} class="w-4 h-4 rounded text-rose-600 bg-slate-900 border-slate-700 focus:ring-rose-500">
            <label for="is_verified" class="text-sm font-semibold text-white">Status Verifikasi Keabsahan Atlet</label>
        </div>

        <div class="pt-4 border-t border-slate-800 flex items-center justify-end gap-3">
            <a href="{{ route('admin.athletes.index') }}" class="px-5 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-slate-300 text-xs font-bold transition">Batal</a>
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-rose-600 hover:bg-rose-500 text-white text-xs font-bold transition shadow-lg shadow-rose-900/40 flex items-center gap-2">
                <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
