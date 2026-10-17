<?php

namespace Database\Seeders;

use App\Models\SubSport;
use Illuminate\Database\Seeder;

class SubSportSeeder extends Seeder
{
    public function run(): void
    {
        $subSports = [
            [
                'id' => 1,
                'sport_id' => 1, // Pencak Silat
                'name' => 'Tanding Kelas A Putra (45 - 50 Kg)',
                'code' => 'SILAT-TND-A-PA',
                'gender_category' => 'Putra',
                'match_type' => 'tanding',
            ],
            [
                'id' => 2,
                'sport_id' => 1, // Pencak Silat
                'name' => 'Tunggal Seni Baku Putri',
                'code' => 'SILAT-SNI-TGL-PI',
                'gender_category' => 'Putri',
                'match_type' => 'seni',
            ],
            [
                'id' => 3,
                'sport_id' => 2, // Sepak Takraw
                'name' => 'Regu Putra (Inter Regu)',
                'code' => 'TAKRAW-REGU-PA',
                'gender_category' => 'Putra',
                'match_type' => 'tanding',
            ],
            [
                'id' => 4,
                'sport_id' => 3, // Atletik
                'name' => 'Lari 100 Meter Putra',
                'code' => 'ATLETIK-100M-PA',
                'gender_category' => 'Putra',
                'match_type' => 'nomor_terukur',
            ],
            [
                'id' => 5,
                'sport_id' => 3, // Atletik
                'name' => 'Lompat Jauh Putri',
                'code' => 'ATLETIK-LJ-PI',
                'gender_category' => 'Putri',
                'match_type' => 'nomor_terukur',
            ],
            [
                'id' => 6,
                'sport_id' => 4, // Renang
                'name' => '50 Meter Gaya Bebas Putra',
                'code' => 'RENANG-50GB-PA',
                'gender_category' => 'Putra',
                'match_type' => 'nomor_terukur',
            ],
            [
                'id' => 7,
                'sport_id' => 5, // Bulutangkis
                'name' => 'Tunggal Putra Utama',
                'code' => 'BADMINTON-TGL-PA',
                'gender_category' => 'Putra',
                'match_type' => 'tanding',
            ],
            [
                'id' => 8,
                'sport_id' => 6, // Karate
                'name' => 'Kumite -67 Kg Putra',
                'code' => 'KARATE-KUM-67-PA',
                'gender_category' => 'Putra',
                'match_type' => 'tanding',
            ],
            [
                'id' => 9,
                'sport_id' => 9, // Taekwondo
                'name' => 'Kyorugi Under 58 Kg Putra',
                'code' => 'TAEKWONDO-KYO-58-PA',
                'gender_category' => 'Putra',
                'match_type' => 'tanding',
            ],
            [
                'id' => 10,
                'sport_id' => 10, // Futsal
                'name' => 'Turnamen Beregu Putra',
                'code' => 'FUTSAL-REGU-PA',
                'gender_category' => 'Putra',
                'match_type' => 'tanding',
            ],
        ];

        foreach ($subSports as $item) {
            SubSport::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
