@extends('layouts.admin')

@section('title', 'Entri Akumulasi Perolehan Medali')
@section('page-title', 'Entri / Input Tambahan Medali Kontingen (Akumulasi)')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-xl font-extrabold text-white">Formulir Entri Tambahan Medali</h3>
            <p class="text-xs text-slate-400">Data medali yang diinput akan secara otomatis <strong class="text-amber-400">menambah akumulasi</strong> perolehan medali yang sudah ada.</p>
        </div>
        <a href="{{ route('admin.medals.index') }}" class="text-xs text-slate-400 hover:text-white flex items-center gap-1">
            &larr; Kembali ke Klasemen
        </a>
    </div>

    <!-- Alert Sistem Akumulasi -->
    <div class="p-4 rounded-xl bg-amber-500/10 border border-amber-500/30 flex items-start gap-3">
        <i class="fa-solid fa-calculator text-amber-400 text-lg mt-0.5"></i>
        <div class="text-xs text-amber-200 leading-relaxed">
            <span class="font-bold text-amber-400 block mb-0.5">Sistem Akumulasi Otomatis Aktif</span>
            Masukkan jumlah medali yang baru saja dimenangkan. Sistem akan menjumlahkannya dengan medali kontingen yang tersimpan sebelumnya di database dan otomatis memperbarui peringkat klasemen.
        </div>
    </div>

    <form action="{{ route('admin.medals.store') }}" method="POST" class="bg-slate-950 border border-slate-800 rounded-2xl p-6 sm:p-8 shadow-2xl space-y-6">
        @csrf

        <!-- Pilih Kontingen -->
        <div>
            <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">Pilih Kontingen Daerah *</label>
            <select id="contingent_select" name="contingent_id" required class="w-full px-4 py-3 bg-slate-900 border border-slate-700 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-amber-400 text-sm">
                <option value="" data-gold="0" data-silver="0" data-bronze="0">-- Pilih Kontingen Kabupaten / Kota --</option>
                @foreach($contingents as $con)
                    @php
                        $curGold = $con->medalTally->gold ?? 0;
                        $curSilver = $con->medalTally->silver ?? 0;
                        $curBronze = $con->medalTally->bronze ?? 0;
                        $curTotal = $con->medalTally->total_medals ?? 0;
                    @endphp
                    <option 
                        value="{{ $con->id }}" 
                        data-gold="{{ $curGold }}" 
                        data-silver="{{ $curSilver }}" 
                        data-bronze="{{ $curBronze }}"
                        {{ old('contingent_id') == $con->id ? 'selected' : '' }}
                    >
                        {{ $con->name }} (Saat ini: {{ $curGold }}🥇 {{ $curSilver }}🥈 {{ $curBronze }}🥉 &bull; Total: {{ $curTotal }})
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Kartu Info Medali Saat Ini -->
        <div id="current_tally_card" class="p-4 rounded-xl bg-slate-900 border border-slate-800 hidden">
            <span class="text-[10px] text-slate-400 uppercase font-bold tracking-wider block mb-2">Perolehan Medali Saat Ini (Sebelum Ditambahkan):</span>
            <div class="grid grid-cols-4 gap-2 text-center">
                <div class="p-2 rounded-lg bg-amber-500/10 border border-amber-500/20">
                    <span class="text-[10px] text-amber-400 block font-semibold">Emas</span>
                    <span id="cur_gold" class="text-base font-extrabold text-amber-400">0</span>
                </div>
                <div class="p-2 rounded-lg bg-slate-400/10 border border-slate-400/20">
                    <span class="text-[10px] text-slate-300 block font-semibold">Perak</span>
                    <span id="cur_silver" class="text-base font-extrabold text-slate-300">0</span>
                </div>
                <div class="p-2 rounded-lg bg-amber-700/10 border border-amber-700/20">
                    <span class="text-[10px] text-amber-600 block font-semibold">Perunggu</span>
                    <span id="cur_bronze" class="text-base font-extrabold text-amber-600">0</span>
                </div>
                <div class="p-2 rounded-lg bg-slate-800">
                    <span class="text-[10px] text-slate-400 block font-semibold">Total</span>
                    <span id="cur_total" class="text-base font-extrabold text-white">0</span>
                </div>
            </div>
        </div>

        <!-- Input Tambahan Medali Baru -->
        <div>
            <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">
                Masukkan Tambahan Medali yang Baru Saja Dimenangkan *
            </label>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <!-- Tambahan Emas -->
                <div class="bg-amber-500/10 border border-amber-500/30 p-4 rounded-xl">
                    <label class="block text-xs font-bold text-amber-400 uppercase tracking-wider mb-2 flex items-center justify-between">
                        <span>🥇 + Tambahan Emas</span>
                    </label>
                    <input 
                        type="number" 
                        id="input_gold"
                        name="gold" 
                        required 
                        min="0" 
                        value="{{ old('gold', 0) }}" 
                        class="w-full text-center px-4 py-3 bg-slate-900 border border-amber-500/40 rounded-xl text-amber-400 font-extrabold text-2xl focus:outline-none focus:ring-2 focus:ring-amber-400"
                    >
                </div>

                <!-- Tambahan Perak -->
                <div class="bg-slate-400/10 border border-slate-400/30 p-4 rounded-xl">
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2 flex items-center justify-between">
                        <span>🥈 + Tambahan Perak</span>
                    </label>
                    <input 
                        type="number" 
                        id="input_silver"
                        name="silver" 
                        required 
                        min="0" 
                        value="{{ old('silver', 0) }}" 
                        class="w-full text-center px-4 py-3 bg-slate-900 border border-slate-500/40 rounded-xl text-slate-200 font-extrabold text-2xl focus:outline-none focus:ring-2 focus:ring-slate-300"
                    >
                </div>

                <!-- Tambahan Perunggu -->
                <div class="bg-amber-700/10 border border-amber-700/30 p-4 rounded-xl">
                    <label class="block text-xs font-bold text-amber-600 uppercase tracking-wider mb-2 flex items-center justify-between">
                        <span>🥉 + Tambahan Perunggu</span>
                    </label>
                    <input 
                        type="number" 
                        id="input_bronze"
                        name="bronze" 
                        required 
                        min="0" 
                        value="{{ old('bronze', 0) }}" 
                        class="w-full text-center px-4 py-3 bg-slate-900 border border-amber-700/40 rounded-xl text-amber-600 font-extrabold text-2xl focus:outline-none focus:ring-2 focus:ring-amber-600"
                    >
                </div>
            </div>
        </div>

        <!-- Preview Live Hasil Akumulasi -->
        <div id="preview_card" class="p-4 rounded-xl bg-gradient-to-r from-slate-900 via-rose-950/30 to-amber-950/30 border border-amber-500/30">
            <div class="flex items-center justify-between mb-2">
                <span class="text-xs font-bold text-white flex items-center gap-1.5">
                    <i class="fa-solid fa-chart-line text-amber-400"></i> Estimasi Total Akumulasi Setelah Disimpan:
                </span>
                <span id="preview_total_badge" class="px-2.5 py-0.5 rounded-full text-[11px] font-black bg-amber-500 text-slate-950">
                    Total: 0 Medali
                </span>
            </div>
            <div class="grid grid-cols-3 gap-3 text-center">
                <div class="bg-slate-950/80 p-2.5 rounded-lg border border-slate-800">
                    <span class="text-[10px] text-slate-400 block">Total Emas</span>
                    <span id="preview_gold" class="text-lg font-black text-amber-400">0</span>
                </div>
                <div class="bg-slate-950/80 p-2.5 rounded-lg border border-slate-800">
                    <span class="text-[10px] text-slate-400 block">Total Perak</span>
                    <span id="preview_silver" class="text-lg font-black text-slate-200">0</span>
                </div>
                <div class="bg-slate-950/80 p-2.5 rounded-lg border border-slate-800">
                    <span class="text-[10px] text-slate-400 block">Total Perunggu</span>
                    <span id="preview_bronze" class="text-lg font-black text-amber-600">0</span>
                </div>
            </div>
        </div>

        <div class="pt-4 border-t border-slate-800 flex items-center justify-end gap-3">
            <a href="{{ route('admin.medals.index') }}" class="px-5 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-slate-300 text-xs font-bold transition">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 text-xs font-black transition shadow-lg shadow-amber-950/40 flex items-center gap-2">
                <i class="fa-solid fa-plus-circle"></i> Tambahkan Akumulasi Medali
            </button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const select = document.getElementById('contingent_select');
        const curCard = document.getElementById('current_tally_card');
        const curGold = document.getElementById('cur_gold');
        const curSilver = document.getElementById('cur_silver');
        const curBronze = document.getElementById('cur_bronze');
        const curTotal = document.getElementById('cur_total');

        const inGold = document.getElementById('input_gold');
        const inSilver = document.getElementById('input_silver');
        const inBronze = document.getElementById('input_bronze');

        const prevGold = document.getElementById('preview_gold');
        const prevSilver = document.getElementById('preview_silver');
        const prevBronze = document.getElementById('preview_bronze');
        const prevTotalBadge = document.getElementById('preview_total_badge');

        function updateMath() {
            const opt = select.options[select.selectedIndex];
            if (!opt || !opt.value) {
                curCard.classList.add('hidden');
                prevGold.textContent = inGold.value || 0;
                prevSilver.textContent = inSilver.value || 0;
                prevBronze.textContent = inBronze.value || 0;
                const tot = (parseInt(inGold.value) || 0) + (parseInt(inSilver.value) || 0) + (parseInt(inBronze.value) || 0);
                prevTotalBadge.textContent = 'Total: ' + tot + ' Medali';
                return;
            }

            curCard.classList.remove('hidden');
            const g0 = parseInt(opt.dataset.gold) || 0;
            const s0 = parseInt(opt.dataset.silver) || 0;
            const b0 = parseInt(opt.dataset.bronze) || 0;

            curGold.textContent = g0;
            curSilver.textContent = s0;
            curBronze.textContent = b0;
            curTotal.textContent = g0 + s0 + b0;

            const addG = parseInt(inGold.value) || 0;
            const addS = parseInt(inSilver.value) || 0;
            const addB = parseInt(inBronze.value) || 0;

            const finalG = g0 + addG;
            const finalS = s0 + addS;
            const finalB = b0 + addB;
            const finalTot = finalG + finalS + finalB;

            prevGold.textContent = finalG + ' (+' + addG + ')';
            prevSilver.textContent = finalS + ' (+' + addS + ')';
            prevBronze.textContent = finalB + ' (+' + addB + ')';
            prevTotalBadge.textContent = 'Total: ' + finalTot + ' Medali (+' + (addG + addS + addB) + ')';
        }

        select.addEventListener('change', updateMath);
        inGold.addEventListener('input', updateMath);
        inSilver.addEventListener('input', updateMath);
        inBronze.addEventListener('input', updateMath);

        updateMath();
    });
</script>
@endsection
