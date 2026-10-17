<?php

namespace Database\Seeders;

use App\Models\MedalTally;
use Illuminate\Database\Seeder;

class MedalTallySeeder extends Seeder
{
    public function run(): void
    {
        $tallies = [
            [
                'id' => 1,
                'contingent_id' => 1, // Kota Padang
                'gold' => 48,
                'silver' => 36,
                'bronze' => 29,
                'total_medals' => 113,
                'rank_position' => 1,
                'last_updated_at' => now(),
            ],
            [
                'id' => 2,
                'contingent_id' => 2, // Kota Bukittinggi
                'gold' => 32,
                'silver' => 28,
                'bronze' => 25,
                'total_medals' => 85,
                'rank_position' => 2,
                'last_updated_at' => now(),
            ],
            [
                'id' => 3,
                'contingent_id' => 3, // Kab. Agam
                'gold' => 26,
                'silver' => 22,
                'bronze' => 30,
                'total_medals' => 78,
                'rank_position' => 3,
                'last_updated_at' => now(),
            ],
            [
                'id' => 4,
                'contingent_id' => 7, // Kab. Padang Pariaman
                'gold' => 24,
                'silver' => 26,
                'bronze' => 22,
                'total_medals' => 72,
                'rank_position' => 4,
                'last_updated_at' => now(),
            ],
            [
                'id' => 5,
                'contingent_id' => 4, // Kota Payakumbuh
                'gold' => 20,
                'silver' => 18,
                'bronze' => 24,
                'total_medals' => 62,
                'rank_position' => 5,
                'last_updated_at' => now(),
            ],
            [
                'id' => 6,
                'contingent_id' => 5, // Kab. Tanah Datar
                'gold' => 18,
                'silver' => 19,
                'bronze' => 21,
                'total_medals' => 58,
                'rank_position' => 6,
                'last_updated_at' => now(),
            ],
            [
                'id' => 7,
                'contingent_id' => 10, // Kab. Lima Puluh Kota
                'gold' => 16,
                'silver' => 17,
                'bronze' => 19,
                'total_medals' => 52,
                'rank_position' => 7,
                'last_updated_at' => now(),
            ],
            [
                'id' => 8,
                'contingent_id' => 6, // Kota Solok
                'gold' => 14,
                'silver' => 15,
                'bronze' => 18,
                'total_medals' => 47,
                'rank_position' => 8,
                'last_updated_at' => now(),
            ],
            [
                'id' => 9,
                'contingent_id' => 8, // Kota Pariaman
                'gold' => 13,
                'silver' => 14,
                'bronze' => 16,
                'total_medals' => 43,
                'rank_position' => 9,
                'last_updated_at' => now(),
            ],
            [
                'id' => 10,
                'contingent_id' => 9, // Kab. Pesisir Selatan
                'gold' => 11,
                'silver' => 16,
                'bronze' => 20,
                'total_medals' => 47,
                'rank_position' => 10,
                'last_updated_at' => now(),
            ],
        ];

        foreach ($tallies as $item) {
            MedalTally::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
