@extends('layouts.admin')

@section('title', 'Klasemen Perolehan Medali')
@section('page-title', 'Manajemen & Entri Perolehan Medali Kontingen')

@section('content')
<div class="space-y-6">
    <!-- Header & Action -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h3 class="text-xl font-extrabold text-white">Klasemen Medali PORPROV 2026</h3>
            <p class="text-xs text-slate-400">Entrikan perolehan medali baru atau ubah data medali kontingen secara langsung.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.medals.create') }}" class="px-4 py-2.5 bg-amber-500 hover:bg-amber-400 text-slate-950 font-black text-xs rounded-xl shadow-lg shadow-amber-950/40 transition flex items-center gap-2">
                <i class="fa-solid fa-plus"></i>
                <span>+ Entri Medali Kontingen</span>
            </a>
        </div>
    </div>

    <!-- Quick Info Cards -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
        <div class="bg-slate-950 border border-slate-800 rounded-2xl p-4 text-center">
            <span class="text-[10px] uppercase font-bold text-slate-400 block tracking-wider">Total Kontingen</span>
            <span class="text-xl font-black text-white mt-1 block">{{ $medals->count() }} Daerah</span>
        </div>
        <div class="bg-slate-950 border border-amber-500/30 rounded-2xl p-4 text-center">
            <span class="text-[10px] uppercase font-bold text-amber-400 block tracking-wider">Total Emas</span>
            <span class="text-xl font-black text-amber-400 mt-1 block">{{ $medals->sum('gold') }} 🥇</span>
        </div>
        <div class="bg-slate-950 border border-slate-600/30 rounded-2xl p-4 text-center">
            <span class="text-[10px] uppercase font-bold text-slate-300 block tracking-wider">Total Perak</span>
            <span class="text-xl font-black text-slate-300 mt-1 block">{{ $medals->sum('silver') }} 🥈</span>
        </div>
        <div class="bg-slate-950 border border-amber-700/30 rounded-2xl p-4 text-center">
            <span class="text-[10px] uppercase font-bold text-amber-600 block tracking-wider">Total Perunggu</span>
            <span class="text-xl font-black text-amber-600 mt-1 block">{{ $medals->sum('bronze') }} 🥉</span>
        </div>
    </div>

    <!-- Medal Table with Actions -->
    <div class="bg-slate-950 border border-slate-800 rounded-2xl overflow-hidden shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="bg-slate-900 border-b border-slate-800 text-slate-400 text-xs uppercase tracking-wider">
                        <th class="py-4 px-4 text-center">Rank</th>
                        <th class="py-4 px-4">Kontingen</th>
                        <th class="py-4 px-4 text-center text-amber-400 font-bold">🥇 Emas</th>
                        <th class="py-4 px-4 text-center text-slate-300 font-bold">🥈 Perak</th>
                        <th class="py-4 px-4 text-center text-amber-600 font-bold">🥉 Perunggu</th>
                        <th class="py-4 px-4 text-center font-bold text-white">Total</th>
                        <th class="py-4 px-4 text-center">Aksi Manajemen</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/80">
                    @forelse($medals as $index => $item)
                    <tr class="hover:bg-slate-900/60 transition">
                        <td class="py-4 px-4 text-center font-black">
                            <span class="inline-flex w-7 h-7 rounded-full items-center justify-center text-xs {{ $index === 0 ? 'bg-amber-400 text-slate-950 shadow-md shadow-amber-400/40' : ($index === 1 ? 'bg-slate-300 text-slate-950' : ($index === 2 ? 'bg-amber-600 text-white' : 'bg-slate-800 text-slate-300')) }}">
                                {{ $item->rank_position ?? ($index + 1) }}
                            </span>
                        </td>
                        <td class="py-4 px-4 font-bold text-white">
                            {{ $item->contingent->name }}
                            <span class="text-xs text-slate-500 font-normal block">{{ $item->contingent->code }} &bull; Target: {{ $item->contingent->target_gold }} Emas</span>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <span class="text-base font-extrabold text-amber-400">{{ $item->gold }}</span>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <span class="text-base font-extrabold text-slate-300">{{ $item->silver }}</span>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <span class="text-base font-extrabold text-amber-600">{{ $item->bronze }}</span>
                        </td>
                        <td class="py-4 px-4 text-center font-black text-rose-400 text-lg">
                            {{ $item->total_medals }}
                        </td>
                        <td class="py-4 px-4 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.medals.edit', $item->id) }}" class="px-3 py-1.5 bg-slate-800 hover:bg-slate-700 text-amber-400 text-xs font-bold rounded-lg border border-slate-700 transition flex items-center gap-1.5">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <span>Edit Medali</span>
                                </a>
                                <form action="{{ route('admin.medals.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus data medali kontingen {{ $item->contingent->name }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 bg-slate-900 hover:bg-rose-950 text-rose-400 text-xs rounded-lg transition" title="Hapus Data">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="py-8 text-center text-slate-500 text-sm">
                            Belum ada data perolehan medali yang dientrikan. Klik tombol "+ Entri Medali Kontingen" di atas.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
