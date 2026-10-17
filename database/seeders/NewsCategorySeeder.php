<?php

namespace Database\Seeders;

use App\Models\NewsCategory;
use Illuminate\Database\Seeder;

class NewsCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'id' => 1,
                'name' => 'Berita Utama',
                'slug' => 'berita-utama',
                'description' => 'Informasi terdepan, pembukaan, dan penutupan Porprov Sumbar 2026.',
            ],
            [
                'id' => 2,
                'name' => 'Sorotan Atlet',
                'slug' => 'sorotan-atlet',
                'description' => 'Profil mendalam, perjuangan, dan wawancara eksklusif atlet berprestasi.',
            ],
            [
                'id' => 3,
                'name' => 'Liputan Pertandingan',
                'slug' => 'liputan-pertandingan',
                'description' => 'Laporan langsung jalannya pertandingan dari berbagai arena cabang olahraga.',
            ],
            [
                'id' => 4,
                'name' => 'Klasemen & Medali',
                'slug' => 'klasemen-dan-medali',
                'description' => 'Analisis perebutan peringkat dan perolehan medali antar kontingen daerah.',
            ],
            [
                'id' => 5,
                'name' => 'Rekor Baru',
                'slug' => 'rekor-baru',
                'description' => 'Pencapaian bersejarah atlet pemecah rekor di arena Porprov.',
            ],
            [
                'id' => 6,
                'name' => 'Kabar Kontingen',
                'slug' => 'kabar-kontingen',
                'description' => 'Persiapan, strategi, dan dinamika kontingen 19 Kabupaten/Kota di Sumbar.',
            ],
            [
                'id' => 7,
                'name' => 'Info Venue & Wisata',
                'slug' => 'info-venue-dan-wisata',
                'description' => 'Panduan lokasi pertandingan serta potensi pariwisata dan kuliner Ranah Minang.',
            ],
            [
                'id' => 8,
                'name' => 'Galeri & Multimedial',
                'slug' => 'galeri-dan-multimedia',
                'description' => 'Rangkuman visual, video sorotan, dan momen dramatis di lapangan.',
            ],
            [
                'id' => 9,
                'name' => 'Pengumuman Resmi',
                'slug' => 'pengumuman-resmi',
                'description' => 'Surat keputusan panitia, jadwal perubahan, dan keputusan dewan hakim.',
            ],
            [
                'id' => 10,
                'name' => 'Human Interest & Supporter',
                'slug' => 'human-interest-supporter',
                'description' => 'Kisah inspiratif di balik layar, aksi suporter, dan relawan Porprov.',
            ],
        ];

        foreach ($categories as $item) {
            NewsCategory::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
