import './globals.css';

export const metadata = {
  title: 'PORPROV SUMBAR 2026 - Portal Resmi Pekan Olahraga Provinsi Sumatera Barat',
  description: 'Portal resmi PORPROV Sumatera Barat 2026. Menyajikan perolehan medali real-time, berita atlet, jadwal & hasil pertandingan, peta venue, dan supporter wall.',
  keywords: 'Porprov Sumbar 2026, Pekan Olahraga Provinsi Sumatera Barat, Klasemen Medali, Atlet Minang, Jadwal Pertandingan, KONI Sumbar',
};

export default function RootLayout({ children }) {
  return (
    <html lang="id" className="scroll-smooth">
      <head>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossOrigin="anonymous" />
        <link
          href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap"
          rel="stylesheet"
        />
      </head>
      <body className="antialiased selection:bg-rose-600 selection:text-white">
        {/* Navigation Bar */}
        <header className="sticky top-0 z-50 backdrop-blur-xl bg-slate-950/80 border-b border-slate-800/80">
          <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            {/* Logo */}
            <a href="/" className="flex items-center space-x-3.5 group">
              <div className="w-11 h-11 rounded-2xl bg-gradient-to-tr from-rose-600 via-amber-500 to-yellow-400 p-0.5 shadow-lg shadow-rose-950/60 group-hover:scale-105 transition duration-300">
                <div className="w-full h-full bg-slate-950 rounded-[14px] flex items-center justify-center font-black text-amber-400 text-lg">
                  ⚡
                </div>
              </div>
              <div>
                <span className="font-extrabold text-lg tracking-wider bg-clip-text text-transparent bg-gradient-to-r from-white via-slate-100 to-amber-400">
                  PORPROV SUMBAR
                </span>
                <div className="flex items-center gap-1.5 text-[10px] font-bold text-amber-500 tracking-widest uppercase">
                  <span>2026</span>
                  <span>&bull;</span>
                  <span className="text-slate-400 font-semibold">Tuah Sakato</span>
                </div>
              </div>
            </a>

            {/* Desktop Navigation */}
            <nav className="hidden md:flex items-center space-x-1 lg:space-x-2 text-sm font-semibold">
              <a href="#medali" className="px-3.5 py-2 rounded-xl text-slate-300 hover:text-white hover:bg-slate-900/80 transition">
                Klasemen Medali
              </a>
              <a href="#berita" className="px-3.5 py-2 rounded-xl text-slate-300 hover:text-white hover:bg-slate-900/80 transition">
                Berita & Atlet
              </a>
              <a href="#jadwal" className="px-3.5 py-2 rounded-xl text-slate-300 hover:text-white hover:bg-slate-900/80 transition">
                Jadwal & Skor
              </a>
              <a href="#rekor" className="px-3.5 py-2 rounded-xl text-slate-300 hover:text-white hover:bg-slate-900/80 transition">
                Rekor Baru
              </a>
              <a href="#venue" className="px-3.5 py-2 rounded-xl text-slate-300 hover:text-white hover:bg-slate-900/80 transition">
                Peta Venue
              </a>
              <a href="#supporter" className="px-3.5 py-2 rounded-xl text-slate-300 hover:text-white hover:bg-slate-900/80 transition">
                Supporter Wall
              </a>
            </nav>

            {/* Action Button: Ke Admin Laravel */}
            <div className="flex items-center space-x-3">
              <a
                href="http://localhost:8000/admin"
                className="px-4 py-2 rounded-xl bg-gradient-to-r from-rose-600 to-rose-700 hover:from-rose-500 hover:to-rose-600 text-white text-xs font-bold transition shadow-lg shadow-rose-900/40 flex items-center gap-2 border border-rose-500/30"
              >
                <span>Panel Admin</span>
                <span className="text-xs">→</span>
              </a>
            </div>
          </div>
        </header>

        {/* Content */}
        <main>{children}</main>

        {/* Footer */}
        <footer className="mt-24 border-t border-slate-800 bg-slate-950/90 py-12">
          <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div className="grid grid-cols-1 md:grid-cols-4 gap-8 mb-10">
              <div className="md:col-span-2">
                <div className="flex items-center space-x-3 mb-4">
                  <div className="w-9 h-9 rounded-xl bg-amber-400 flex items-center justify-center font-black text-slate-950 text-base">
                    ⚡
                  </div>
                  <span className="font-extrabold text-base text-white">PORPROV SUMATERA BARAT 2026</span>
                </div>
                <p className="text-slate-400 text-xs leading-relaxed max-w-md">
                  Pekan Olahraga Provinsi Sumatera Barat 2026 merupakan pesta olahraga multi-event terbesar di Ranah Minang yang mempertemukan atlet-atlet terbaik dari 19 Kabupaten dan Kota dalam semangat sportivitas dan persaudaraan sejati.
                </p>
              </div>

              <div>
                <h4 className="text-xs font-bold text-amber-400 uppercase tracking-widest mb-3">Tautan Cepat</h4>
                <ul className="space-y-2 text-xs text-slate-400">
                  <li><a href="#medali" className="hover:text-white transition">Perolehan Medali Resmi</a></li>
                  <li><a href="#jadwal" className="hover:text-white transition">Jadwal & Hasil Pertandingan</a></li>
                  <li><a href="#berita" className="hover:text-white transition">Berita Wawancara Atlet</a></li>
                  <li><a href="#dokumen" className="hover:text-white transition">Technical Handbook (THB)</a></li>
                </ul>
              </div>

              <div>
                <h4 className="text-xs font-bold text-amber-400 uppercase tracking-widest mb-3">Penyelenggara</h4>
                <p className="text-xs text-slate-400 leading-relaxed">
                  Pemerintah Provinsi Sumatera Barat<br />
                  Dinas Pemuda dan Olahraga (Dispora)<br />
                  Komite Olahraga Nasional Indonesia (KONI) Sumbar
                </p>
              </div>
            </div>

            <div className="pt-8 border-t border-slate-800/80 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500 gap-4">
              <p>&copy; 2026 Panitia Besar PORPROV Sumatera Barat. Hak Cipta Dilindungi Undang-Undang.</p>
              <div className="flex items-center gap-4 text-slate-400">
                <span className="flex items-center gap-1.5">
                  <span className="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                  Sistem Real-Time Online
                </span>
              </div>
            </div>
          </div>
        </footer>
      </body>
    </html>
  );
}
