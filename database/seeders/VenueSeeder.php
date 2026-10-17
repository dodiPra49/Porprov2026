<?php

namespace Database\Seeders;

use App\Models\Venue;
use Illuminate\Database\Seeder;

class VenueSeeder extends Seeder
{
    public function run(): void
    {
        $venues = [
            [
                'id' => 1,
                'name' => 'Stadion Utama Gelora H. Agus Salim',
                'slug' => 'stadion-h-agus-salim-padang',
                'city' => 'Kota Padang',
                'address' => 'Jl. Rimbo Kaluang, Rimbo Kaluang, Kec. Padang Barat, Kota Padang',
                'latitude' => -0.9238120,
                'longitude' => 100.3582410,
                'capacity' => 15000,
                'contact_person' => 'Drs. Amrizal (081363000001)',
                'google_map_url' => 'https://maps.google.com/?q=-0.923812,100.358241',
                'image_url' => '/images/venues/agus_salim.jpg',
            ],
            [
                'id' => 2,
                'name' => 'Hall Serbaguna Politeknik Negeri Padang (PNP)',
                'slug' => 'hall-pnp-limau-manis',
                'city' => 'Kota Padang',
                'address' => 'Kampus Limau Manis, Kec. Pauh, Kota Padang',
                'latitude' => -0.9142000,
                'longitude' => 100.4635000,
                'capacity' => 2500,
                'contact_person' => 'Ir. Jonrinaldi (081363000002)',
                'google_map_url' => 'https://maps.google.com/?q=-0.9142,100.4635',
                'image_url' => '/images/venues/hall_pnp.jpg',
            ],
            [
                'id' => 3,
                'name' => 'Kolam Renang Standar Internasional Teratai Padang',
                'slug' => 'kolam-renang-teratai-padang',
                'city' => 'Kota Padang',
                'address' => 'Komplek GOR H. Agus Salim, Rimbo Kaluang, Kota Padang',
                'latitude' => -0.9245000,
                'longitude' => 100.3591000,
                'capacity' => 1800,
                'contact_person' => 'M. Fauzan (081363000003)',
                'google_map_url' => 'https://maps.google.com/?q=-0.9245,100.3591',
                'image_url' => '/images/venues/kolam_teratai.jpg',
            ],
            [
                'id' => 4,
                'name' => 'Hall Bulutangkis PT Semen Padang',
                'slug' => 'hall-badminton-semen-padang',
                'city' => 'Kota Padang',
                'address' => 'Indarung, Kec. Lubuk Kilangan, Kota Padang',
                'latitude' => -0.9578000,
                'longitude' => 100.4678000,
                'capacity' => 2000,
                'contact_person' => 'H. Dasril Efendi (081363000004)',
                'google_map_url' => 'https://maps.google.com/?q=-0.9578,100.4678',
                'image_url' => '/images/venues/hall_semen_padang.jpg',
            ],
            [
                'id' => 5,
                'name' => 'GOR Ateh Ngarai Bukittinggi',
                'slug' => 'gor-ateh-ngarai-bukittinggi',
                'city' => 'Kota Bukittinggi',
                'address' => 'Jl. Panorama No. 12, Kayu Kubu, Kec. Guguk Panjang, Kota Bukittinggi',
                'latitude' => -0.3065000,
                'longitude' => 100.3662000,
                'capacity' => 2200,
                'contact_person' => 'Riko Saputra (081363000005)',
                'google_map_url' => 'https://maps.google.com/?q=-0.3065,100.3662',
                'image_url' => '/images/venues/gor_ngarai_bkt.jpg',
            ],
            [
                'id' => 6,
                'name' => 'GOR Rang Agam Lubuk Basung',
                'slug' => 'gor-rang-agam-lubuk-basung',
                'city' => 'Kabupaten Agam',
                'address' => 'Padang Baru, Lubuk Basung, Kab. Agam',
                'latitude' => -0.3204000,
                'longitude' => 100.0471000,
                'capacity' => 3000,
                'contact_person' => 'Yulhendri, S.Sos (081363000006)',
                'google_map_url' => 'https://maps.google.com/?q=-0.3204,100.0471',
                'image_url' => '/images/venues/gor_rang_agam.jpg',
            ],
            [
                'id' => 7,
                'name' => 'GOR Gelanggang Olahraga Moh. Yamin Payakumbuh',
                'slug' => 'gor-moh-yamin-payakumbuh',
                'city' => 'Kota Payakumbuh',
                'address' => 'Kubu Gadang, Kec. Payakumbuh Barat, Kota Payakumbuh',
                'latitude' => -0.2285000,
                'longitude' => 100.6324000,
                'capacity' => 2800,
                'contact_person' => 'H. Doni Hendra (081363000007)',
                'google_map_url' => 'https://maps.google.com/?q=-0.2285,100.6324',
                'image_url' => '/images/venues/gor_moh_yamin.jpg',
            ],
            [
                'id' => 8,
                'name' => 'GOR Tanjung Paku Kota Solok',
                'slug' => 'gor-tanjung-paku-solok',
                'city' => 'Kota Solok',
                'address' => 'Tanjung Paku, Kec. Tanjung Harapan, Kota Solok',
                'latitude' => -0.7981000,
                'longitude' => 100.6582000,
                'capacity' => 1500,
                'contact_person' => 'Drs. Afrizal (081363000008)',
                'google_map_url' => 'https://maps.google.com/?q=-0.7981,100.6582',
                'image_url' => '/images/venues/gor_tanjung_paku.jpg',
            ],
            [
                'id' => 9,
                'name' => 'Stadion Gelora Rawang Pariaman',
                'slug' => 'stadion-gelora-rawang-pariaman',
                'city' => 'Kota Pariaman',
                'address' => 'Rawang, Kec. Pariaman Tengah, Kota Pariaman',
                'latitude' => -0.6275000,
                'longitude' => 100.1205000,
                'capacity' => 4000,
                'contact_person' => 'Syamsurizal (081363000009)',
                'google_map_url' => 'https://maps.google.com/?q=-0.6275,100.1205',
                'image_url' => '/images/venues/stadion_rawang.jpg',
            ],
            [
                'id' => 10,
                'name' => 'Hall Futsal Rafhely Bypass Padang',
                'slug' => 'hall-futsal-rafhely-bypass-padang',
                'city' => 'Kota Padang',
                'address' => 'Jl. Bypass KM 11, Sungai Sapih, Kec. Kuranji, Kota Padang',
                'latitude' => -0.8920000,
                'longitude' => 100.3950000,
                'capacity' => 2000,
                'contact_person' => 'H. Yasman (081363000010)',
                'google_map_url' => 'https://maps.google.com/?q=-0.8920,100.3950',
                'image_url' => '/images/venues/futsal_rafhely.jpg',
            ],
        ];

        foreach ($venues as $item) {
            Venue::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
