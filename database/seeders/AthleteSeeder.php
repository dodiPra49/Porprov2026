<?php

namespace Database\Seeders;

use App\Models\Athlete;
use Illuminate\Database\Seeder;

class AthleteSeeder extends Seeder
{
    public function run(): void
    {
        $athletes = [
            [
                'id' => 1,
                'contingent_id' => 1, // Kota Padang
                'sport_id' => 1, // Pencak Silat
                'nik' => '1371011505020001',
                'full_name' => 'Fadli Rahman Caniago',
                'gender' => 'L',
                'birth_place' => 'Padang',
                'birth_date' => '2002-05-15',
                'photo_url' => '/images/athletes/fadli_silat.jpg',
                'height_cm' => 170,
                'weight_kg' => 49,
                'achievements' => 'Emas Kejurnas Silat Mahasiswa 2024, Emas Porprov Sumbar 2022',
                'is_verified' => true,
            ],
            [
                'id' => 2,
                'contingent_id' => 2, // Bukittinggi
                'sport_id' => 1, // Pencak Silat
                'nik' => '1375022010030002',
                'full_name' => 'Annisa Rahmadani Putri',
                'gender' => 'P',
                'birth_place' => 'Bukittinggi',
                'birth_date' => '2003-10-20',
                'photo_url' => '/images/athletes/annisa_silat.jpg',
                'height_cm' => 162,
                'weight_kg' => 52,
                'achievements' => 'Juara 1 Seni Tunggal Putri Kejurda Silat Sumbar 2025',
                'is_verified' => true,
            ],
            [
                'id' => 3,
                'contingent_id' => 7, // Padang Pariaman
                'sport_id' => 2, // Sepak Takraw
                'nik' => '1305031204010003',
                'full_name' => 'Rahmat Hidayatullah',
                'gender' => 'L',
                'birth_place' => 'Lubuk Alung',
                'birth_date' => '2001-04-12',
                'photo_url' => '/images/athletes/rahmat_takraw.jpg',
                'height_cm' => 176,
                'weight_kg' => 65,
                'achievements' => 'Tekong Terbaik Kejurnas Sepak Takraw Antar-PPLP 2023',
                'is_verified' => true,
            ],
            [
                'id' => 4,
                'contingent_id' => 3, // Agam
                'sport_id' => 3, // Atletik
                'nik' => '1306010908000004',
                'full_name' => 'Muhammad Ilham Pratama',
                'gender' => 'L',
                'birth_place' => 'Maninjau',
                'birth_date' => '2000-08-09',
                'photo_url' => '/images/athletes/ilham_atletik.jpg',
                'height_cm' => 178,
                'weight_kg' => 68,
                'achievements' => 'Pemegang rekor lari 100m Sumbar (10.35 dtk)',
                'is_verified' => true,
            ],
            [
                'id' => 5,
                'contingent_id' => 5, // Tanah Datar
                'sport_id' => 3, // Atletik
                'nik' => '1304021802040005',
                'full_name' => 'Suci Ramadhani Syahrir',
                'gender' => 'P',
                'birth_place' => 'Batusangkar',
                'birth_date' => '2004-02-18',
                'photo_url' => '/images/athletes/suci_lompat.jpg',
                'height_cm' => 168,
                'weight_kg' => 55,
                'achievements' => 'Perak Kejurnas Atletik U-20 Solo Lompat Jauh 2024',
                'is_verified' => true,
            ],
            [
                'id' => 6,
                'contingent_id' => 4, // Payakumbuh
                'sport_id' => 4, // Renang
                'nik' => '1376012511020006',
                'full_name' => 'Zaky Athallah Akbar',
                'gender' => 'L',
                'birth_place' => 'Payakumbuh',
                'birth_date' => '2002-11-25',
                'photo_url' => '/images/athletes/zaky_renang.jpg',
                'height_cm' => 182,
                'weight_kg' => 74,
                'achievements' => 'Emas 50m Gaya Bebas Kejuaraan Renang Antar-Master Sumbar 2024',
                'is_verified' => true,
            ],
            [
                'id' => 7,
                'contingent_id' => 10, // Lima Puluh Kota
                'sport_id' => 5, // Bulutangkis
                'nik' => '1307040407030007',
                'full_name' => 'Alvino Bagas Kurniawan',
                'gender' => 'L',
                'birth_place' => 'Suliki',
                'birth_date' => '2003-07-04',
                'photo_url' => '/images/athletes/alvino_badminton.jpg',
                'height_cm' => 175,
                'weight_kg' => 66,
                'achievements' => 'Juara Sirnas PBSI Regional Sumatera 2023',
                'is_verified' => true,
            ],
            [
                'id' => 8,
                'contingent_id' => 6, // Kota Solok
                'sport_id' => 6, // Karate
                'nik' => '1372011709010008',
                'full_name' => 'Rizki Aditya Piliang',
                'gender' => 'L',
                'birth_place' => 'Solok',
                'birth_date' => '2001-09-17',
                'photo_url' => '/images/athletes/rizki_karate.jpg',
                'height_cm' => 172,
                'weight_kg' => 66,
                'achievements' => 'Emas Kejurda FORKI Sumbar Kumite 67kg 2025',
                'is_verified' => true,
            ],
            [
                'id' => 9,
                'contingent_id' => 9, // Pesisir Selatan
                'sport_id' => 9, // Taekwondo
                'nik' => '1301020201020009',
                'full_name' => 'Dimas Maulana Putra',
                'gender' => 'L',
                'birth_place' => 'Painan',
                'birth_date' => '2002-01-02',
                'photo_url' => '/images/athletes/dimas_taekwondo.jpg',
                'height_cm' => 176,
                'weight_kg' => 57,
                'achievements' => 'Emas Popda Sumbar 2023 Kyorugi Under 58kg',
                'is_verified' => true,
            ],
            [
                'id' => 10,
                'contingent_id' => 8, // Kota Pariaman
                'sport_id' => 10, // Futsal
                'nik' => '1377011006000010',
                'full_name' => 'Rangga Wijaya Kusuma',
                'gender' => 'L',
                'birth_place' => 'Pariaman',
                'birth_date' => '2000-06-10',
                'photo_url' => '/images/athletes/rangga_futsal.jpg',
                'height_cm' => 170,
                'weight_kg' => 63,
                'achievements' => 'Pemain Terbaik Liga Futsal Nusantara Regional Sumbar 2024',
                'is_verified' => true,
            ],
        ];

        foreach ($athletes as $item) {
            Athlete::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
