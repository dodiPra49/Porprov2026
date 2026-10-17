'use client';

import { useState, useEffect } from 'react';
import { 
  Trophy, Medal, Flame, Calendar, MapPin, 
  Search, Heart, Send, Download, ExternalLink, 
  ArrowUpRight, Activity, Newspaper, ChevronRight, Award
} from 'lucide-react';

export default function HomePage() {
  // State data
  const [medals, setMedals] = useState([]);
  const [summary, setSummary] = useState({ total_gold: 0, total_silver: 0, total_bronze: 0, grand_total: 0 });
  const [news, setNews] = useState([]);
  const [schedules, setSchedules] = useState([]);
  const [records, setRecords] = useState([]);
  const [venues, setVenues] = useState([]);
  const [cheers, setCheers] = useState([]);
  const [contingents, setContingents] = useState([]);
  const [documents, setDocuments] = useState([]);
  
  // Filter states
  const [searchContingent, setSearchContingent] = useState('');
  const [selectedSport, setSelectedSport] = useState('all');

  // Cheering form state
  const [cheerForm, setCheerForm] = useState({
    sender_name: '',
    sender_city: '',
    contingent_id: '1',
    message: ''
  });
  const [cheerSubmitting, setCheerSubmitting] = useState(false);
  const [cheerSuccess, setCheerSuccess] = useState(false);

  // Fetch initial data from Express REST API
  useEffect(() => {
    const API_URL = process.env.NEXT_PUBLIC_API_URL || 'http://localhost:5000/api/v1';

    // 1. Fetch Medals
    fetch(`${API_URL}/medals`)
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          setMedals(data.data);
          setSummary(data.summary);
        }
      })
      .catch(err => console.error('Error fetching medals:', err));

    // 2. Fetch News
    fetch(`${API_URL}/news?limit=6`)
      .then(res => res.json())
      .then(data => {
        if (data.success) setNews(data.data);
      })
      .catch(err => console.error('Error fetching news:', err));

    // 3. Fetch Schedules
    fetch(`${API_URL}/schedules`)
      .then(res => res.json())
      .then(data => {
        if (data.success) setSchedules(data.data);
      })
      .catch(err => console.error('Error fetching schedules:', err));

    // 4. Fetch Records
    fetch(`${API_URL}/records`)
      .then(res => res.json())
      .then(data => {
        if (data.success) setRecords(data.data);
      })
      .catch(err => console.error('Error fetching records:', err));

    // 5. Fetch Venues
    fetch(`${API_URL}/venues`)
      .then(res => res.json())
      .then(data => {
        if (data.success) setVenues(data.data);
      })
      .catch(err => console.error('Error fetching venues:', err));

    // 6. Fetch Cheers
    fetch(`${API_URL}/cheers?limit=6`)
      .then(res => res.json())
      .then(data => {
        if (data.success) setCheers(data.data);
      })
      .catch(err => console.error('Error fetching cheers:', err));

    // 7. Fetch Contingents
    fetch(`${API_URL}/contingents`)
      .then(res => res.json())
      .then(data => {
        if (data.success) setContingents(data.data);
      })
      .catch(err => console.error('Error fetching contingents:', err));

    // 8. Fetch Documents
    fetch(`${API_URL}/documents`)
      .then(res => res.json())
      .then(data => {
        if (data.success) setDocuments(data.data);
      })
      .catch(err => console.error('Error fetching documents:', err));
  }, []);

  // Handle Cheering Form Submit
  const handleCheerSubmit = async (e) => {
    e.preventDefault();
    if (!cheerForm.sender_name || !cheerForm.message) return;

    setCheerSubmitting(true);
    const API_URL = process.env.NEXT_PUBLIC_API_URL || 'http://localhost:5000/api/v1';

    try {
      const res = await fetch(`${API_URL}/cheers`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(cheerForm)
      });
      const result = await res.json();
      if (result.success) {
        setCheerSuccess(true);
        // Tambahkan ke state lokal
        const selectedCon = contingents.find(c => c.id == cheerForm.contingent_id);
        setCheers([
          {
            id: result.id,
            sender_name: cheerForm.sender_name,
            sender_city: cheerForm.sender_city || 'Sumbar',
            message: cheerForm.message,
            likes_count: 0,
            contingent_name: selectedCon ? selectedCon.name : 'Sumatera Barat',
            color_hex: selectedCon ? selectedCon.color_hex : '#E11D48'
          },
          ...cheers
        ]);
        setCheerForm({ sender_name: '', sender_city: '', contingent_id: '1', message: '' });
        setTimeout(() => setCheerSuccess(false), 5000);
      }
    } catch (err) {
      console.error('Error submitting cheer:', err);
    } finally {
      setCheerSubmitting(false);
    }
  };

  // Filtered Medals
  const filteredMedals = medals.filter(item => 
    item.contingent_name.toLowerCase().includes(searchContingent.toLowerCase()) ||
    item.contingent_code.toLowerCase().includes(searchContingent.toLowerCase())
  );

  // Filtered Schedules
  const filteredSchedules = selectedSport === 'all' 
    ? schedules 
    : schedules.filter(item => item.sport_slug === selectedSport);

  return (
    <div className="space-y-24">
      {/* 1. HERO SECTION */}
      <section className="relative pt-12 pb-20 overflow-hidden">
        {/* Background Gradients */}
        <div className="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-96 bg-gradient-to-b from-rose-900/30 via-amber-900/10 to-transparent blur-3xl pointer-events-none -z-10"></div>

        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center max-w-3xl mx-auto space-y-6">
            {/* Live Indicator */}
            <div className="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-rose-950/80 border border-rose-500/40 text-rose-300 text-xs font-bold tracking-wide shadow-lg shadow-rose-950/40 animate-pulse">
              <span className="w-2 h-2 rounded-full bg-rose-500"></span>
              PORTAL RESMI PORPROV SUMBAR 2026 LIVE
            </div>

            <h1 className="text-4xl sm:text-6xl font-black tracking-tight text-white leading-tight">
              Gemilang Prestasi Olahraga <br />
              <span className="bg-clip-text text-transparent bg-gradient-to-r from-amber-400 via-yellow-200 to-rose-400">
                Ranah Minangkabau
              </span>
            </h1>

            <p className="text-slate-300 text-base sm:text-lg leading-relaxed max-w-2xl mx-auto font-normal">
              Ikuti perkembangan perolehan medali 19 Kabupaten/Kota, jadwal dan hasil pertandingan cabang olahraga, serta kisah inspiratif para atlet kebanggaan Sumatera Barat.
            </p>

            <div className="flex flex-wrap items-center justify-center gap-4 pt-2">
              <a
                href="#medali"
                className="px-6 py-3.5 rounded-xl bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-slate-950 font-black text-sm transition shadow-xl shadow-amber-950/50 flex items-center gap-2"
              >
                <Trophy className="w-4 h-4" />
                <span>Cek Klasemen Medali</span>
              </a>
              <a
                href="#jadwal"
                className="px-6 py-3.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-sm transition border border-slate-700 flex items-center gap-2"
              >
                <Calendar className="w-4 h-4 text-rose-400" />
                <span>Jadwal & Skor Live</span>
              </a>
            </div>
          </div>

          {/* Quick Metrics Cards */}
          <div className="grid grid-cols-2 md:grid-cols-4 gap-4 mt-16 max-w-5xl mx-auto">
            <div className="bg-slate-950/60 backdrop-blur-md border border-slate-800/80 rounded-2xl p-5 text-center hover:border-amber-500/40 transition">
              <p className="text-3xl font-black text-white">19</p>
              <p className="text-xs font-semibold text-slate-400 uppercase tracking-wider mt-1">Kontingen Daerah</p>
            </div>
            <div className="bg-slate-950/60 backdrop-blur-md border border-slate-800/80 rounded-2xl p-5 text-center hover:border-amber-500/40 transition">
              <p className="text-3xl font-black text-amber-400">10+</p>
              <p className="text-xs font-semibold text-slate-400 uppercase tracking-wider mt-1">Cabang Olahraga</p>
            </div>
            <div className="bg-slate-950/60 backdrop-blur-md border border-slate-800/80 rounded-2xl p-5 text-center hover:border-amber-500/40 transition">
              <p className="text-3xl font-black text-rose-400">2.500+</p>
              <p className="text-xs font-semibold text-slate-400 uppercase tracking-wider mt-1">Atlet Bertanding</p>
            </div>
            <div className="bg-slate-950/60 backdrop-blur-md border border-slate-800/80 rounded-2xl p-5 text-center hover:border-amber-500/40 transition">
              <p className="text-3xl font-black text-emerald-400">10</p>
              <p className="text-xs font-semibold text-slate-400 uppercase tracking-wider mt-1">Venue Pertandingan</p>
            </div>
          </div>
        </div>
      </section>

      {/* 2. KLASEMEN MEDALI REAL-TIME */}
      <section id="medali" className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 scroll-mt-24">
        <div className="bg-slate-950/80 border border-slate-800/90 rounded-3xl p-6 sm:p-8 shadow-2xl backdrop-blur-xl">
          <div className="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
              <div className="flex items-center gap-2 text-amber-400 text-xs font-extrabold uppercase tracking-widest mb-1">
                <Medal className="w-4 h-4" />
                <span>Papan Peringkat Resmi</span>
              </div>
              <h2 className="text-2xl sm:text-3xl font-black text-white">
                Klasemen Perolehan Medali
              </h2>
              <p className="text-xs sm:text-sm text-slate-400 mt-1">
                Data diperbarui langsung secara real-time dari sistem wasit & juri PORPROV 2026.
              </p>
            </div>

            {/* Search Input */}
            <div className="relative w-full md:w-72">
              <Search className="w-4 h-4 text-slate-500 absolute left-3.5 top-1/2 -translate-y-1/2" />
              <input
                type="text"
                placeholder="Cari Kota / Kabupaten..."
                value={searchContingent}
                onChange={(e) => setSearchContingent(e.target.value)}
                className="w-full pl-10 pr-4 py-2.5 bg-slate-900 border border-slate-700/80 rounded-xl text-xs sm:text-sm text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-amber-400"
              />
            </div>
          </div>

          {/* Medals Summary Stat Pills */}
          <div className="grid grid-cols-2 sm:grid-cols-4 gap-3 mb-6">
            <div className="p-3.5 rounded-xl bg-amber-500/10 border border-amber-500/20 text-center">
              <span className="text-[10px] uppercase font-bold text-amber-400 block tracking-wider">Emas Diperebutkan</span>
              <span className="text-xl font-black text-amber-400 mt-0.5 block">{summary.total_gold}</span>
            </div>
            <div className="p-3.5 rounded-xl bg-slate-400/10 border border-slate-400/20 text-center">
              <span className="text-[10px] uppercase font-bold text-slate-300 block tracking-wider">Perak Diperebutkan</span>
              <span className="text-xl font-black text-slate-300 mt-0.5 block">{summary.total_silver}</span>
            </div>
            <div className="p-3.5 rounded-xl bg-amber-700/10 border border-amber-700/20 text-center">
              <span className="text-[10px] uppercase font-bold text-amber-600 block tracking-wider">Perunggu Diperebutkan</span>
              <span className="text-xl font-black text-amber-600 mt-0.5 block">{summary.total_bronze}</span>
            </div>
            <div className="p-3.5 rounded-xl bg-rose-500/10 border border-rose-500/20 text-center">
              <span className="text-[10px] uppercase font-bold text-rose-400 block tracking-wider">Total Seluruh Medali</span>
              <span className="text-xl font-black text-rose-400 mt-0.5 block">{summary.grand_total}</span>
            </div>
          </div>

          {/* Table */}
          <div className="overflow-x-auto rounded-2xl border border-slate-800/80">
            <table className="w-full text-left text-sm">
              <thead>
                <tr className="bg-slate-900/90 text-slate-400 text-xs uppercase tracking-wider border-b border-slate-800">
                  <th className="py-4 px-4 text-center">Peringkat</th>
                  <th className="py-4 px-4">Kontingen</th>
                  <th className="py-4 px-4 text-center text-amber-400 font-extrabold">🥇 Emas</th>
                  <th className="py-4 px-4 text-center text-slate-300 font-extrabold">🥈 Perak</th>
                  <th className="py-4 px-4 text-center text-amber-600 font-extrabold">🥉 Perunggu</th>
                  <th className="py-4 px-4 text-center font-black text-white">Total</th>
                </tr>
              </thead>
              <tbody className="divide-y divide-slate-800/70 bg-slate-950/40">
                {filteredMedals.map((item, idx) => (
                  <tr key={item.id} className="hover:bg-slate-900/50 transition">
                    <td className="py-4 px-4 text-center">
                      <span className={`inline-flex w-7 h-7 rounded-full items-center justify-center text-xs font-black ${
                        idx === 0 
                          ? 'bg-amber-400 text-slate-950 shadow-md shadow-amber-400/30' 
                          : idx === 1 
                          ? 'bg-slate-300 text-slate-950' 
                          : idx === 2 
                          ? 'bg-amber-700 text-white' 
                          : 'bg-slate-800 text-slate-400'
                      }`}>
                        {item.rank}
                      </span>
                    </td>
                    <td className="py-4 px-4 font-bold text-white">
                      <div className="flex items-center space-x-3">
                        <div 
                          className="w-3 h-3 rounded-full" 
                          style={{ backgroundColor: item.color_hex || '#be123c' }}
                        ></div>
                        <div>
                          <span>{item.contingent_name}</span>
                          <span className="text-[10px] text-slate-500 font-normal block">
                            Kode: {item.contingent_code}
                          </span>
                        </div>
                      </div>
                    </td>
                    <td className="py-4 px-4 text-center font-bold text-amber-400 text-base">{item.gold}</td>
                    <td className="py-4 px-4 text-center font-bold text-slate-300 text-base">{item.silver}</td>
                    <td className="py-4 px-4 text-center font-bold text-amber-600 text-base">{item.bronze}</td>
                    <td className="py-4 px-4 text-center font-black text-rose-400 text-lg">{item.total_medals}</td>
                  </tr>
                ))}
              </tbody>
            </table>
          </div>
        </div>
      </section>

      {/* 3. KANAL BERITA ATLET & SOROTAN EVENT */}
      <section id="berita" className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 scroll-mt-24">
        <div className="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-4">
          <div>
            <div className="flex items-center gap-2 text-rose-500 text-xs font-extrabold uppercase tracking-widest mb-1">
              <Newspaper className="w-4 h-4" />
              <span>Liputan Media & Human Interest</span>
            </div>
            <h2 className="text-2xl sm:text-3xl font-black text-white">
              Kabar Terkini & Sorotan Atlet
            </h2>
            <p className="text-xs sm:text-sm text-slate-400 mt-1">
              Ikuti kisah perjuangan dan pencapaian luar biasa para atlet dari arena Porprov.
            </p>
          </div>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          {news.map((item) => (
            <article 
              key={item.id}
              className="bg-slate-950/80 border border-slate-800 rounded-2xl overflow-hidden hover:border-slate-700 transition duration-300 flex flex-col justify-between group shadow-xl"
            >
              <div>
                <div className="h-44 bg-gradient-to-tr from-rose-950 to-slate-900 relative overflow-hidden flex items-center justify-center p-4">
                  <div className="text-center">
                    <span className="px-3 py-1 rounded-full bg-slate-950/70 border border-slate-800 text-[10px] font-bold text-amber-400 uppercase tracking-widest">
                      {item.category_name}
                    </span>
                  </div>
                </div>

                <div className="p-6">
                  <div className="flex items-center gap-2 text-[11px] text-slate-500 mb-2">
                    <span>{new Date(item.published_at).toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' })}</span>
                    <span>&bull;</span>
                    <span>Oleh {item.author_name}</span>
                  </div>
                  <h3 className="text-base font-bold text-white group-hover:text-amber-400 transition leading-snug line-clamp-2">
                    {item.title}
                  </h3>
                  <p className="text-xs text-slate-400 mt-2 line-clamp-3 leading-relaxed">
                    {item.excerpt}
                  </p>
                </div>
              </div>

              <div className="px-6 pb-6 pt-2 border-t border-slate-900 flex items-center justify-between">
                <span className="text-[11px] text-slate-500 flex items-center gap-1">
                  <Activity className="w-3.5 h-3.5 text-slate-600" />
                  {item.views_count} dibaca
                </span>
                <span className="text-xs font-bold text-amber-400 group-hover:translate-x-1 transition flex items-center gap-1">
                  Baca Lengkap &rarr;
                </span>
              </div>
            </article>
          ))}
        </div>
      </section>

      {/* 4. MATCH CENTER: JADWAL & HASIL SKOR */}
      <section id="jadwal" className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 scroll-mt-24">
        <div className="bg-slate-950/80 border border-slate-800 rounded-3xl p-6 sm:p-8 shadow-2xl">
          <div className="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
            <div>
              <div className="flex items-center gap-2 text-rose-400 text-xs font-extrabold uppercase tracking-widest mb-1">
                <Calendar className="w-4 h-4" />
                <span>Match Center Live</span>
              </div>
              <h2 className="text-2xl sm:text-3xl font-black text-white">
                Jadwal & Hasil Pertandingan
              </h2>
            </div>

            {/* Sport Filter Pills */}
            <div className="flex flex-wrap gap-2">
              <button
                onClick={() => setSelectedSport('all')}
                className={`px-3 py-1.5 rounded-lg text-xs font-bold transition ${
                  selectedSport === 'all'
                    ? 'bg-rose-600 text-white'
                    : 'bg-slate-900 text-slate-400 hover:text-white'
                }`}
              >
                Semua Cabor
              </button>
              <button
                onClick={() => setSelectedSport('pencak-silat')}
                className={`px-3 py-1.5 rounded-lg text-xs font-bold transition ${
                  selectedSport === 'pencak-silat'
                    ? 'bg-rose-600 text-white'
                    : 'bg-slate-900 text-slate-400 hover:text-white'
                }`}
              >
                Pencak Silat
              </button>
              <button
                onClick={() => setSelectedSport('atletik')}
                className={`px-3 py-1.5 rounded-lg text-xs font-bold transition ${
                  selectedSport === 'atletik'
                    ? 'bg-rose-600 text-white'
                    : 'bg-slate-900 text-slate-400 hover:text-white'
                }`}
              >
                Atletik
              </button>
              <button
                onClick={() => setSelectedSport('sepak-takraw')}
                className={`px-3 py-1.5 rounded-lg text-xs font-bold transition ${
                  selectedSport === 'sepak-takraw'
                    ? 'bg-rose-600 text-white'
                    : 'bg-slate-900 text-slate-400 hover:text-white'
                }`}
              >
                Sepak Takraw
              </button>
            </div>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
            {filteredSchedules.map((sch) => (
              <div 
                key={sch.id}
                className="bg-slate-900/60 border border-slate-800 rounded-2xl p-5 hover:border-slate-700 transition"
              >
                <div className="flex items-center justify-between mb-3">
                  <div className="flex items-center gap-2">
                    <span className="px-2.5 py-1 rounded-md bg-slate-800 text-amber-400 text-xs font-bold">
                      {sch.sport_name}
                    </span>
                    <span className="text-xs text-slate-500 font-mono">
                      {sch.match_code}
                    </span>
                  </div>

                  <span className={`px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider ${
                    sch.status === 'completed'
                      ? 'bg-emerald-950 text-emerald-400 border border-emerald-500/30'
                      : sch.status === 'ongoing'
                      ? 'bg-amber-950 text-amber-400 border border-amber-500/30 animate-pulse'
                      : 'bg-slate-800 text-slate-400'
                  }`}>
                    {sch.status}
                  </span>
                </div>

                <h4 className="text-sm font-bold text-white">
                  {sch.sub_sport_name} &bull; {sch.round_name}
                </h4>

                <div className="mt-3 flex items-center justify-between text-xs text-slate-400">
                  <span className="flex items-center gap-1.5">
                    <MapPin className="w-3.5 h-3.5 text-rose-500" />
                    {sch.venue_name} ({sch.venue_city})
                  </span>
                  <span>
                    {new Date(sch.scheduled_at).toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' })} WIB
                  </span>
                </div>

                {sch.score_summary && (
                  <div className="mt-4 pt-3 border-t border-slate-800/80 flex items-center justify-between">
                    <div>
                      <span className="text-[10px] uppercase font-bold text-slate-500 block">Hasil Skor Akhir</span>
                      <span className="text-sm font-extrabold text-amber-400 font-mono">{sch.score_summary}</span>
                    </div>
                    {sch.winner_name && (
                      <div className="text-right">
                        <span className="text-[10px] uppercase font-bold text-slate-500 block">Pemenang</span>
                        <span className="text-xs font-bold text-emerald-400">{sch.winner_name} ({sch.winner_contingent})</span>
                      </div>
                    )}
                  </div>
                )}
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* 5. HALL OF FAME: REKOR BARU PORPROV */}
      <section id="rekor" className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 scroll-mt-24">
        <div className="bg-gradient-to-r from-amber-950/40 via-slate-950 to-rose-950/30 border border-amber-500/30 rounded-3xl p-6 sm:p-8 shadow-2xl">
          <div className="mb-6">
            <div className="flex items-center gap-2 text-amber-400 text-xs font-extrabold uppercase tracking-widest mb-1">
              <Award className="w-4 h-4" />
              <span>Record Breakers Showcase</span>
            </div>
            <h2 className="text-2xl sm:text-3xl font-black text-white">
              Rekor Baru Porprov 2026
            </h2>
            <p className="text-xs sm:text-sm text-slate-400 mt-1">
              Apresiasi untuk atlet-atlet yang menorehkan sejarah baru di Ranah Minang.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            {records.map((rec) => (
              <div 
                key={rec.id}
                className="bg-slate-900/80 border border-slate-800 rounded-2xl p-5 hover:border-amber-400/50 transition duration-300"
              >
                <div className="flex items-center justify-between mb-2">
                  <span className="text-xs font-bold text-amber-400">{rec.sport_name}</span>
                  <span className="px-2 py-0.5 rounded bg-rose-950 text-rose-300 text-[10px] font-bold">
                    {rec.contingent_name}
                  </span>
                </div>
                <h4 className="text-sm font-black text-white">{rec.athlete_name}</h4>
                <p className="text-xs text-slate-400 mt-0.5">{rec.record_metric}</p>

                <div className="mt-4 p-3 rounded-xl bg-slate-950 border border-slate-800/80 flex items-center justify-between">
                  <div>
                    <span className="text-[10px] text-slate-500 block uppercase">Rekor Lama</span>
                    <span className="text-xs text-slate-400 font-semibold line-through">{rec.previous_record}</span>
                  </div>
                  <div className="text-right">
                    <span className="text-[10px] text-amber-500 font-bold block uppercase">Rekor Baru ✨</span>
                    <span className="text-sm font-black text-amber-400">{rec.new_record}</span>
                  </div>
                </div>

                <p className="text-[11px] text-slate-500 mt-3 flex items-center gap-1">
                  <MapPin className="w-3 h-3" />
                  {rec.venue_name}
                </p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* 6. PETA VENUE PERTANDINGAN (VENUE GUIDE) */}
      <section id="venue" className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 scroll-mt-24">
        <div className="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-4">
          <div>
            <div className="flex items-center gap-2 text-emerald-400 text-xs font-extrabold uppercase tracking-widest mb-1">
              <MapPin className="w-4 h-4" />
              <span>Lokasi & Navigasi Gelanggang</span>
            </div>
            <h2 className="text-2xl sm:text-3xl font-black text-white">
              Peta Lokasi Venue Pertandingan
            </h2>
            <p className="text-xs sm:text-sm text-slate-400 mt-1">
              Navigasi lokasi gelanggang olahraga dan stadion di kabupaten/kota se-Sumatera Barat.
            </p>
          </div>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          {venues.map((v) => (
            <div 
              key={v.id}
              className="bg-slate-950/80 border border-slate-800 rounded-2xl p-5 hover:border-slate-700 transition flex flex-col justify-between shadow-xl"
            >
              <div>
                <div className="flex items-center justify-between mb-2">
                  <span className="px-2.5 py-1 rounded-md bg-emerald-950 border border-emerald-500/30 text-emerald-400 font-bold text-[10px] uppercase">
                    {v.city}
                  </span>
                  <span className="text-xs text-slate-500">
                    Kapasitas: {v.capacity.toLocaleString()} orang
                  </span>
                </div>
                <h3 className="text-base font-bold text-white mt-1">{v.name}</h3>
                <p className="text-xs text-slate-400 mt-1 leading-relaxed">{v.address}</p>
              </div>

              <div className="mt-5 pt-3 border-t border-slate-900 flex items-center justify-between">
                <span className="text-[11px] text-slate-500">
                  {v.contact_person || 'Panitia Lapangan'}
                </span>
                <a
                  href={v.google_map_url || '#'}
                  target="_blank"
                  rel="noopener noreferrer"
                  className="px-3 py-1.5 rounded-lg bg-slate-900 hover:bg-slate-800 text-amber-400 text-xs font-bold transition flex items-center gap-1.5 border border-slate-800"
                >
                  <span>Google Maps</span>
                  <ExternalLink className="w-3 h-3" />
                </a>
              </div>
            </div>
          ))}
        </div>
      </section>

      {/* 7. SUPPORTER WALL & FORM DUKUNGAN */}
      <section id="supporter" className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 scroll-mt-24">
        <div className="grid grid-cols-1 lg:grid-cols-3 gap-8">
          {/* Kirim Ucapan */}
          <div className="bg-slate-950 border border-slate-800 rounded-3xl p-6 sm:p-8 shadow-2xl">
            <div className="flex items-center gap-2 text-rose-400 text-xs font-extrabold uppercase tracking-widest mb-1">
              <Heart className="w-4 h-4 fill-rose-500" />
              <span>Dukung Atlet Daerahmu</span>
            </div>
            <h3 className="text-xl font-black text-white">Kirim Semangat & Doa</h3>
            <p className="text-xs text-slate-400 mt-1 mb-6">
              Pesan Anda akan langsung ditampilkan di videotron arena dan situs resmi Porprov!
            </p>

            {cheerSuccess && (
              <div className="mb-4 p-3 rounded-xl bg-emerald-950/60 border border-emerald-500/30 text-emerald-300 text-xs">
                ✅ Pesan doa Anda berhasil terkirim!
              </div>
            )}

            <form onSubmit={handleCheerSubmit} className="space-y-4">
              <div>
                <label className="block text-[11px] font-bold text-slate-300 uppercase mb-1">Nama Anda *</label>
                <input
                  type="text"
                  required
                  placeholder="Contoh: Uni Fitria"
                  value={cheerForm.sender_name}
                  onChange={(e) => setCheerForm({ ...cheerForm, sender_name: e.target.value })}
                  className="w-full px-3.5 py-2 bg-slate-900 border border-slate-700 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-rose-500"
                />
              </div>

              <div>
                <label className="block text-[11px] font-bold text-slate-300 uppercase mb-1">Kota / Domisili</label>
                <input
                  type="text"
                  placeholder="Contoh: Padang / Perantau Pekanbaru"
                  value={cheerForm.sender_city}
                  onChange={(e) => setCheerForm({ ...cheerForm, sender_city: e.target.value })}
                  className="w-full px-3.5 py-2 bg-slate-900 border border-slate-700 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-rose-500"
                />
              </div>

              <div>
                <label className="block text-[11px] font-bold text-slate-300 uppercase mb-1">Pilih Kontingen yang Didukung</label>
                <select
                  value={cheerForm.contingent_id}
                  onChange={(e) => setCheerForm({ ...cheerForm, contingent_id: e.target.value })}
                  className="w-full px-3.5 py-2 bg-slate-900 border border-slate-700 rounded-xl text-xs text-white focus:outline-none focus:ring-2 focus:ring-rose-500"
                >
                  {contingents.map((con) => (
                    <option key={con.id} value={con.id}>{con.name}</option>
                  ))}
                </select>
              </div>

              <div>
                <label className="block text-[11px] font-bold text-slate-300 uppercase mb-1">Pesan Semangat *</label>
                <textarea
                  rows="3"
                  required
                  placeholder="Tuliskan ucapan penyemangat untuk para atlet..."
                  value={cheerForm.message}
                  onChange={(e) => setCheerForm({ ...cheerForm, message: e.target.value })}
                  className="w-full px-3.5 py-2 bg-slate-900 border border-slate-700 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-rose-500"
                ></textarea>
              </div>

              <button
                type="submit"
                disabled={cheerSubmitting}
                className="w-full py-3 bg-rose-600 hover:bg-rose-500 text-white rounded-xl text-xs font-bold transition flex items-center justify-center gap-2 shadow-lg shadow-rose-900/30"
              >
                <Send className="w-3.5 h-3.5" />
                <span>{cheerSubmitting ? 'Mengirim...' : 'Kirim Pesan Dukungan'}</span>
              </button>
            </form>
          </div>

          {/* Feed Pesan Supporter */}
          <div className="lg:col-span-2 space-y-4">
            <div className="flex items-center justify-between mb-2">
              <h3 className="text-xl font-black text-white">Dinding Dukungan Suporter Terkini</h3>
              <span className="text-xs text-slate-500">Live Feedback</span>
            </div>

            <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
              {cheers.map((ch) => (
                <div 
                  key={ch.id}
                  className="bg-slate-950/70 border border-slate-800 rounded-2xl p-4 flex flex-col justify-between hover:border-slate-700 transition"
                >
                  <div>
                    <div className="flex items-center justify-between mb-2">
                      <span className="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider bg-rose-950 text-rose-300 border border-rose-900/30">
                        {ch.contingent_name}
                      </span>
                      <span className="text-xs text-slate-500 flex items-center gap-1">
                        <Heart className="w-3.5 h-3.5 text-rose-500 fill-rose-500" />
                        {ch.likes_count}
                      </span>
                    </div>
                    <p className="text-xs text-slate-200 italic leading-relaxed">
                      "{ch.message}"
                    </p>
                  </div>
                  <div className="mt-3 pt-2 border-t border-slate-900 flex items-center justify-between">
                    <span className="text-xs font-bold text-amber-400">{ch.sender_name}</span>
                    <span className="text-[10px] text-slate-500">{ch.sender_city}</span>
                  </div>
                </div>
              ))}
            </div>
          </div>
        </div>
      </section>

      {/* 8. PUSAT UNDUHAN (DOWNLOAD CENTER) */}
      <section id="dokumen" className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12 scroll-mt-24">
        <div className="bg-slate-950 border border-slate-800 rounded-3xl p-6 sm:p-8">
          <div className="mb-6">
            <div className="flex items-center gap-2 text-amber-400 text-xs font-extrabold uppercase tracking-widest mb-1">
              <Download className="w-4 h-4" />
              <span>Berkas Resmi & Buku Panduan</span>
            </div>
            <h2 className="text-2xl font-black text-white">Pusat Unduhan (Download Center)</h2>
            <p className="text-xs text-slate-400 mt-1">
              Unduh Technical Handbook (THB) cabor, regulasi pertandingan, dan lembar hasil resmi berformat PDF.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            {documents.slice(0, 6).map((doc) => (
              <div 
                key={doc.id}
                className="p-4 rounded-2xl bg-slate-900/80 border border-slate-800 flex items-center justify-between hover:bg-slate-900 transition"
              >
                <div className="pr-3 min-w-0">
                  <span className="text-[9px] uppercase font-bold text-amber-400 block tracking-wider">
                    {doc.document_type}
                  </span>
                  <h4 className="text-xs font-bold text-white truncate mt-0.5">{doc.title}</h4>
                  <span className="text-[10px] text-slate-500 block mt-0.5">
                    Format: {doc.file_format.toUpperCase()} &bull; {doc.file_size_kb} KB
                  </span>
                </div>
                <a
                  href="#"
                  onClick={(e) => { e.preventDefault(); alert(`Mengunduh berkas resmi: ${doc.title}`); }}
                  className="p-2.5 rounded-xl bg-slate-800 hover:bg-rose-600 text-slate-300 hover:text-white transition flex-shrink-0"
                >
                  <Download className="w-4 h-4" />
                </a>
              </div>
            ))}
          </div>
        </div>
      </section>
    </div>
  );
}
