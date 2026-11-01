<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\School;
use App\Models\MbgDistribution;
use App\Models\Report;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $pelapor = User::create([
            'name' => 'Ibu Rina (Pelapor)',
            'email' => 'pelapor@mbg.test',
            'password' => Hash::make('password'),
            'role' => 'pelapor',
        ]);

        $pelapor2 = User::create([
            'name' => 'Bpk. Budi (Pelapor 2)',
            'email' => 'pelapor2@mbg.test',
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

        $smpLembang = School::create([
            'name' => 'SMP 1 Lembang',
            'address' => 'Jl. Raya Lembang No. 10, Kab. Bandung Barat',
            'contact_person' => 'Bpk. Ahmad (Kepala Sekolah)',
        ]);

        $sdnSukamaju = School::create([
            'name' => 'SD Negeri 1 Sukamaju',
            'address' => 'Jl. Sukajadi No. 45, Kota Bandung',
            'contact_person' => 'Ibu Dewi (Waka Kesiswaan)',
        ]);

        $dist1 = MbgDistribution::create([
            'school_id' => $smpLembang->id,
            'distribution_date' => now()->subDays(2)->format('Y-m-d'),
            'meal_time' => 'siang',
            'menu_description' => 'Nasi Putih, Ayam Katsu, Sayur Brokoli, dan Susu UHT',
            'provider_name' => 'SPPG Lembang Berkah',
        ]);

        $dist2 = MbgDistribution::create([
            'school_id' => $smpLembang->id,
            'distribution_date' => now()->subDay()->format('Y-m-d'),
            'meal_time' => 'siang',
            'menu_description' => 'Nasi Goreng Telur, Capcay Sayur, dan Buah Pisang',
            'provider_name' => 'SPPG Lembang Berkah',
        ]);

        $dist3 = MbgDistribution::create([
            'school_id' => $sdnSukamaju->id,
            'distribution_date' => now()->subDay()->format('Y-m-d'),
            'meal_time' => 'pagi',
            'menu_description' => 'Bubur Ayam Komplit, Telur Rebus, dan Susu Kotak',
            'provider_name' => 'SPPG Sukajadi Makmur',
        ]);

        Report::create([
            'user_id' => $pelapor->id,
            'school_id' => $smpLembang->id,
            'mbg_distribution_id' => $dist1->id,
            'incident_date' => now()->subDays(2)->format('Y-m-d'),
            'affected_count' => 3,
            'symptoms_description' => 'Siswa mengeluhkan mual dan sakit perut 2 jam setelah konsumsi susu dan ayam katsu.',
            'status' => 'ditinjau',
            'notes' => 'Telah diperiksa bukti foto dan terindikasi ada 2 laporan serupa dari kelas yang sama.',
        ]);

        Report::create([
            'user_id' => $pelapor2->id,
            'school_id' => $smpLembang->id,
            'mbg_distribution_id' => $dist1->id,
            'incident_date' => now()->subDays(2)->format('Y-m-d'),
            'affected_count' => 2,
            'symptoms_description' => 'Pusing dan diare ringan setelah makan siang MBG.',
            'status' => 'diteruskan',
            'notes' => 'Diteruskan ke Puskesmas Lembang untuk penanganan awal.',
            'forwarded_to' => 'Puskesmas Lembang dan Pihak Sekolah',
        ]);

        Report::create([
            'user_id' => $pelapor->id,
            'school_id' => $sdnSukamaju->id,
            'mbg_distribution_id' => $dist3->id,
            'incident_date' => now()->subDay()->format('Y-m-d'),
            'affected_count' => 1,
            'symptoms_description' => 'Alergi ringan setelah konsumsi bubur ayam.',
            'status' => 'diajukan',
        ]);
    }
}