<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    public function run(): void
    {
        $documents = [
            [
                'id' => 1,
                'title' => 'Technical Handbook (THB) Umum Porprov Sumatera Barat 2026',
                'document_type' => 'thb',
                'file_path' => '/documents/thb/THB_Umum_Porprov_Sumbar_2026.pdf',
                'file_size_kb' => 4520,
                'file_format' => 'pdf',
                'sport_id' => null,
                'download_count' => 1420,
            ],
            [
                'id' => 2,
                'title' => 'Buku Panduan Teknis Cabang Olahraga Pencak Silat',
                'document_type' => 'thb',
                'file_path' => '/documents/thb/THB_Pencak_Silat_2026.pdf',
                'file_size_kb' => 2180,
                'file_format' => 'pdf',
                'sport_id' => 1,
                'download_count' => 850,
            ],
            [
                'id' => 3,
                'title' => 'Regulasi Teknis dan Sistem Pertandingan Sepak Takraw',
                'document_type' => 'thb',
                'file_path' => '/documents/thb/THB_Sepak_Takraw_2026.pdf',
                'file_size_kb' => 1950,
                'file_format' => 'pdf',
                'sport_id' => 2,
                'download_count' => 610,
            ],
            [
                'id' => 4,
                'title' => 'Petunjuk Teknis Perlombaan Atletik dan Standar Kualifikasi',
                'document_type' => 'thb',
                'file_path' => '/documents/thb/THB_Atletik_Porprov_2026.pdf',
                'file_size_kb' => 3120,
                'file_format' => 'pdf',
                'sport_id' => 3,
                'download_count' => 930,
            ],
            [
                'id' => 5,
                'title' => 'Pedoman Teknis dan Regulasi Perlombaan Renang',
                'document_type' => 'thb',
                'file_path' => '/documents/thb/THB_Renang_Porprov_2026.pdf',
                'file_size_kb' => 2450,
                'file_format' => 'pdf',
                'sport_id' => 4,
                'download_count' => 740,
            ],
            [
                'id' => 6,
                'title' => 'Surat Keputusan (SK) Dewan Hakim dan Wasit Juri Porprov 2026',
                'document_type' => 'sk',
                'file_path' => '/documents/sk/SK_Dewan_Hakim_Porprov_2026.pdf',
                'file_size_kb' => 1820,
                'file_format' => 'pdf',
                'sport_id' => null,
                'download_count' => 450,
            ],
            [
                'id' => 7,
                'title' => 'Regulasi Keabsahan Atlet dan Verifikasi Dokumen Kependudukan',
                'document_type' => 'regulasi',
                'file_path' => '/documents/regulasi/Regulasi_Keabsahan_Atlet_Sumbar.pdf',
                'file_size_kb' => 1650,
                'file_format' => 'pdf',
                'sport_id' => null,
                'download_count' => 1120,
            ],
            [
                'id' => 8,
                'title' => 'Lembar Hasil Resmi (Official Result) Hari Ke-1 Cabor Silat',
                'document_type' => 'hasil_resmi',
                'file_path' => '/documents/results/Hasil_Resmi_Silat_Day1.pdf',
                'file_size_kb' => 980,
                'file_format' => 'pdf',
                'sport_id' => 1,
                'download_count' => 530,
            ],
            [
                'id' => 9,
                'title' => 'Lembar Hasil Resmi (Official Result) Cabor Atletik & Rekor Baru',
                'document_type' => 'hasil_resmi',
                'file_path' => '/documents/results/Hasil_Resmi_Atletik_Day2.pdf',
                'file_size_kb' => 1150,
                'file_format' => 'pdf',
                'sport_id' => 3,
                'download_count' => 780,
            ],
            [
                'id' => 10,
                'title' => 'Buku Panduan Medis, Anti-Doping, dan Layanan Darurat Venue',
                'document_type' => 'regulasi',
                'file_path' => '/documents/regulasi/Buku_Panduan_Medis_Porprov_2026.pdf',
                'file_size_kb' => 2840,
                'file_format' => 'pdf',
                'sport_id' => null,
                'download_count' => 390,
            ],
        ];

        foreach ($documents as $item) {
            Document::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
