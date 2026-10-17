@extends('layouts.admin')

@section('title', 'Supporter Wall')
@section('page-title', 'Moderasi Pesan Dukungan Supporter')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-xl font-extrabold text-white">Dinding Dukungan & Cheering Wall</h3>
            <p class="text-xs text-slate-400">Pesan dan doa dari masyarakat serta perantau Minang untuk atlet Porprov 2026.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        @foreach($cheers as $ch)
        <div class="bg-slate-950 border border-slate-800 rounded-2xl p-5 shadow-lg flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between mb-3">
                    <span class="px-2.5 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider bg-rose-950 text-rose-300 border border-rose-900/40">
                        {{ $ch->contingent->name ?? 'Sumatera Barat' }}
                    </span>
                    <span class="text-xs text-slate-500 flex items-center gap-1">
                        <i class="fa-solid fa-heart text-rose-500"></i> {{ $ch->likes_count }} suka
                    </span>
                </div>
                <p class="text-sm text-slate-200 italic leading-relaxed">"{{ $ch->message }}"</p>
                <div class="mt-4 pt-3 border-t border-slate-800/80">
                    <p class="text-xs font-bold text-amber-400">{{ $ch->sender_name }}</p>
                    <p class="text-[10px] text-slate-500">Kota: {{ $ch->sender_city }} &bull; {{ $ch->created_at->diffForHumans() }}</p>
                </div>
            </div>

            <div class="mt-4 pt-3 border-t border-slate-800 flex items-center justify-between">
                <span class="text-[10px] font-semibold {{ $ch->is_approved ? 'text-emerald-400' : 'text-amber-400' }}">
                    {{ $ch->is_approved ? '✓ Ditampilkan di Web' : '⏳ Menunggu Moderasi' }}
                </span>
                <div class="flex items-center space-x-2">
                    <form action="{{ route('admin.cheers.toggle', $ch->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="px-3 py-1 rounded-lg text-xs font-semibold {{ $ch->is_approved ? 'bg-slate-800 text-slate-300 hover:bg-slate-700' : 'bg-emerald-600 text-white hover:bg-emerald-500' }}">
                            {{ $ch->is_approved ? 'Sembunyikan' : 'Setujui' }}
                        </button>
                    </form>
                    <form action="{{ route('admin.cheers.destroy', $ch->id) }}" method="POST" onsubmit="return confirm('Hapus pesan dukungan ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-1.5 rounded-lg bg-slate-900 hover:bg-rose-950 text-rose-400 text-xs">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="p-4 bg-slate-950 border border-slate-800 rounded-xl">
        {{ $cheers->links() }}
    </div>
</div>
@endsection
