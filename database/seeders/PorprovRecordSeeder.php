<?php

namespace Database\Seeders;

use App\Models\PorprovRecord;
use Illuminate\Database\Seeder;

class PorprovRecordSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'id' => 1,
                'sub_sport_id' => 4, // Atletik 100m PA
                'athlete_id' => 4, // Muhammad Ilham Pratama
                'contingent_id' => 3, // Agam
                'record_metric' => 'Lari 100 Meter Putra (Detik)',
                'previous_record' => '10.45 detik (Porprov Padang Pariaman 2018)',
                'new_record' => '10.21 detik',
                'achieved_at' => '2026-10-19',
                'venue_name' => 'Stadion Gelora H. Agus Salim Padang',
                'notes' => 'Diakui resmi oleh Technical Delegate PASI Sumbar.',
            ],
            [
                'id' => 2,
                'sub_sport_id' => 5, // Lompat Jauh PI
                'athlete_id' => 5, // Suci Ramadhani Syahrir
                'contingent_id' => 5, // Tanah Datar
                'record_metric' => 'Lompat Jauh Putri (Meter)',
                'previous_record' => '5.74 meter (Porprov 2016)',
                'new_record' => '5.92 meter',
                'achieved_at' => '2026-10-19',
                'venue_name' => 'Stadion Gelora H. Agus Salim Padang',
                'notes' => 'Lompatan terbaik pada kesempatan ketiga.',
            ],
            [
                'id' => 3,
                'sub_sport_id' => 6, // Renang 50m Gaya Bebas PA
                'athlete_id' => 6, // Zaky Athallah Akbar
                'contingent_id' => 4, // Payakumbuh
                'record_metric' => '50 Meter Gaya Bebas Putra (Detik)',
                'previous_record' => '24.30 detik (Porprov 2018)',
                'new_record' => '23.88 detik',
                'achieved_at' => '2026-10-19',
                'venue_name' => 'Kolam Renang Teratai Padang',
                'notes' => 'Waktu dicatat dengan Omega Timing Touchpad System.',
            ],
            [
                'id' => 4,
                'sub_sport_id' => 2, // Silat Seni Tunggal PI
                'athlete_id' => 2, // Annisa Rahmadani Putri
                'contingent_id' => 2, // Bukittinggi
                'record_metric' => 'Skor Seni Tunggal Putri (Poin)',
                'previous_record' => '9.850 Poin',
                'new_record' => '9.925 Poin',
                'achieved_at' => '2026-10-18',
                'venue_name' => 'Hall Serbaguna Politeknik Negeri Padang',
                'notes' => 'Nilai tertinggi sepanjang sejarah keikutsertaan seni tunggal putri.',
            ],
            [
                'id' => 5,
                'sub_sport_id' => 1, // Silat Tanding A PA
                'athlete_id' => 1, // Fadli Rahman Caniago
                'contingent_id' => 1, // Padang
                'record_metric' => 'Total Poin Babak Final Kelas A',
                'previous_record' => '36 Poin',
                'new_record' => '42 Poin',
                'achieved_at' => '2026-10-18',
                'venue_name' => 'Hall Serbaguna Politeknik Negeri Padang',
                'notes' => 'Jatuhan bersih 4 kali berturut-turut pada ronde kedua.',
            ],
            [
                'id' => 6,
                'sub_sport_id' => 8, // Karate Kumite
                'athlete_id' => 8, // Rizki Aditya Piliang
                'contingent_id' => 6, // Solok
                'record_metric' => 'Kemenangan Tercepat Babak Penyisihan (Detik)',
                'previous_record' => '45 Detik',
                'new_record' => '28 Detik (Ippon)',
                'achieved_at' => '2026-10-20',
                'venue_name' => 'GOR Ateh Ngarai Bukittinggi',
                'notes' => 'Tendangan mawashi geri sempurna mengunci kemenangan.',
            ],
            [
                'id' => 7,
                'sub_sport_id' => 7, // Bulutangkis Tunggal PA
                'athlete_id' => 7, // Alvino Bagas Kurniawan
                'contingent_id' => 10, // Lima Puluh Kota
                'record_metric' => 'Kecepatan Smash Bulutangkis (Km/Jam)',
                'previous_record' => '365 Km/Jam',
                'new_record' => '392 Km/Jam',
                'achieved_at' => '2026-10-20',
                'venue_name' => 'Hall Bulutangkis PT Semen Padang',
                'notes' => 'Terekam oleh radar kecepatan resmi kejuaraan.',
            ],
            [
                'id' => 8,
                'sub_sport_id' => 3, // Takraw Regu PA
                'athlete_id' => 3, // Rahmat Hidayatullah
                'contingent_id' => 7, // Padang Pariaman
                'record_metric' => 'Ace Servis Berturut-turut (Poin)',
                'previous_record' => '5 Poin Beruntun',
                'new_record' => '8 Poin Servis Ace Beruntun',
                'achieved_at' => '2026-10-18',
                'venue_name' => 'GOR Moh. Yamin Payakumbuh',
                'notes' => 'Akurasi servis kuda menusuk sudut belakang lapangan lawan.',
            ],
            [
                'id' => 9,
                'sub_sport_id' => 9, // Taekwondo U-58 PA
                'athlete_id' => 9, // Dimas Maulana Putra
                'contingent_id' => 9, // Pesisir Selatan
                'record_metric' => 'Poin Tendangan Kepala Terbanyak (Poin)',
                'previous_record' => '12 Poin',
                'new_record' => '18 Poin',
                'achieved_at' => '2026-10-21',
                'venue_name' => 'GOR Rang Agam Lubuk Basung',
                'notes' => 'Dua kali tendangan putar (dwi chagi) mengenai pelindung kepala.',
            ],
            [
                'id' => 10,
                'sub_sport_id' => 10, // Futsal
                'athlete_id' => 10, // Rangga Wijaya Kusuma
                'contingent_id' => 8, // Pariaman
                'record_metric' => 'Gol Terbanyak dalam Satu Turnamen Porprov',
                'previous_record' => '11 Gol',
                'new_record' => '14 Gol',
                'achieved_at' => '2026-10-21',
                'venue_name' => 'Hall Futsal Rafhely Bypass Padang',
                'notes' => 'Menjadi top skorer turnamen futsal Porprov Sumbar 2026.',
            ],
        ];

        foreach ($records as $item) {
            PorprovRecord::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
