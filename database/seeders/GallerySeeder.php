<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $galleries = [
            [
                'id' => 1,
                'title' => 'Kemeriahan Defile Pembukaan Porprov Sumbar 2026',
                'type' => 'photo',
                'media_url' => '/images/gallery/opening_ceremony.jpg',
                'thumbnail_url' => '/images/gallery/thumbs/opening_ceremony.jpg',
                'caption' => 'Arak-arakan kontingen 19 Kabupaten/Kota di Stadion Utama Gelora H. Agus Salim Padang.',
                'sport_id' => null,
                'published_at' => '2026-10-17 21:00:00',
            ],
            [
                'id' => 2,
                'title' => 'Momen Emas Silat Tanding Putra Kelas A',
                'type' => 'photo',
                'media_url' => '/images/gallery/silat_gold_match.jpg',
                'thumbnail_url' => '/images/gallery/thumbs/silat_gold_match.jpg',
                'caption' => 'Fadli Rahman merayakan kemenangan medali emas bersama pelatih kontingen Kota Padang.',
                'sport_id' => 1,
                'published_at' => '2026-10-18 10:45:00',
            ],
            [
                'id' => 3,
                'title' => 'Seni Tunggal Silat Putri: Keindahan dan Ketegasan Gerak',
                'type' => 'photo',
                'media_url' => '/images/gallery/silat_seni_tunggal.jpg',
                'thumbnail_url' => '/images/gallery/thumbs/silat_seni_tunggal.jpg',
                'caption' => 'Penampilan anggun nan bertenaga pesilat putri Kota Bukittinggi.',
                'sport_id' => 1,
                'published_at' => '2026-10-18 12:15:00',
            ],
            [
                'id' => 4,
                'title' => 'Aksi Akrobatik Smes Gulung Sepak Takraw',
                'type' => 'photo',
                'media_url' => '/images/gallery/takraw_smash.jpg',
                'thumbnail_url' => '/images/gallery/thumbs/takraw_smash.jpg',
                'caption' => 'Lompatan spektakuler pemain Padang Pariaman menembus blok lawan di GOR Moh. Yamin.',
                'sport_id' => 2,
                'published_at' => '2026-10-18 16:00:00',
            ],
            [
                'id' => 5,
                'title' => 'Detik-Detik Pecah Rekor Lari 100 Meter Putra',
                'type' => 'photo',
                'media_url' => '/images/gallery/sprint_finish.jpg',
                'thumbnail_url' => '/images/gallery/thumbs/sprint_finish.jpg',
                'caption' => 'Ilham Pratama menyentuh garis finis dengan rekor baru 10.21 detik.',
                'sport_id' => 3,
                'published_at' => '2026-10-19 09:00:00',
            ],
            [
                'id' => 6,
                'title' => 'Melesat di Air: Partai Final 50m Gaya Bebas',
                'type' => 'photo',
                'media_url' => '/images/gallery/swim_freestyle.jpg',
                'thumbnail_url' => '/images/gallery/thumbs/swim_freestyle.jpg',
                'caption' => 'Gelombang persaingan perenang terbaik Ranah Minang di Kolam Renang Teratai Padang.',
                'sport_id' => 4,
                'published_at' => '2026-10-19 15:30:00',
            ],
            [
                'id' => 7,
                'title' => 'Live Streaming: Final Bulutangkis Tunggal Putra',
                'type' => 'live_stream',
                'media_url' => 'https://www.youtube.com/watch?v=live_porprov_badminton',
                'thumbnail_url' => '/images/gallery/thumbs/live_badminton.jpg',
                'caption' => 'Siaran langsung partai perebutan medali emas bulutangkis langsung dari Hall Semen Padang.',
                'sport_id' => 5,
                'published_at' => '2026-10-20 10:00:00',
            ],
            [
                'id' => 8,
                'title' => 'Tendangan Telak Mawashi Geri Karate Kumite',
                'type' => 'photo',
                'media_url' => '/images/gallery/karate_kumite.jpg',
                'thumbnail_url' => '/images/gallery/thumbs/karate_kumite.jpg',
                'caption' => 'Momen penentu kemenangan emas karateka Kota Solok di GOR Ateh Ngarai Bukittinggi.',
                'sport_id' => 6,
                'published_at' => '2026-10-20 15:00:00',
            ],
            [
                'id' => 9,
                'title' => 'Video Sorotan: Gol-Gol Spektakuler Turnamen Futsal',
                'type' => 'video',
                'media_url' => 'https://www.youtube.com/watch?v=highlight_futsal_porprov',
                'thumbnail_url' => '/images/gallery/thumbs/highlight_futsal.jpg',
                'caption' => 'Kompilasi gol terbaik dan penyelamatan heroik penjaga gawang selama babak penyisihan.',
                'sport_id' => 10,
                'published_at' => '2026-10-21 12:00:00',
            ],
            [
                'id' => 10,
                'title' => 'Selebrasi Juara Kontingen dan Penyerahan Medali',
                'type' => 'photo',
                'media_url' => '/images/gallery/celebration_medals.jpg',
                'thumbnail_url' => '/images/gallery/thumbs/celebration_medals.jpg',
                'caption' => 'Kegembiraan para peraih medali di podium kehormatan bersama bupati dan walikota.',
                'sport_id' => null,
                'published_at' => '2026-10-21 18:30:00',
            ],
        ];

        foreach ($galleries as $item) {
            Gallery::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
