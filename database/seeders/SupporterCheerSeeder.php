<?php

namespace Database\Seeders;

use App\Models\SupporterCheer;
use Illuminate\Database\Seeder;

class SupporterCheerSeeder extends Seeder
{
    public function run(): void
    {
        $cheers = [
            [
                'id' => 1,
                'contingent_id' => 1, // Padang
                'sender_name' => 'Ahmad Fikri Tanjung',
                'sender_city' => 'Padang',
                'message' => 'Semangat kawan-kawan atlet Kota Padang! Pertahankan gelar Juara Umum di Ranah Minang tercinta!',
                'likes_count' => 142,
                'is_approved' => true,
            ],
            [
                'id' => 2,
                'contingent_id' => 2, // Bukittinggi
                'sender_name' => 'Rina Salsabila',
                'sender_city' => 'Bukittinggi',
                'message' => 'Bukittinggi Rancak! Buktikan atlet-atlet Jam Gadang mampu merebut medali emas terbanyak!',
                'likes_count' => 118,
                'is_approved' => true,
            ],
            [
                'id' => 3,
                'contingent_id' => 3, // Agam
                'sender_name' => 'Mak Kari Dt. Maruhun',
                'sender_city' => 'Lubuk Basung',
                'message' => 'Maju taruih kontingen Luhak Agam! Tunjukkan kegigihan rang agam di tiok-tiok gelanggang!',
                'likes_count' => 97,
                'is_approved' => true,
            ],
            [
                'id' => 4,
                'contingent_id' => 4, // Payakumbuh
                'sender_name' => 'Bobi Anggara',
                'sender_city' => 'Payakumbuh',
                'message' => 'Payakumbuh Kotaku, bangga dengan Zaky Athallah yang sukses di kolam renang! Lanjutkan tradisi emas!',
                'likes_count' => 85,
                'is_approved' => true,
            ],
            [
                'id' => 5,
                'contingent_id' => 5, // Tanah Datar
                'sender_name' => 'Uni Fitria',
                'sender_city' => 'Batusangkar',
                'message' => 'Salam dari Luhak Nan Tuo! Kami warga Tanah Datar selalu mendoakan perjuangan adik-adik atlet.',
                'likes_count' => 74,
                'is_approved' => true,
            ],
            [
                'id' => 6,
                'contingent_id' => 7, // Padang Pariaman
                'sender_name' => 'Buyung Piaman',
                'sender_city' => 'Lubuk Alung',
                'message' => 'Padang Pariaman tumpuan kami! Takraw jo cabor lain harus baok pulang piala kito basamo!',
                'likes_count' => 105,
                'is_approved' => true,
            ],
            [
                'id' => 7,
                'contingent_id' => 6, // Kota Solok
                'sender_name' => 'Hendra Syahputra',
                'sender_city' => 'Solok',
                'message' => 'Kota Beras pantang menyerah! Selamat untuk tim karate yang luar biasa hari ini!',
                'likes_count' => 63,
                'is_approved' => true,
            ],
            [
                'id' => 8,
                'contingent_id' => 8, // Kota Pariaman
                'sender_name' => 'Dewi Lestari',
                'sender_city' => 'Pariaman',
                'message' => 'Tabuik melambung tinggi, atlet Kota Pariaman melesat meraih prestasi! Juara futsal milik kita!',
                'likes_count' => 89,
                'is_approved' => true,
            ],
            [
                'id' => 9,
                'contingent_id' => 9, // Pesisir Selatan
                'sender_name' => 'Ridho Pratama (Perantau Jakarta)',
                'sender_city' => 'Jakarta (Asal Painan)',
                'message' => 'Walau merantau jauh di ibukota, hati kami tetap bersama kontingen Pesisir Selatan di Porprov 2026!',
                'likes_count' => 134,
                'is_approved' => true,
            ],
            [
                'id' => 10,
                'contingent_id' => 10, // Lima Puluh Kota
                'sender_name' => 'Syahrul Ramadhan',
                'sender_city' => 'Harau',
                'message' => 'Semangat Lembah Harau mengiringi langkah para atlet Lima Puluh Kota! Tuntaskan dengan emas!',
                'likes_count' => 91,
                'is_approved' => true,
            ],
        ];

        foreach ($cheers as $item) {
            SupporterCheer::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
