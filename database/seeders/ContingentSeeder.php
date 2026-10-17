<?php

namespace Database\Seeders;

use App\Models\Contingent;
use Illuminate\Database\Seeder;

class ContingentSeeder extends Seeder
{
    public function run(): void
    {
        $contingents = [
            [
                'id' => 1,
                'name' => 'Kota Padang',
                'code' => 'PDG',
                'leader_name' => 'Dr. H. Yusman Kasim, M.M',
                'contact_phone' => '081275000001',
                'logo_url' => '/images/contingents/padang.png',
                'color_hex' => '#DC2626',
                'official_count' => 85,
                'athlete_count' => 450,
                'target_gold' => 110,
                'description' => 'Kontingen ibukota provinsi dengan kekuatan atlet penuh di seluruh cabor unggulan.',
            ],
            [
                'id' => 2,
                'name' => 'Kota Bukittinggi',
                'code' => 'BKT',
                'leader_name' => 'H. Erman Safar, S.H',
                'contact_phone' => '081275000002',
                'logo_url' => '/images/contingents/bukittinggi.png',
                'color_hex' => '#2563EB',
                'official_count' => 60,
                'athlete_count' => 280,
                'target_gold' => 65,
                'description' => 'Kontingen Kota Jam Gadang dengan tradisi kuat pada cabor bela diri dan atletik.',
            ],
            [
                'id' => 3,
                'name' => 'Kabupaten Agam',
                'code' => 'AGM',
                'leader_name' => 'Dr. H. Andri Warman, M.M',
                'contact_phone' => '081275000003',
                'logo_url' => '/images/contingents/agam.png',
                'color_hex' => '#16A34A',
                'official_count' => 55,
                'athlete_count' => 260,
                'target_gold' => 50,
                'description' => 'Kontingen Luhak Agam bertekad mempertahankan posisi 3 besar perolehan medali.',
            ],
            [
                'id' => 4,
                'name' => 'Kota Payakumbuh',
                'code' => 'PYK',
                'leader_name' => 'Drs. H. Jasman, M.M',
                'contact_phone' => '081275000004',
                'logo_url' => '/images/contingents/payakumbuh.png',
                'color_hex' => '#D97706',
                'official_count' => 50,
                'athlete_count' => 240,
                'target_gold' => 45,
                'description' => 'Kota Batiah mengirimkan atlet-atlet terbaik di cabor renang, voli, dan pencak silat.',
            ],
            [
                'id' => 5,
                'name' => 'Kabupaten Tanah Datar',
                'code' => 'TND',
                'leader_name' => 'Eka Putra, S.E., M.M',
                'contact_phone' => '081275000005',
                'logo_url' => '/images/contingents/tanah_datar.png',
                'color_hex' => '#7C3AED',
                'official_count' => 52,
                'athlete_count' => 230,
                'target_gold' => 40,
                'description' => 'Luhak Nan Tuo mengandalkan nomor-nomor bela diri tradisi silat dan sepak takraw.',
            ],
            [
                'id' => 6,
                'name' => 'Kota Solok',
                'code' => 'SLK',
                'leader_name' => 'H. Zul Elfian Umar, S.H., M.Si',
                'contact_phone' => '081275000006',
                'logo_url' => '/images/contingents/solok_kota.png',
                'color_hex' => '#0891B2',
                'official_count' => 42,
                'athlete_count' => 200,
                'target_gold' => 35,
                'description' => 'Kota Beras Serambi Madinah siap membuat kejutan di nomor catur, karate, dan atletik.',
            ],
            [
                'id' => 7,
                'name' => 'Kabupaten Padang Pariaman',
                'code' => 'PDP',
                'leader_name' => 'Suhatri Bur, S.E., M.M',
                'contact_phone' => '081275000007',
                'logo_url' => '/images/contingents/padang_pariaman.png',
                'color_hex' => '#EA580C',
                'official_count' => 58,
                'athlete_count' => 270,
                'target_gold' => 55,
                'description' => 'Tuan rumah edisi sebelumnya yang terkenal tangguh pada cabang dayung, sepak takraw, dan gulat.',
            ],
            [
                'id' => 8,
                'name' => 'Kota Pariaman',
                'code' => 'PRM',
                'leader_name' => 'Dr. Roberia, S.H., M.H',
                'contact_phone' => '081275000008',
                'logo_url' => '/images/contingents/pariaman_kota.png',
                'color_hex' => '#0284C7',
                'official_count' => 38,
                'athlete_count' => 190,
                'target_gold' => 30,
                'description' => 'Kota Tabuik mengincar medali emas di cabang olahraga pantai, voli pasir, dan silat.',
            ],
            [
                'id' => 9,
                'name' => 'Kabupaten Pesisir Selatan',
                'code' => 'PSS',
                'leader_name' => 'Drs. Rusma Yul Anwar, M.Pd',
                'contact_phone' => '081275000009',
                'logo_url' => '/images/contingents/pesisir_selatan.png',
                'color_hex' => '#059669',
                'official_count' => 48,
                'athlete_count' => 220,
                'target_gold' => 35,
                'description' => 'Negeri Sejuta Pesona mengandalkan cabor atletik, renang perairan terbuka, dan taekwondo.',
            ],
            [
                'id' => 10,
                'name' => 'Kabupaten Lima Puluh Kota',
                'code' => 'LPK',
                'leader_name' => 'Safaruddin Dt. Bandaro Rajo',
                'contact_phone' => '081275000010',
                'logo_url' => '/images/contingents/limapuluh_kota.png',
                'color_hex' => '#4F46E5',
                'official_count' => 50,
                'athlete_count' => 225,
                'target_gold' => 38,
                'description' => 'Luhak Limopuluah membawa kekuatan penuh cabang bulutangkis, balap sepeda, dan karate.',
            ],
        ];

        foreach ($contingents as $item) {
            Contingent::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
