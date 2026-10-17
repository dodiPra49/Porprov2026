<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $news = [
            [
                'id' => 1,
                'category_id' => 1, // Berita Utama
                'author_id' => 3, // Rahmatul Fadli
                'title' => 'Kemegahan Pembukaan Porprov Sumbar 2026: Marawa Berkibar di Gelora H. Agus Salim',
                'slug' => 'kemegahan-pembukaan-porprov-sumbar-2026-marawa-berkibar',
                'excerpt' => 'Ribuan atlet dari 19 Kabupaten/Kota tumpah ruah dalam defile pembukaan spektakuler yang dihadiri Gubernur Sumatera Barat.',
                'content' => '<p><strong>PADANG</strong> &mdash; Pekan Olahraga Provinsi (PORPROV) Sumatera Barat 2026 resmi dibuka dengan meriah di Stadion Utama Gelora H. Agus Salim Padang. Ribuan atlet dan ofisial dari 19 kontingen Kabupaten dan Kota berbaris rapi dalam defile penuh warna dengan balutan kain Marawa khas Minangkabau.</p><p>Gubernur Sumatera Barat dalam amanatnya menekankan pentingnya sportivitas, persaudaraan ranah Minang, dan pembinaan atlet jangka panjang menuju PON masa depan. Sorak-sorai penonton menggema saat obor api Porprov dinyalakan oleh mantan atlet legendaris Sumbar.</p>',
                'thumbnail_url' => '/images/news/opening_porprov.jpg',
                'views_count' => 5420,
                'is_featured' => true,
                'status' => 'published',
                'published_at' => '2026-10-17 20:00:00',
            ],
            [
                'id' => 2,
                'category_id' => 2, // Sorotan Atlet
                'author_id' => 10, // Siti Nurhaliza
                'title' => 'Kisah Fadli Rahman, Pesilat Muda Asal Padang yang Berjaya di Pentas Silat',
                'slug' => 'kisah-fadli-rahman-pesilat-muda-asal-padang-berjaya',
                'excerpt' => 'Mengenal sosok pesilat tangguh kelas A yang mempersembahkan emas pembuka untuk Kota Padang lewat teknik jatuhan khas silek tuo.',
                'content' => '<p>Perjuangan pantang menyerah ditunjukkan oleh Fadli Rahman Caniago di arena gelanggang silat Hall PNP Limau Manis. Mengawali latihan silat tradisional sejak usia 9 tahun di sasaran silek pinggiran Padang, Fadli membuktikan bahwa dedikasi tinggi mampu mengantarkannya ke podium tertinggi Porprov 2026.</p><p>"Medali emas ini saya persembahkan untuk kedua orang tua, pelatih sasaran, dan seluruh masyarakat Kota Padang yang tak henti berdoa," ungkap Fadli dengan mata berbinar di podium kehormatan.</p>',
                'thumbnail_url' => '/images/news/fadli_silat_action.jpg',
                'views_count' => 3240,
                'is_featured' => true,
                'status' => 'published',
                'published_at' => '2026-10-18 12:00:00',
            ],
            [
                'id' => 3,
                'category_id' => 5, // Rekor Baru
                'author_id' => 3,
                'title' => 'Sensasi Lintasan: Muhammad Ilham Pecahkan Rekor 100 Meter Putra Porprov',
                'slug' => 'sensasi-lintasan-muhammad-ilham-pecahkan-rekor-100-meter',
                'excerpt' => 'Sprinter asal Kabupaten Agam sukses menembus catatan waktu 10.21 detik, mematahkan rekor lama yang bertahan hampir 8 tahun.',
                'content' => '<p>Lintasan lari Stadion H. Agus Salim menjadi saksi lahirnya rekor baru lari 100 meter putra. Muhammad Ilham Pratama, pelari binaan PASI Agam, melesat bagai kilat dengan catatan waktu 10.21 detik di tengah sorak ribuan penonton tribun timur.</p><p>Hasil resmi yang diverifikasi pengawas pertandingan internasional PASI memastikan Ilham mengungguli rekor sebelumnya 10.45 detik yang bertahan sejak Porprov 2018.</p>',
                'thumbnail_url' => '/images/news/sprinter_record.jpg',
                'views_count' => 4180,
                'is_featured' => true,
                'status' => 'published',
                'published_at' => '2026-10-19 09:30:00',
            ],
            [
                'id' => 4,
                'category_id' => 4, // Klasemen & Medali
                'author_id' => 2, // Dodi Agusri
                'title' => 'Update Klasemen Hari Ke-3: Kota Padang Kokoh di Puncak, Bukittinggi Membuntuti',
                'slug' => 'update-klasemen-hari-ke-3-kota-padang-kokoh-di-puncak',
                'excerpt' => 'Tambahan 12 emas dari cabor renang dan silat mengokohkan dominasi kontingen Padang di tabel perolehan medali.',
                'content' => '<p>Hingga hari ketiga penyelenggaraan Porprov Sumbar 2026, kontingen Kota Padang masih memimpin klasemen dengan koleksi 48 emas, 36 perak, dan 29 perunggu. Sementara itu, Kota Bukittinggi membayangi di peringkat kedua dengan 32 emas disusul Kabupaten Agam dengan 26 emas.</p><p>Persaingan di papan tengah semakin ketat antara Padang Pariaman dan Payakumbuh yang saling kejar medali di cabor bela diri dan nomor terukur.</p>',
                'thumbnail_url' => '/images/news/medal_tally_day3.jpg',
                'views_count' => 6100,
                'is_featured' => false,
                'status' => 'published',
                'published_at' => '2026-10-19 18:00:00',
            ],
            [
                'id' => 5,
                'category_id' => 3, // Liputan Pertandingan
                'author_id' => 10,
                'title' => 'Duel Sengit Sepak Takraw: Padang Pariaman Tumbangkan Agam di Semifinal',
                'slug' => 'duel-sengit-sepak-takraw-padang-pariaman-tumbangkan-agam',
                'excerpt' => 'Lewat pertarungan tiga set yang menguras fisik, regu putra Padang Pariaman akhirnya mengamankan tiket menuju final bergengsi.',
                'content' => '<p>Laga semifinal cabang sepak takraw di GOR Moh. Yamin Payakumbuh menyuguhkan tontonan berkelas tinggi. Padang Pariaman yang dimotori tekong Rahmat Hidayatullah berhasil membalikkan keadaan setelah sempat tertinggal di set kedua.</p><p>Smes gulung akrobatik di set ketiga menjadi penentu kemenangan dramatis 21-15 bagi Padang Pariaman yang akan menghadapi tuan rumah Payakumbuh di partai puncak.</p>',
                'thumbnail_url' => '/images/news/takraw_semifinal.jpg',
                'views_count' => 2890,
                'is_featured' => false,
                'status' => 'published',
                'published_at' => '2026-10-18 16:30:00',
            ],
            [
                'id' => 6,
                'category_id' => 2, // Sorotan Atlet
                'author_id' => 3,
                'title' => 'Zaky Athallah, Ikan Terbang Payakumbuh Rajai Kolam Teratai',
                'slug' => 'zaky-athallah-ikan-terbang-payakumbuh-rajai-kolam-teratai',
                'excerpt' => 'Perenang muda Kota Payakumbuh sukses mengamankan emas di nomor 50 meter gaya bebas putra dengan catatan waktu 23.88 detik.',
                'content' => '<p>Kolam Renang Teratai Padang menjadi panggung kejayaan Zaky Athallah Akbar. Atlet asal Payakumbuh ini melesat meninggalkan lawan-lawannya sejak start pertama. Catatan waktu 23.88 detik memastikan medali emas untuk kontingen Kota Batiah.</p><p>Zaky kini menatap nomor 100m gaya dada dan estafet gaya ganti yang akan digelar esok hari dengan target sapu bersih tiga medali emas.</p>',
                'thumbnail_url' => '/images/news/renang_zaky.jpg',
                'views_count' => 1950,
                'is_featured' => false,
                'status' => 'published',
                'published_at' => '2026-10-19 16:00:00',
            ],
            [
                'id' => 7,
                'category_id' => 7, // Info Venue
                'author_id' => 2,
                'title' => 'Panduan Transportasi dan Akses Menuju Venue Porprov di Seluruh Sumbar',
                'slug' => 'panduan-transportasi-dan-akses-menuju-venue-porprov',
                'excerpt' => 'Informasi lengkap rute angkutan, shuttle bus atlet, dan kantong parkir bagi masyarakat yang ingin menyaksikan pertandingan.',
                'content' => '<p>Dinas Perhubungan dan Panitia Pelaksana Porprov Sumbar 2026 telah menyiapkan 45 armada shuttle bus gratis untuk menghubungkan wisma atlet dengan venue pertandingan di Padang, Bukittinggi, Payakumbuh, dan Solok.</p><p>Masyarakat dapat memantau rute dan lokasi parkir terdekat secara interaktif melalui portal web resmi porprov2026.sumbarprov.go.id.</p>',
                'thumbnail_url' => '/images/news/shuttle_venue.jpg',
                'views_count' => 3500,
                'is_featured' => false,
                'status' => 'published',
                'published_at' => '2026-10-17 14:00:00',
            ],
            [
                'id' => 8,
                'category_id' => 10, // Human Interest
                'author_id' => 10,
                'title' => 'Meriahnya Cheering Wall: Ribuan Dukungan Mengalir untuk Para Atlet Ranah Minang',
                'slug' => 'meriahnya-cheering-wall-ribuan-dukungan-mengalir',
                'excerpt' => 'Fitur Supporter Zone di portal Porprov kebanjiran ribuan pesan doa dan semangat dari perantau Minang di seluruh nusantara.',
                'content' => '<p>Antusiasme masyarakat terhadap Porprov Sumbar 2026 tidak hanya terasa di dalam arena pertandingan, tetapi juga di ruang digital. Fitur Supporter Zone dan Cheering Wall di portal web telah menerima lebih dari 10.000 ucapan penyemangat dari warga lokal hingga perantau Minang di Jabodetabek, Riau, dan luar negeri.</p><p>Pesan-pesan terpilih ditampilkan secara langsung pada videotron utama di Stadion H. Agus Salim Padang.</p>',
                'thumbnail_url' => '/images/news/supporter_digital.jpg',
                'views_count' => 2430,
                'is_featured' => false,
                'status' => 'published',
                'published_at' => '2026-10-20 08:00:00',
            ],
            [
                'id' => 9,
                'category_id' => 6, // Kabar Kontingen
                'author_id' => 3,
                'title' => 'Semangat Pantang Menyerah Kontingen Kepulauan Mentawai di Cabor Dayung & Surfing',
                'slug' => 'semangat-pantang-menyerah-kontingen-mentawai-dayung',
                'excerpt' => 'Meskipun menempuh perjalanan laut yang menantang, para atlet Bumi Sikerei siap membuktikan ketangguhannya di arena perairan.',
                'content' => '<p>Kontingen Kepulauan Mentawai tampil penuh percaya diri dalam ajang Porprov 2026. Dengan membawa tradisi maritim yang kuat, atlet-atlet dayung dan selancar Mentawai menjadi ancaman serius bagi kontingen daratan.</p><p>Ketua Kontingen menyatakan seluruh atlet dalam kondisi prima dan siap mencetak sejarah medali emas terbanyak bagi Kabupaten Kepulauan Mentawai.</p>',
                'thumbnail_url' => '/images/news/mentawai_dayung.jpg',
                'views_count' => 2780,
                'is_featured' => false,
                'status' => 'published',
                'published_at' => '2026-10-20 13:00:00',
            ],
            [
                'id' => 10,
                'category_id' => 9, // Pengumuman Resmi
                'author_id' => 2,
                'title' => 'Pengumuman Jadwal Partai Final Futsal dan Siaran Langsung di Kanal Resmi',
                'slug' => 'pengumuman-jadwal-partai-final-futsal-dan-live-streaming',
                'excerpt' => 'Partai puncak cabor futsal antara Kota Pariaman dan Kota Padang akan disiarkan langsung melalui portal web dan YouTube resmi Porprov.',
                'content' => '<p>Panitia Pelaksana Bidang Pertandingan mengumumkan bahwa partai final futsal putra akan dilangsungkan di Hall Futsal Rafhely Bypass Padang. Mengingat tingginya minat penonton, kapasitas tribun akan dibatasi dan disiapkan tiket gelang elektronik.</p><p>Masyarakat yang tidak dapat hadir ke arena diimbau menyaksikan melalui siaran langsung beresolusi tinggi di kanal YouTube resmi KONI Sumbar dan portal utama Porprov 2026.</p>',
                'thumbnail_url' => '/images/news/futsal_final_announcement.jpg',
                'views_count' => 4890,
                'is_featured' => false,
                'status' => 'published',
                'published_at' => '2026-10-21 10:00:00',
            ],
        ];

        foreach ($news as $item) {
            News::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
