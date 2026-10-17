@extends('layouts.admin')

@section('title', 'Edit Perolehan Medali')
@section('page-title', 'Edit Perolehan Medali: ' . $medal->contingent->name)

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-xl font-extrabold text-white">Edit Perolehan Medali</h3>
            <p class="text-xs text-slate-400">Kontingen: <span class="text-amber-400 font-bold">{{ $medal->contingent->name }}</span> ({{ $medal->contingent->code }})</p>
        </div>
        <a href="{{ route('admin.medals.index') }}" class="text-xs text-slate-400 hover:text-white flex items-center gap-1">
            &larr; Kembali ke Klasemen
        </a>
    </div>

    <form action="{{ route('admin.medals.update', $medal->id) }}" method="POST" class="bg-slate-950 border border-slate-800 rounded-2xl p-6 sm:p-8 shadow-2xl space-y-6">
        @csrf
        @method('PUT')

        <div class="p-4 rounded-xl bg-slate-900 border border-slate-800 flex items-center justify-between">
            <div>
                <span class="text-[10px] text-slate-500 uppercase tracking-wider block">Kontingen Daerah</span>
                <span class="text-base font-bold text-white">{{ $medal->contingent->name }}</span>
            </div>
            <div class="text-right">
                <span class="text-[10px] text-slate-500 uppercase tracking-wider block">Target Emas</span>
                <span class="text-sm font-bold text-amber-400">{{ $medal->contingent->target_gold }} Emas</span>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
            <!-- Emas -->
            <div class="bg-amber-500/10 border border-amber-500/20 p-4 rounded-xl">
                <label class="block text-xs font-bold text-amber-400 uppercase tracking-wider mb-2">
                    🥇 Medali Emas *
                </label>
                <input 
                    type="number" 
                    name="gold" 
                    required 
                    min="0" 
                    value="{{ old('gold', $medal->gold) }}" 
                    class="w-full text-center px-4 py-3 bg-slate-900 border border-amber-500/40 rounded-xl text-amber-400 font-extrabold text-2xl focus:outline-none focus:ring-2 focus:ring-amber-400"
                >
            </div>

            <!-- Perak -->
            <div class="bg-slate-400/10 border border-slate-400/20 p-4 rounded-xl">
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                    🥈 Medali Perak *
                </label>
                <input 
                    type="number" 
                    name="silver" 
                    required 
                    min="0" 
                    value="{{ old('silver', $medal->silver) }}" 
                    class="w-full text-center px-4 py-3 bg-slate-900 border border-slate-500/40 rounded-xl text-slate-200 font-extrabold text-2xl focus:outline-none focus:ring-2 focus:ring-slate-300"
                >
            </div>

            <!-- Perunggu -->
            <div class="bg-amber-700/10 border border-amber-700/20 p-4 rounded-xl">
                <label class="block text-xs font-bold text-amber-600 uppercase tracking-wider mb-2">
                    🥉 Medali Perunggu *
                </label>
                <input 
                    type="number" 
                    name="bronze" 
                    required 
                    min="0" 
                    value="{{ old('bronze', $medal->bronze) }}" 
                    class="w-full text-center px-4 py-3 bg-slate-900 border border-amber-700/40 rounded-xl text-amber-600 font-extrabold text-2xl focus:outline-none focus:ring-2 focus:ring-amber-600"
                >
            </div>
        </div>

        <div class="pt-4 border-t border-slate-800 flex items-center justify-end gap-3">
            <a href="{{ route('admin.medals.index') }}" class="px-5 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-slate-300 text-xs font-bold transition">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-rose-600 hover:bg-rose-500 text-white text-xs font-bold transition shadow-lg shadow-rose-900/40 flex items-center gap-2">
                <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
