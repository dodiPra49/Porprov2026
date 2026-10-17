<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - PORPROV SUMBAR 2026</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        marawa: {
                            red: '#BE123C',
                            yellow: '#F59E0B',
                            black: '#0F172A',
                            gold: '#D97706',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-900 text-slate-100 flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-slate-950 border-r border-slate-800 flex flex-col fixed inset-y-0 z-30">
        <!-- Logo / Brand -->
        <div class="h-20 flex items-center px-6 border-b border-slate-800 bg-gradient-to-r from-red-950/40 via-slate-950 to-amber-950/30">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-rose-600 via-amber-500 to-yellow-400 flex items-center justify-center font-extrabold text-slate-950 shadow-lg shadow-rose-900/40 text-lg">
                    ⚡
                </div>
                <div>
                    <h1 class="font-extrabold text-base tracking-wider bg-clip-text text-transparent bg-gradient-to-r from-white via-slate-200 to-amber-400 leading-tight">
                        PORPROV 2026
                    </h1>
                    <p class="text-[10px] text-amber-500 font-semibold tracking-widest uppercase">Sumatera Barat</p>
                </div>
            </div>
        </div>

        <!-- Navigation Links -->
        <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">
            <div class="text-[10px] uppercase font-bold text-slate-500 tracking-wider px-3 mb-2">Utama</div>

            <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl font-medium text-sm transition {{ request()->routeIs('admin.dashboard') ? 'bg-rose-600 text-white shadow-lg shadow-rose-600/30 font-semibold' : 'text-slate-400 hover:text-white hover:bg-slate-900' }}">
                <i class="fa-solid fa-gauge-high w-5 text-center"></i>
                <span>Dashboard</span>
            </a>

            <div class="text-[10px] uppercase font-bold text-slate-500 tracking-wider px-3 pt-4 mb-2">Entri Data & Kompetisi</div>

            <!-- Medali -->
            <div class="space-y-1">
                <a href="{{ route('admin.medals.index') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl font-medium text-sm transition {{ request()->routeIs('admin.medals.index') || request()->routeIs('admin.medals.edit') ? 'bg-amber-500 text-slate-950 shadow-lg shadow-amber-500/30 font-bold' : 'text-slate-400 hover:text-white hover:bg-slate-900' }}">
                    <div class="flex items-center space-x-3">
                        <i class="fa-solid fa-medal w-5 text-center text-amber-400 {{ request()->routeIs('admin.medals.index') ? 'text-slate-950' : '' }}"></i>
                        <span>Klasemen Medali</span>
                    </div>
                </a>
                <a href="{{ route('admin.medals.create') }}" class="flex items-center space-x-2 pl-9 pr-3 py-1.5 rounded-lg text-xs transition {{ request()->routeIs('admin.medals.create') ? 'bg-amber-500/20 text-amber-300 font-bold' : 'text-slate-500 hover:text-amber-400' }}">
                    <i class="fa-solid fa-plus text-[10px]"></i>
                    <span>+ Entri Medali Kontingen</span>
                </a>
            </div>

            <!-- Jadwal & Skor -->
            <div class="space-y-1 pt-2">
                <a href="{{ route('admin.schedules.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl font-medium text-sm transition {{ request()->routeIs('admin.schedules.index') ? 'bg-rose-600 text-white shadow-lg shadow-rose-600/30 font-semibold' : 'text-slate-400 hover:text-white hover:bg-slate-900' }}">
                    <i class="fa-solid fa-calendar-days w-5 text-center"></i>
                    <span>Jadwal & Skor</span>
                </a>
                <a href="{{ route('admin.schedules.create') }}" class="flex items-center space-x-2 pl-9 pr-3 py-1.5 rounded-lg text-xs transition {{ request()->routeIs('admin.schedules.create') ? 'bg-rose-600/20 text-rose-300 font-bold' : 'text-slate-500 hover:text-rose-400' }}">
                    <i class="fa-solid fa-plus text-[10px]"></i>
                    <span>+ Tambah Jadwal Laga</span>
                </a>
            </div>

            <!-- Data Atlet -->
            <div class="space-y-1 pt-2">
                <a href="{{ route('admin.athletes.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl font-medium text-sm transition {{ request()->routeIs('admin.athletes.index') || request()->routeIs('admin.athletes.edit') ? 'bg-rose-600 text-white shadow-lg shadow-rose-600/30 font-semibold' : 'text-slate-400 hover:text-white hover:bg-slate-900' }}">
                    <i class="fa-solid fa-person-running w-5 text-center"></i>
                    <span>Data Atlet</span>
                </a>
                <a href="{{ route('admin.athletes.create') }}" class="flex items-center space-x-2 pl-9 pr-3 py-1.5 rounded-lg text-xs transition {{ request()->routeIs('admin.athletes.create') ? 'bg-rose-600/20 text-rose-300 font-bold' : 'text-slate-500 hover:text-rose-400' }}">
                    <i class="fa-solid fa-plus text-[10px]"></i>
                    <span>+ Daftarkan Atlet Baru</span>
                </a>
            </div>

            <div class="text-[10px] uppercase font-bold text-slate-500 tracking-wider px-3 pt-4 mb-2">Publikasi & CMS</div>

            <div class="space-y-1">
                <a href="{{ route('admin.news.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl font-medium text-sm transition {{ request()->routeIs('admin.news.index') || request()->routeIs('admin.news.edit') ? 'bg-rose-600 text-white shadow-lg shadow-rose-600/30 font-semibold' : 'text-slate-400 hover:text-white hover:bg-slate-900' }}">
                    <i class="fa-solid fa-newspaper w-5 text-center"></i>
                    <span>Kelola Berita</span>
                </a>
                <a href="{{ route('admin.news.create') }}" class="flex items-center space-x-2 pl-9 pr-3 py-1.5 rounded-lg text-xs transition {{ request()->routeIs('admin.news.create') ? 'bg-rose-600/20 text-rose-300 font-bold' : 'text-slate-500 hover:text-rose-400' }}">
                    <i class="fa-solid fa-plus text-[10px]"></i>
                    <span>+ Tulis Berita Baru</span>
                </a>
            </div>

            <a href="{{ route('admin.cheers.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-xl font-medium text-sm transition {{ request()->routeIs('admin.cheers.*') ? 'bg-rose-600 text-white shadow-lg shadow-rose-600/30 font-semibold' : 'text-slate-400 hover:text-white hover:bg-slate-900' }} mt-2">
                <i class="fa-solid fa-comments w-5 text-center"></i>
                <span>Supporter Wall</span>
            </a>
        </nav>

        <!-- User info -->
        <div class="p-4 border-t border-slate-800 bg-slate-950/80">
            <div class="flex items-center space-x-3">
                <div class="w-9 h-9 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center text-sm font-bold text-amber-400">
                    DA
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-xs font-semibold text-white truncate">Dodi Agusri, S.Kom</p>
                    <p class="text-[10px] text-emerald-400 flex items-center gap-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                        Super Admin
                    </p>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 ml-64 flex flex-col min-h-screen">
        <!-- Topbar Header -->
        <header class="h-20 bg-slate-950/80 backdrop-blur-md border-b border-slate-800 flex items-center justify-between px-8 sticky top-0 z-20">
            <div class="flex items-center space-x-4">
                <h2 class="text-lg font-bold text-white">@yield('page-title', 'Dashboard')</h2>
                <div class="hidden md:flex items-center gap-2 px-3 py-1 bg-amber-500/10 border border-amber-500/20 rounded-full text-xs text-amber-400 font-medium">
                    <i class="fa-solid fa-fire text-amber-400"></i> Porprov Sumbar 2026 Live CMS
                </div>
            </div>

            <div class="flex items-center space-x-4">
                <a href="http://localhost:3000" target="_blank" class="px-3.5 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-700 border border-slate-700 text-xs font-semibold text-slate-200 transition flex items-center gap-2">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i> Lihat Portal Publik
                </a>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 p-8 bg-slate-900">
            @if(session('success'))
                <div class="mb-6 p-4 rounded-xl bg-emerald-950/50 border border-emerald-500/30 text-emerald-300 text-sm flex items-center gap-3">
                    <i class="fa-solid fa-circle-check text-emerald-400 text-base"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="py-4 px-8 border-t border-slate-800 text-center text-xs text-slate-500">
            &copy; 2026 KONI & Dispora Provinsi Sumatera Barat. Portal Sistem Informasi Pekan Olahraga Provinsi.
        </footer>
    </div>

</body>
</html>
