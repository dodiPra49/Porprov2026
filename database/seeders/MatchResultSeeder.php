<?php

namespace Database\Seeders;

use App\Models\MatchResult;
use Illuminate\Database\Seeder;

class MatchResultSeeder extends Seeder
{
    public function run(): void
    {
        $results = [
            [
                'id' => 1,
                'schedule_id' => 1, // Final Silat Tanding A PA
                'winner_athlete_id' => 1, // Fadli Rahman Caniago
                'winner_contingent_id' => 1, // Padang
                'score_summary' => '42 - 31',
                'score_detail' => [
                    'round_1' => ['red' => 12, 'blue' => 8],
                    'round_2' => ['red' => 16, 'blue' => 11],
                    'round_3' => ['red' => 14, 'blue' => 12],
                    'winner_corner' => 'Sudut Merah (Kota Padang)',
                ],
                'verified_by' => 4, // Ir. Hendri Chaniago
                'verified_at' => '2026-10-18 10:20:00',
                'remarks' => 'Pertandingan tuntas dengan keputusan mutlak 5 juri IPSI.',
            ],
            [
                'id' => 2,
                'schedule_id' => 2, // Silat Seni Tunggal PI
                'winner_athlete_id' => 2, // Annisa Rahmadani Putri
                'winner_contingent_id' => 2, // Bukittinggi
                'score_summary' => '9.925 Poin',
                'score_detail' => [
                    'kebenaran_gerak' => 9.920,
                    'kemantapan_stamina' => 9.930,
                    'total_waktu' => '03:00 menit tepat',
                ],
                'verified_by' => 4,
                'verified_at' => '2026-10-18 11:50:00',
                'remarks' => 'Poin tertinggi nomor seni tunggal putri.',
            ],
            [
                'id' => 3,
                'schedule_id' => 3, // Takraw Semifinal
                'winner_athlete_id' => 3, // Rahmat Hidayatullah
                'winner_contingent_id' => 7, // Padang Pariaman
                'score_summary' => '2 - 1 (Set: 21-18, 19-21, 21-15)',
                'score_detail' => [
                    'set_1' => ['home' => 21, 'away' => 18],
                    'set_2' => ['home' => 19, 'away' => 21],
                    'set_3' => ['home' => 21, 'away' => 15],
                ],
                'verified_by' => 7,
                'verified_at' => '2026-10-18 15:40:00',
                'remarks' => 'Padang Pariaman melangkah ke babak final.',
            ],
            [
                'id' => 4,
                'schedule_id' => 4, // Atletik 100m PA
                'winner_athlete_id' => 4, // Muhammad Ilham Pratama
                'winner_contingent_id' => 3, // Agam
                'score_summary' => '10.21 Detik (Rekor Baru Porprov)',
                'score_detail' => [
                    'reaction_time' => 0.134,
                    'wind_speed' => '+1.2 m/s',
                    'official_timing' => '10.211 s',
                ],
                'verified_by' => 5,
                'verified_at' => '2026-10-19 08:50:00',
                'remarks' => 'Memecahkan rekor Porprov Sumbar tahun 2018.',
            ],
            [
                'id' => 5,
                'schedule_id' => 5, // Atletik Lompat Jauh PI
                'winner_athlete_id' => 5, // Suci Ramadhani Syahrir
                'winner_contingent_id' => 5, // Tanah Datar
                'score_summary' => '5.92 Meter',
                'score_detail' => [
                    'jump_1' => 5.65,
                    'jump_2' => 5.78,
                    'jump_3' => 5.92,
                    'jump_4' => 5.85,
                ],
                'verified_by' => 5,
                'verified_at' => '2026-10-19 11:10:00',
                'remarks' => 'Medali emas pertama kontingen Tanah Datar di cabor atletik.',
            ],
            [
                'id' => 6,
                'schedule_id' => 6, // Renang 50m Gaya Bebas PA
                'winner_athlete_id' => 6, // Zaky Athallah Akbar
                'winner_contingent_id' => 4, // Payakumbuh
                'score_summary' => '23.88 Detik',
                'score_detail' => [
                    'split_25m' => 11.20,
                    'finish_time' => 23.88,
                    'touchpad_id' => 'Lane-4',
                ],
                'verified_by' => 6,
                'verified_at' => '2026-10-19 15:25:00',
                'remarks' => 'Emas diraih perenang Kota Payakumbuh.',
            ],
            [
                'id' => 7,
                'schedule_id' => 7, // Bulutangkis
                'winner_athlete_id' => 7, // Alvino Bagas Kurniawan
                'winner_contingent_id' => 10, // Lima Puluh Kota
                'score_summary' => '2 - 0 (21-15, 21-17)',
                'score_detail' => [
                    'game_1' => [21, 15],
                    'game_2' => [21, 17],
                    'duration_minutes' => 42,
                ],
                'verified_by' => 8,
                'verified_at' => '2026-10-20 11:20:00',
                'remarks' => 'Kemenangan straight game lolos ke semifinal.',
            ],
            [
                'id' => 8,
                'schedule_id' => 8, // Karate Kumite
                'winner_athlete_id' => 8, // Rizki Aditya Piliang
                'winner_contingent_id' => 6, // Solok
                'score_summary' => '7 - 2 (Senshu)',
                'score_detail' => [
                    'ippon' => 1,
                    'waza-ari' => 1,
                    'yuko' => 2,
                ],
                'verified_by' => 9,
                'verified_at' => '2026-10-20 14:45:00',
                'remarks' => 'Emas untuk Kota Solok pada nomor Kumite 67kg.',
            ],
            [
                'id' => 9,
                'schedule_id' => 9, // Taekwondo U-58 PA
                'winner_athlete_id' => 9, // Dimas Maulana Putra
                'winner_contingent_id' => 9, // Pesisir Selatan
                'score_summary' => '2 - 0 Round Point',
                'score_detail' => [
                    'round_1' => [12, 6],
                    'round_2' => [14, 8],
                ],
                'verified_by' => 4,
                'verified_at' => '2026-10-21 09:40:00',
                'remarks' => 'Pesisir Selatan mengamankan tiket final Taekwondo.',
            ],
            [
                'id' => 10,
                'schedule_id' => 10, // Futsal
                'winner_athlete_id' => 10, // Rangga Wijaya Kusuma
                'winner_contingent_id' => 8, // Kota Pariaman
                'score_summary' => '4 - 3 (A.E.T)',
                'score_detail' => [
                    'normal_time' => '3 - 3',
                    'extra_time' => '1 - 0',
                    'goal_scorers' => ['Rangga (2)', 'Aldi (1)', 'Ilham (1)'],
                ],
                'verified_by' => 4,
                'verified_at' => '2026-10-21 17:50:00',
                'remarks' => 'Kota Pariaman keluar sebagai juara cabor futsal.',
            ],
        ];

        foreach ($results as $item) {
            MatchResult::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
