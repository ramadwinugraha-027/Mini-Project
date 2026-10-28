<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\School;
use App\Models\MbgDistribution;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Pengguna Demo (3 Peran)
        User::create([
            'name' => 'Ibu Rina (Pelapor)',
            'email' => 'pelapor@mbg.test',
            'password' => Hash::make('password'),
            'role' => 'pelapor',
        ]);

        User::create([
            'name' => 'Pak Dedi (Pemantau)',
            'email' => 'pemantau@mbg.test',
            'password' => Hash::make('password'),
            'role' => 'pemantau',
        ]);

        User::create([
            'name' => 'Ibu Sari (Koordinator)',
            'email' => 'koordinator@mbg.test',
            'password' => Hash::make('password'),
            'role' => 'koordinator',
        ]);

        // 2. Data Master Sekolah
        $smpLembang = School::create([
            'name' => 'SMP 1 Lembang',
            'address' => 'Jl. Raya Lembang No. 10, Kab. Bandung Barat',
            'contact_person' => 'Bpk. Ahmad (Kepala Sekolah SMP 1 Lembang)',
        ]);

        $sdnSukamaju = School::create([
            'name' => 'SD Negeri 1 Sukamaju',
            'address' => 'Jl. Sukajadi No. 45, Kota Bandung',
            'contact_person' => 'Ibu Dewi (Wakil Kepala Sekolah Bidang Kesiswaan)',
        ]);

        // 3. Data Distribusi Makanan MBG
        MbgDistribution::create([
            'school_id' => $smpLembang->id,
            'distribution_date' => now()->subDays(2)->format('Y-m-d'), // 2 hari lalu
            'meal_time' => 'siang',
            'menu_description' => 'Nasi Putih, Ayam Katsu, Sayur Brokoli, dan Susu UHT',
            'provider_name' => 'SPPG Lembang Berkah',
        ]);

        MbgDistribution::create([
            'school_id' => $smpLembang->id,
            'distribution_date' => now()->subDay()->format('Y-m-d'), // kemarin
            'meal_time' => 'siang',
            'menu_description' => 'Nasi Goreng Telur, Capcay Sayur, dan Buah Pisang',
            'provider_name' => 'SPPG Lembang Berkah',
        ]);

        MbgDistribution::create([
            'school_id' => $sdnSukamaju->id,
            'distribution_date' => now()->subDay()->format('Y-m-d'), // kemarin
            'meal_time' => 'pagi',
            'menu_description' => 'Bubur Ayam Komplit, Telur Rebus, dan Susu Kotak',
            'provider_name' => 'SPPG Sukajadi Makmur',
        ]);
    }
}