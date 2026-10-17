<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    public function run(): void
    {
        $schedules = [
            [
                'id' => 1,
                'sub_sport_id' => 1, // Silat Tanding A PA
                'venue_id' => 2, // Hall PNP
                'match_code' => 'SCH-SILAT-001',
                'round_name' => 'Babak Final Perebutan Emas',
                'scheduled_at' => '2026-10-18 09:00:00',
                'finished_at' => '2026-10-18 10:15:00',
                'status' => 'completed',
                'notes' => 'Pertemuan sengit Fadli Rahman (Padang) vs Atlet Bukittinggi',
            ],
            [
                'id' => 2,
                'sub_sport_id' => 2, // Silat Seni Tunggal PI
                'venue_id' => 2, // Hall PNP
                'match_code' => 'SCH-SILAT-002',
                'round_name' => 'Babak Final Seni Tunggal',
                'scheduled_at' => '2026-10-18 10:30:00',
                'finished_at' => '2026-10-18 11:45:00',
                'status' => 'completed',
                'notes' => 'Penilaian dewan wasit internasional IPSI dengan sistem digital sensor',
            ],
            [
                'id' => 3,
                'sub_sport_id' => 3, // Sepak Takraw Regu PA
                'venue_id' => 7, // GOR Moh Yamin
                'match_code' => 'SCH-TAKRAW-001',
                'round_name' => 'Babak Semifinal Regu Putra',
                'scheduled_at' => '2026-10-18 14:00:00',
                'finished_at' => '2026-10-18 15:30:00',
                'status' => 'completed',
                'notes' => 'Padang Pariaman vs Agam',
            ],
            [
                'id' => 4,
                'sub_sport_id' => 4, // Atletik 100m PA
                'venue_id' => 1, // Stadion Agus Salim
                'match_code' => 'SCH-ATL-001',
                'round_name' => 'Final Lari 100 Meter Putra',
                'scheduled_at' => '2026-10-19 08:30:00',
                'finished_at' => '2026-10-19 08:45:00',
                'status' => 'completed',
                'notes' => 'Penentuan manusia tercepat di Porprov Sumbar 2026',
            ],
            [
                'id' => 5,
                'sub_sport_id' => 5, // Atletik Lompat Jauh PI
                'venue_id' => 1, // Stadion Agus Salim
                'match_code' => 'SCH-ATL-002',
                'round_name' => 'Final Lompat Jauh Putri',
                'scheduled_at' => '2026-10-19 09:30:00',
                'finished_at' => '2026-10-19 11:00:00',
                'status' => 'completed',
                'notes' => 'Diikuti oleh 10 atlet terbaik perwakilan kabupaten/kota',
            ],
            [
                'id' => 6,
                'sub_sport_id' => 6, // Renang 50m Gaya Bebas PA
                'venue_id' => 3, // Kolam Teratai
                'match_code' => 'SCH-SWIM-001',
                'round_name' => 'Final 50m Gaya Bebas Putra',
                'scheduled_at' => '2026-10-19 15:00:00',
                'finished_at' => '2026-10-19 15:20:00',
                'status' => 'completed',
                'notes' => 'Persaingan ketat atlet Payakumbuh dan Padang',
            ],
            [
                'id' => 7,
                'sub_sport_id' => 7, // Bulutangkis Tunggal PA
                'venue_id' => 4, // Hall Semen Padang
                'match_code' => 'SCH-BADM-001',
                'round_name' => 'Babak Perempat Final',
                'scheduled_at' => '2026-10-20 10:00:00',
                'finished_at' => '2026-10-20 11:15:00',
                'status' => 'ongoing',
                'notes' => 'Disiarkan via Live Streaming Official Porprov',
            ],
            [
                'id' => 8,
                'sub_sport_id' => 8, // Karate Kumite -67kg PA
                'venue_id' => 5, // GOR Ateh Ngarai
                'match_code' => 'SCH-KRT-001',
                'round_name' => 'Final Kumite Putra',
                'scheduled_at' => '2026-10-20 14:00:00',
                'finished_at' => null,
                'status' => 'upcoming',
                'notes' => 'Partai puncak perebutan medali emas',
            ],
            [
                'id' => 9,
                'sub_sport_id' => 9, // Taekwondo U-58 PA
                'venue_id' => 6, // GOR Rang Agam
                'match_code' => 'SCH-TKD-001',
                'round_name' => 'Semifinal Taekwondo',
                'scheduled_at' => '2026-10-21 09:00:00',
                'finished_at' => null,
                'status' => 'upcoming',
                'notes' => 'Menggunakan sistem sensor elektronik PSS',
            ],
            [
                'id' => 10,
                'sub_sport_id' => 10, // Futsal Regu PA
                'venue_id' => 10, // Rafhely Futsal
                'match_code' => 'SCH-FUT-001',
                'round_name' => 'Grand Final Futsal Porprov',
                'scheduled_at' => '2026-10-21 16:00:00',
                'finished_at' => null,
                'status' => 'upcoming',
                'notes' => 'Tiket tribun VIP terbuka untuk kontingen dan masyarakat',
            ],
        ];

        foreach ($schedules as $item) {
            Schedule::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
