@extends('layouts.admin')

@section('title', 'Manajemen Atlet')
@section('page-title', 'Pusat Data Atlet & Keabsahan Peserta')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h3 class="text-xl font-extrabold text-white">Data Atlet Kontingen PORPROV 2026</h3>
            <p class="text-xs text-slate-400">Pendaftaran atlet baru, verifikasi NIK, keabsahan domisili, dan edit profil peserta.</p>
        </div>
        <a href="{{ route('admin.athletes.create') }}" class="px-4 py-2.5 bg-rose-600 hover:bg-rose-500 text-white font-bold text-xs rounded-xl shadow-lg shadow-rose-900/40 transition flex items-center gap-2">
            <i class="fa-solid fa-user-plus"></i>
            <span>+ Daftarkan Atlet Baru</span>
        </a>
    </div>

    <!-- Search & Filter Bar -->
    <form action="{{ route('admin.athletes.index') }}" method="GET" class="bg-slate-950 border border-slate-800 rounded-2xl p-4 flex flex-wrap gap-4 items-center shadow-lg">
        <div class="flex-1 min-w-[200px]">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Cari nama atlet atau NIK..." 
                class="w-full px-3.5 py-2 bg-slate-900 border border-slate-700 rounded-xl text-white text-xs placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-rose-500"
            >
        </div>

        <div class="w-full sm:w-56">
            <select name="contingent_id" class="w-full px-3 py-2 bg-slate-900 border border-slate-700 rounded-xl text-white text-xs focus:outline-none focus:ring-2 focus:ring-rose-500">
                <option value="">-- Semua Kontingen --</option>
                @foreach($contingents as $con)
                    <option value="{{ $con->id }}" {{ request('contingent_id') == $con->id ? 'selected' : '' }}>{{ $con->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="w-full sm:w-56">
            <select name="sport_id" class="w-full px-3 py-2 bg-slate-900 border border-slate-700 rounded-xl text-white text-xs focus:outline-none focus:ring-2 focus:ring-rose-500">
                <option value="">-- Semua Cabor --</option>
                @foreach($sports as $sp)
                    <option value="{{ $sp->id }}" {{ request('sport_id') == $sp->id ? 'selected' : '' }}>{{ $sp->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-white rounded-xl text-xs font-semibold transition flex items-center gap-1.5">
            <i class="fa-solid fa-filter"></i> Filter
        </button>

        @if(request()->hasAny(['search', 'contingent_id', 'sport_id']))
            <a href="{{ route('admin.athletes.index') }}" class="px-3 py-2 bg-slate-900 hover:bg-slate-800 text-slate-400 text-xs rounded-xl transition">
                Reset
            </a>
        @endif
    </form>

    <!-- Table -->
    <div class="bg-slate-950 border border-slate-800 rounded-2xl overflow-hidden shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="bg-slate-900 border-b border-slate-800 text-slate-400 text-xs uppercase tracking-wider">
                        <th class="py-4 px-4">Nama Atlet</th>
                        <th class="py-4 px-4">Kontingen</th>
                        <th class="py-4 px-4">Cabang Olahraga</th>
                        <th class="py-4 px-4">Prestasi Utama</th>
                        <th class="py-4 px-4 text-center">Keabsahan</th>
                        <th class="py-4 px-4 text-center">Aksi Manajemen</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/80">
                    @forelse($athletes as $ath)
                    <tr class="hover:bg-slate-900/60 transition">
                        <td class="py-4 px-4">
                            <p class="font-bold text-white text-sm">{{ $ath->full_name }}</p>
                            <p class="text-xs text-slate-500 font-mono">NIK: {{ $ath->nik }} &bull; {{ $ath->gender === 'L' ? 'Putra' : 'Putri' }}</p>
                        </td>
                        <td class="py-4 px-4 text-xs font-semibold text-rose-400">
                            {{ $ath->contingent->name ?? '-' }}
                        </td>
                        <td class="py-4 px-4 text-xs text-amber-400 font-medium">
                            {{ $ath->sport->name ?? '-' }}
                        </td>
                        <td class="py-4 px-4 text-xs text-slate-300 max-w-xs truncate">
                            {{ $ath->achievements ?? '-' }}
                        </td>
                        <td class="py-4 px-4 text-center">
                            <form action="{{ route('admin.athletes.toggle-verify', $ath->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase transition {{ $ath->is_verified ? 'bg-emerald-950 text-emerald-400 border border-emerald-500/30 hover:bg-emerald-900' : 'bg-rose-950 text-rose-400 border border-rose-500/30 hover:bg-rose-900' }}" title="Klik untuk ubah status verifikasi">
                                    {{ $ath->is_verified ? '✓ Terverifikasi' : '⏳ Belum Verif' }}
                                </button>
                            </form>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.athletes.edit', $ath->id) }}" class="p-2 bg-slate-800 hover:bg-slate-700 text-amber-400 rounded-lg text-xs transition" title="Edit Data Atlet">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('admin.athletes.destroy', $ath->id) }}" method="POST" onsubmit="return confirm('Hapus data atlet {{ $ath->full_name }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 bg-slate-900 hover:bg-rose-950 text-rose-400 rounded-lg text-xs transition" title="Hapus Atlet">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-8 text-center text-slate-500 text-sm">
                            Tidak ditemukan data atlet. Klik "+ Daftarkan Atlet Baru" untuk menambahkan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-slate-800 bg-slate-950">
            {{ $athletes->links() }}
        </div>
    </div>
</div>
@endsection
