@extends('layouts.admin')

@section('title', 'Dashboard Ringkasan')
@section('page-title', 'Pusat Kendali PORPROV 2026')

@section('content')
<div class="space-y-8">
    <!-- Highlight Banner -->
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-rose-900 via-rose-950 to-slate-950 p-8 border border-rose-800/40 shadow-2xl">
        <div class="relative z-10 max-w-2xl">
            <span class="px-3 py-1 bg-amber-400 text-slate-950 text-xs font-black rounded-md tracking-wider uppercase">Portal Resmi Terintegrasi</span>
            <h1 class="text-3xl font-extrabold text-white mt-3 leading-snug">
                Pekan Olahraga Provinsi <span class="text-amber-400">Sumatera Barat 2026</span>
            </h1>
            <p class="text-slate-300 text-sm mt-2 leading-relaxed">
                Kelola perolehan medali 19 Kontingen daerah, jadwalkan pertandingan seluruh cabang olahraga, dan publikasikan berita atlet secara instan ke portal publik Next.js.
            </p>
        </div>
        <div class="absolute -right-10 -bottom-10 opacity-10 text-9xl font-black select-none pointer-events-none text-white">
            2026
        </div>
    </div>

    <!-- Quick Action / Entri Data Toolbar -->
    <div class="bg-slate-950 border border-slate-800 rounded-2xl p-5 shadow-xl">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h2 class="text-sm font-bold text-white uppercase tracking-wider flex items-center gap-2">
                    <i class="fa-solid fa-pen-to-square text-amber-400"></i> Pintasan Entri & Update Data
                </h2>
                <p class="text-xs text-slate-400">Akses cepat formulir penambahan dan pembaruan data sistem ke database.</p>
            </div>
            <div class="flex flex-wrap items-center gap-2.5">
                <a href="{{ route('admin.medals.create') }}" class="px-3.5 py-2 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 text-xs font-black shadow-md shadow-amber-950/40 transition flex items-center gap-1.5">
                    <i class="fa-solid fa-medal"></i>
                    <span>+ Entri Medali</span>
                </a>
                <a href="{{ route('admin.schedules.create') }}" class="px-3.5 py-2 rounded-xl bg-rose-600 hover:bg-rose-500 text-white text-xs font-bold shadow-md shadow-rose-950/40 transition flex items-center gap-1.5">
                    <i class="fa-solid fa-calendar-plus"></i>
                    <span>+ Tambah Jadwal</span>
                </a>
                <a href="{{ route('admin.athletes.create') }}" class="px-3.5 py-2 rounded-xl bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold shadow-md shadow-blue-950/40 transition flex items-center gap-1.5">
                    <i class="fa-solid fa-user-plus"></i>
                    <span>+ Daftarkan Atlet</span>
                </a>
                <a href="{{ route('admin.news.create') }}" class="px-3.5 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 border border-slate-700 text-slate-200 text-xs font-bold transition flex items-center gap-1.5">
                    <i class="fa-solid fa-newspaper"></i>
                    <span>+ Tulis Berita</span>
                </a>
            </div>
        </div>
    </div>

    <!-- KPI Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <div class="bg-slate-950/70 border border-slate-800 rounded-xl p-5 hover:border-slate-700 transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-slate-400 uppercase tracking-wider">Total Atlet Terdaftar</p>
                    <p class="text-2xl font-extrabold text-white mt-1">{{ number_format($stats['total_athletes']) }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-blue-500/10 text-blue-400 flex items-center justify-center text-xl">
                    <i class="fa-solid fa-person-running"></i>
                </div>
            </div>
            <p class="text-[11px] text-slate-500 mt-3 flex items-center gap-1">
                <i class="fa-solid fa-check text-emerald-400"></i> Tersebar di 19 Kontingen Kab/Kota
            </p>
        </div>

        <div class="bg-slate-950/70 border border-slate-800 rounded-xl p-5 hover:border-slate-700 transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-slate-400 uppercase tracking-wider">Cabang Olahraga</p>
                    <p class="text-2xl font-extrabold text-white mt-1">{{ $stats['total_sports'] }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-400 flex items-center justify-center text-xl">
                    <i class="fa-solid fa-trophy"></i>
                </div>
            </div>
            <p class="text-[11px] text-slate-500 mt-3 flex items-center gap-1">
                <i class="fa-solid fa-layer-group text-amber-400"></i> Silat, Takraw, Atletik, Renang, dll.
            </p>
        </div>

        <div class="bg-slate-950/70 border border-slate-800 rounded-xl p-5 hover:border-slate-700 transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-slate-400 uppercase tracking-wider">Lokasi Venue</p>
                    <p class="text-2xl font-extrabold text-white mt-1">{{ $stats['total_venues'] }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-400 flex items-center justify-center text-xl">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
            </div>
            <p class="text-[11px] text-slate-500 mt-3 flex items-center gap-1">
                <i class="fa-solid fa-map text-emerald-400"></i> Tersebar di Padang, BKT, Payakumbuh, dll.
            </p>
        </div>

        <div class="bg-slate-950/70 border border-slate-800 rounded-xl p-5 hover:border-slate-700 transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-slate-400 uppercase tracking-wider">Berita & Liputan</p>
                    <p class="text-2xl font-extrabold text-white mt-1">{{ $stats['total_news'] }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-purple-500/10 text-purple-400 flex items-center justify-center text-xl">
                    <i class="fa-solid fa-newspaper"></i>
                </div>
            </div>
            <p class="text-[11px] text-slate-500 mt-3 flex items-center gap-1">
                <i class="fa-solid fa-bolt text-purple-400"></i> Publikasi real-time ke web utama
            </p>
        </div>
    </div>

    <!-- 2 Column Layout: Klasemen Medali & Jadwal Terkini -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Klasemen Medali Teratas (2 Kolom) -->
        <div class="lg:col-span-2 bg-slate-950 border border-slate-800 rounded-2xl p-6 shadow-xl">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-base font-bold text-white flex items-center gap-2">
                        <i class="fa-solid fa-medal text-amber-400"></i> Klasemen Medali 5 Teratas
                    </h3>
                    <p class="text-xs text-slate-400">Peringkat perolehan medali kontingen secara real-time</p>
                </div>
                <a href="{{ route('admin.medals.index') }}" class="text-xs font-semibold text-rose-400 hover:text-rose-300">
                    Lihat Semua &rarr;
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="border-b border-slate-800 text-slate-400 text-xs uppercase">
                            <th class="py-3 px-3">Rank</th>
                            <th class="py-3 px-3">Kontingen</th>
                            <th class="py-3 px-3 text-center text-amber-400 font-bold">🥇 Emas</th>
                            <th class="py-3 px-3 text-center text-slate-300 font-bold">🥈 Perak</th>
                            <th class="py-3 px-3 text-center text-amber-600 font-bold">🥉 Perunggu</th>
                            <th class="py-3 px-3 text-center font-bold text-white">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60">
                        @foreach($topMedals as $index => $item)
                        <tr class="hover:bg-slate-900/50 transition">
                            <td class="py-3.5 px-3">
                                <span class="w-6 h-6 rounded-full flex items-center justify-center font-black text-xs {{ $index === 0 ? 'bg-amber-400 text-slate-950' : ($index === 1 ? 'bg-slate-300 text-slate-950' : ($index === 2 ? 'bg-amber-600 text-white' : 'bg-slate-800 text-slate-400')) }}">
                                    {{ $index + 1 }}
                                </span>
                            </td>
                            <td class="py-3.5 px-3 font-semibold text-white">
                                {{ $item->contingent->name }}
                                <span class="text-[10px] text-slate-500 block font-normal">{{ $item->contingent->code }}</span>
                            </td>
                            <td class="py-3.5 px-3 text-center font-bold text-amber-400">{{ $item->gold }}</td>
                            <td class="py-3.5 px-3 text-center font-bold text-slate-300">{{ $item->silver }}</td>
                            <td class="py-3.5 px-3 text-center font-bold text-amber-600">{{ $item->bronze }}</td>
                            <td class="py-3.5 px-3 text-center font-black text-rose-400 text-base">{{ $item->total_medals }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Jadwal Pertandingan Harian -->
        <div class="bg-slate-950 border border-slate-800 rounded-2xl p-6 shadow-xl flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-base font-bold text-white flex items-center gap-2">
                        <i class="fa-solid fa-clock text-rose-400"></i> Jadwal Pertandingan
                    </h3>
                    <a href="{{ route('admin.schedules.index') }}" class="text-xs font-semibold text-rose-400 hover:text-rose-300">Semua</a>
                </div>

                <div class="space-y-3">
                    @foreach($todaySchedules as $sch)
                    <div class="p-3 rounded-xl bg-slate-900/80 border border-slate-800">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-amber-400">{{ $sch->subSport->sport->name ?? 'Cabor' }}</span>
                            <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase {{ $sch->status === 'completed' ? 'bg-emerald-950 text-emerald-400 border border-emerald-500/30' : ($sch->status === 'ongoing' ? 'bg-amber-950 text-amber-400 border border-amber-500/30 animate-pulse' : 'bg-slate-800 text-slate-400') }}">
                                {{ $sch->status }}
                            </span>
                        </div>
                        <p class="text-xs font-medium text-white mt-1">{{ $sch->round_name }}</p>
                        <p class="text-[11px] text-slate-400 mt-1 flex items-center gap-1">
                            <i class="fa-solid fa-location-dot text-slate-500"></i> {{ $sch->venue->name ?? '-' }}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-4 pt-4 border-t border-slate-800/80 text-center">
                <a href="{{ route('admin.schedules.index') }}" class="text-xs font-semibold text-slate-300 hover:text-white block py-2 rounded-lg bg-slate-900 border border-slate-800 hover:bg-slate-850">
                    Input & Verifikasi Hasil Skor &rarr;
                </a>
            </div>
        </div>
    </div>

    <!-- Berita Terbaru & Supporter Feed -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Berita Terkini -->
        <div class="bg-slate-950 border border-slate-800 rounded-2xl p-6 shadow-xl">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-base font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-newspaper text-blue-400"></i> Berita & Rilis Humas Terkini
                </h3>
                <a href="{{ route('admin.news.create') }}" class="px-3 py-1 bg-rose-600 hover:bg-rose-500 text-white rounded-lg text-xs font-semibold transition">
                    + Tulis Berita
                </a>
            </div>

            <div class="space-y-3">
                @foreach($recentNews as $article)
                <div class="flex items-center justify-between p-3 rounded-xl bg-slate-900/60 hover:bg-slate-900 border border-slate-800/80 transition">
                    <div class="flex-1 pr-4">
                        <span class="text-[10px] font-semibold text-rose-400 uppercase tracking-wider">{{ $article->category->name ?? 'Umum' }}</span>
                        <h4 class="text-xs font-bold text-white line-clamp-1 mt-0.5">{{ $article->title }}</h4>
                        <p class="text-[10px] text-slate-500 mt-0.5">{{ $article->published_at ? $article->published_at->diffForHumans() : '-' }} &bull; Oleh {{ $article->author->name ?? 'Admin' }}</p>
                    </div>
                    <a href="{{ route('admin.news.edit', $article->id) }}" class="text-xs text-slate-400 hover:text-white p-2">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Supporter Wall -->
        <div class="bg-slate-950 border border-slate-800 rounded-2xl p-6 shadow-xl">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-base font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-heart text-rose-500"></i> Pesan Dukungan Supporter Terkini
                </h3>
                <a href="{{ route('admin.cheers.index') }}" class="text-xs font-semibold text-rose-400 hover:text-rose-300">Moderasi</a>
            </div>

            <div class="space-y-3">
                @foreach($recentCheers as $cheer)
                <div class="p-3.5 rounded-xl bg-slate-900/60 border border-slate-800/80">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-amber-400">{{ $cheer->sender_name }} <span class="text-slate-500 font-normal">({{ $cheer->sender_city }})</span></span>
                        <span class="text-[10px] px-2 py-0.5 rounded bg-rose-950 text-rose-300 font-semibold">{{ $cheer->contingent->name ?? 'Sumbar' }}</span>
                    </div>
                    <p class="text-xs text-slate-300 mt-1 italic leading-relaxed">"{{ $cheer->message }}"</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
