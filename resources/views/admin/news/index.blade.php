@extends('layouts.admin')

@section('title', 'Manajemen Berita')
@section('page-title', 'Pusat Rilis & Manajemen Berita')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-xl font-extrabold text-white">Daftar Berita & Liputan Porprov</h3>
            <p class="text-xs text-slate-400">Total {{ $news->total() }} artikel berita terpublikasi di portal.</p>
        </div>
        <a href="{{ route('admin.news.create') }}" class="px-4 py-2 bg-rose-600 hover:bg-rose-500 text-white rounded-xl text-xs font-bold transition flex items-center gap-2 shadow-lg shadow-rose-600/30">
            <i class="fa-solid fa-plus"></i> Buat Berita Baru
        </a>
    </div>

    <div class="bg-slate-950 border border-slate-800 rounded-2xl overflow-hidden shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="bg-slate-900 border-b border-slate-800 text-slate-400 text-xs uppercase tracking-wider">
                        <th class="py-4 px-4">Judul Artikel</th>
                        <th class="py-4 px-4">Kategori</th>
                        <th class="py-4 px-4">Penulis</th>
                        <th class="py-4 px-4 text-center">Status</th>
                        <th class="py-4 px-4 text-center">Tayang</th>
                        <th class="py-4 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/80">
                    @foreach($news as $item)
                    <tr class="hover:bg-slate-900/60 transition">
                        <td class="py-4 px-4">
                            <p class="font-bold text-white text-sm line-clamp-1">{{ $item->title }}</p>
                            <p class="text-xs text-slate-500 line-clamp-1 mt-0.5">{{ $item->excerpt }}</p>
                        </td>
                        <td class="py-4 px-4">
                            <span class="px-2.5 py-1 rounded-md bg-slate-900 border border-slate-800 text-rose-400 font-semibold text-xs">
                                {{ $item->category->name ?? '-' }}
                            </span>
                        </td>
                        <td class="py-4 px-4 text-xs text-slate-300">
                            {{ $item->author->name ?? 'Admin Humas' }}
                        </td>
                        <td class="py-4 px-4 text-center">
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase {{ $item->status === 'published' ? 'bg-emerald-950 text-emerald-400 border border-emerald-500/30' : 'bg-slate-800 text-slate-400' }}">
                                {{ $item->status }}
                            </span>
                        </td>
                        <td class="py-4 px-4 text-center text-xs text-slate-400">
                            <i class="fa-regular fa-eye text-slate-500"></i> {{ number_format($item->views_count) }}
                        </td>
                        <td class="py-4 px-4 text-center">
                            <div class="flex items-center justify-center space-x-2">
                                <a href="{{ route('admin.news.edit', $item->id) }}" class="p-2 rounded-lg bg-slate-800 hover:bg-slate-700 text-amber-400 transition text-xs">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 rounded-lg bg-slate-800 hover:bg-rose-950 text-rose-400 transition text-xs">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-slate-800 bg-slate-950">
            {{ $news->links() }}
        </div>
    </div>
</div>
@endsection
