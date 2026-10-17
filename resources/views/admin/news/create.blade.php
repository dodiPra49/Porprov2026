@extends('layouts.admin')

@section('title', 'Tulis Berita Baru')
@section('page-title', 'Buat & Publikasikan Berita Baru')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-xl font-extrabold text-white">Form Pembuatan Berita</h3>
            <p class="text-xs text-slate-400">Tulis liputan seputar atlet, cabor, rekor baru, dan jadwal event.</p>
        </div>
        <a href="{{ route('admin.news.index') }}" class="text-xs text-slate-400 hover:text-white flex items-center gap-1">
            &larr; Kembali ke Daftar
        </a>
    </div>

    <form action="{{ route('admin.news.store') }}" method="POST" class="bg-slate-950 border border-slate-800 rounded-2xl p-6 shadow-2xl space-y-5">
        @csrf

        <div>
            <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Judul Berita *</label>
            <input type="text" name="title" required value="{{ old('title') }}" placeholder="Contoh: Tim Sepak Takraw Padang Pariaman Lolos ke Babak Final" class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-rose-500 text-sm">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Kategori Berita *</label>
                <select name="category_id" required class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-rose-500 text-sm">
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Status Publikasi</label>
                <select name="status" class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-rose-500 text-sm">
                    <option value="published">Langsung Tayang (Published)</option>
                    <option value="draft">Simpan Draf (Draft)</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Ringkasan Singkat (Excerpt) *</label>
            <textarea name="excerpt" rows="2" required placeholder="Ringkasan 1-2 kalimat untuk kartu berita depan..." class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-rose-500 text-sm">{{ old('excerpt') }}</textarea>
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Isi Berita Lengkap *</label>
            <textarea name="content" rows="8" required placeholder="Tuliskan naskah berita lengkap di sini..." class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-rose-500 text-sm font-sans leading-relaxed">{{ old('content') }}</textarea>
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">URL Foto Thumbnail</label>
            <input type="text" name="thumbnail_url" value="{{ old('thumbnail_url', '/images/news/default.jpg') }}" class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-rose-500 text-sm">
        </div>

        <div class="flex items-center space-x-2 pt-2">
            <input type="checkbox" name="is_featured" id="is_featured" value="1" class="w-4 h-4 rounded text-rose-600 bg-slate-900 border-slate-700 focus:ring-rose-500">
            <label for="is_featured" class="text-sm font-semibold text-white">Jadikan Berita Utama / Sorotan Utama (Featured)</label>
        </div>

        <div class="pt-4 border-t border-slate-800 flex justify-end gap-3">
            <a href="{{ route('admin.news.index') }}" class="px-5 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-slate-300 text-xs font-bold transition">Batal</a>
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-rose-600 hover:bg-rose-500 text-white text-xs font-bold transition shadow-lg shadow-rose-600/30">
                <i class="fa-solid fa-paper-plane mr-1.5"></i> Publikasikan Sekarang
            </button>
        </div>
    </form>
</div>
@endsection
