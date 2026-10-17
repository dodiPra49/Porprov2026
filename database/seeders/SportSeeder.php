<?php

namespace Database\Seeders;

use App\Models\Sport;
use Illuminate\Database\Seeder;

class SportSeeder extends Seeder
{
    public function run(): void
    {
        $sports = [
            [
                'id' => 1,
                'name' => 'Pencak Silat',
                'slug' => 'pencak-silat',
                'category' => 'Bela Diri',
                'icon_url' => '/icons/sports/silat.svg',
                'person_in_charge' => 'Master Suwirman, S.Pd (IPSI Sumbar)',
                'rules_summary' => 'Peraturan resmi PB IPSI / PERSILAT edisi revisi terbaru sistem poin digital.',
            ],
            [
                'id' => 2,
                'name' => 'Sepak Takraw',
                'slug' => 'sepak-takraw',
                'category' => 'Permainan',
                'icon_url' => '/icons/sports/takraw.svg',
                'person_in_charge' => 'Syamsul Bahri (PSTI Sumbar)',
                'rules_summary' => 'Regulasi ISTAF internasional dengan format regu, quadrant, dan ganda.',
            ],
            [
                'id' => 3,
                'name' => 'Atletik',
                'slug' => 'atletik',
                'category' => 'Terukur',
                'icon_url' => '/icons/sports/atletik.svg',
                'person_in_charge' => 'Prof. Dr. Syahrial Bakhtiar (PASI Sumbar)',
                'rules_summary' => 'Mengikuti standar World Athletics / PB PASI dengan sensor photo-finish digital.',
            ],
            [
                'id' => 4,
                'name' => 'Renang',
                'slug' => 'renang',
                'category' => 'Terukur',
                'icon_url' => '/icons/sports/renang.svg',
                'person_in_charge' => 'Dra. Elfina (PRSI Sumbar)',
                'rules_summary' => 'Sistem FINA / Akuatik Indonesia dengan touch-pad electronic timing 50 meter.',
            ],
            [
                'id' => 5,
                'name' => 'Bulutangkis',
                'slug' => 'bulutangkis',
                'category' => 'Permainan',
                'icon_url' => '/icons/sports/bulutangkis.svg',
                'person_in_charge' => 'Drs. H. Asnul, M.Si (PBSI Sumbar)',
                'rules_summary' => 'Regulasi BWF sistem skor rally point 3x21 poin.',
            ],
            [
                'id' => 6,
                'name' => 'Karate',
                'slug' => 'karate',
                'category' => 'Bela Diri',
                'icon_url' => '/icons/sports/karate.svg',
                'person_in_charge' => 'Sensei Firdaus (FORKI Sumbar)',
                'rules_summary' => 'Peraturan WKF (World Karate Federation) untuk nomor Kata dan Kumite.',
            ],
            [
                'id' => 7,
                'name' => 'Bola Voli',
                'slug' => 'bola-voli',
                'category' => 'Permainan',
                'icon_url' => '/icons/sports/voli.svg',
                'person_in_charge' => 'Kombes Pol (Purn) Syafril (PBVSI Sumbar)',
                'rules_summary' => 'Regulasi FIVB / PBVSI best of 5 sets rally point.',
            ],
            [
                'id' => 8,
                'name' => 'Tenis Meja',
                'slug' => 'tenis-meja',
                'category' => 'Permainan',
                'icon_url' => '/icons/sports/tenis-meja.svg',
                'person_in_charge' => 'H. Dasril, M.Pd (PTMSI Sumbar)',
                'rules_summary' => 'Regulasi ITTF sistem skor 11 poin per gim.',
            ],
            [
                'id' => 9,
                'name' => 'Taekwondo',
                'slug' => 'taekwondo',
                'category' => 'Bela Diri',
                'icon_url' => '/icons/sports/taekwondo.svg',
                'person_in_charge' => 'Master Budi Setiawan (TI Sumbar)',
                'rules_summary' => 'Peraturan WT (World Taekwondo) dengan Protector and Scoring System (PSS).',
            ],
            [
                'id' => 10,
                'name' => 'Futsal',
                'slug' => 'futsal',
                'category' => 'Permainan',
                'icon_url' => '/icons/sports/futsal.svg',
                'person_in_charge' => 'H. Yasman Yanusar (AFP Sumbar)',
                'rules_summary' => 'Peraturan FIFA Futsal Laws of the Game 2x20 menit waktu bersih.',
            ],
        ];

        foreach ($sports as $item) {
            Sport::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
