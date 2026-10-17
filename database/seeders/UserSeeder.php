<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Dr. H. Agusril Mahendra, M.Si',
                'email' => 'superadmin@porprov2026.sumbarprov.go.id',
                'password' => Hash::make('PorprovSumbar2026!'),
                'role' => 'superadmin',
                'phone' => '081267890001',
                'institution' => 'KONI Sumatera Barat',
            ],
            [
                'id' => 2,
                'name' => 'Dodi Agusri, S.Kom',
                'email' => 'it.admin@porprov2026.sumbarprov.go.id',
                'password' => Hash::make('AdminITSumbar2026!'),
                'role' => 'superadmin',
                'phone' => '081267890002',
                'institution' => 'Tim Pengembang IT Dispora & KONI',
            ],
            [
                'id' => 3,
                'name' => 'Rahmatul Fadli, S.Sos',
                'email' => 'media.center@porprov2026.sumbarprov.go.id',
                'password' => Hash::make('MediaPorprov2026!'),
                'role' => 'reporter',
                'phone' => '081267890003',
                'institution' => 'Humas & Media Center Porprov',
            ],
            [
                'id' => 4,
                'name' => 'Ir. Hendri Chaniago',
                'email' => 'wasit.silat@porprov2026.sumbarprov.go.id',
                'password' => Hash::make('WasitSilat2026!'),
                'role' => 'verifier',
                'phone' => '081267890004',
                'institution' => 'Pengprov IPSI Sumatera Barat',
            ],
            [
                'id' => 5,
                'name' => 'Dra. Yuliani Fitri, M.Pd',
                'email' => 'cabor.atletik@porprov2026.sumbarprov.go.id',
                'password' => Hash::make('CaborAtletik2026!'),
                'role' => 'admin_cabor',
                'phone' => '081267890005',
                'institution' => 'Pengprov PASI Sumatera Barat',
            ],
            [
                'id' => 6,
                'name' => 'Zulfikar Tanjung, S.Pd',
                'email' => 'cabor.renang@porprov2026.sumbarprov.go.id',
                'password' => Hash::make('CaborRenang2026!'),
                'role' => 'admin_cabor',
                'phone' => '081267890006',
                'institution' => 'Pengprov PRSI Sumatera Barat',
            ],
            [
                'id' => 7,
                'name' => 'M. Iqbal Pratama, S.Or',
                'email' => 'cabor.takraw@porprov2026.sumbarprov.go.id',
                'password' => Hash::make('CaborTakraw2026!'),
                'role' => 'admin_cabor',
                'phone' => '081267890007',
                'institution' => 'Pengprov PSTI Sumatera Barat',
            ],
            [
                'id' => 8,
                'name' => 'Nofrizal Piliang, S.E',
                'email' => 'cabor.badminton@porprov2026.sumbarprov.go.id',
                'password' => Hash::make('CaborBadminton2026!'),
                'role' => 'admin_cabor',
                'phone' => '081267890008',
                'institution' => 'Pengprov PBSI Sumatera Barat',
            ],
            [
                'id' => 9,
                'name' => 'Ahmad Syukri, S.Kom',
                'email' => 'cabor.karate@porprov2026.sumbarprov.go.id',
                'password' => Hash::make('CaborKarate2026!'),
                'role' => 'admin_cabor',
                'phone' => '081267890009',
                'institution' => 'Pengprov FORKI Sumatera Barat',
            ],
            [
                'id' => 10,
                'name' => 'Siti Nurhaliza, S.I.Kom',
                'email' => 'jurnalis.lapangan@porprov2026.sumbarprov.go.id',
                'password' => Hash::make('Jurnalis2026!'),
                'role' => 'reporter',
                'phone' => '081267890010',
                'institution' => 'Persatuan Wartawan Indonesia (PWI) Sumbar',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(['id' => $user['id']], $user);
        }
    }
}
