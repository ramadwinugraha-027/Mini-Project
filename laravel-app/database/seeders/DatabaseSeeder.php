<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Akun Pelapor
        User::create([
            'name' => 'Ibu Rina (Pelapor)',
            'email' => 'pelapor@mbg.test',
            'password' => Hash::make('password'),
            'role' => 'pelapor',
        ]);

        // 2. Akun Pemantau Komunitas
        User::create([
            'name' => 'Pak Dedi (Pemantau)',
            'email' => 'pemantau@mbg.test',
            'password' => Hash::make('password'),
            'role' => 'pemantau',
        ]);

        // 3. Akun Koordinator Komunitas
        User::create([
            'name' => 'Ibu Sari (Koordinator)',
            'email' => 'koordinator@mbg.test',
            'password' => Hash::make('password'),
            'role' => 'koordinator',
        ]);
    }
}