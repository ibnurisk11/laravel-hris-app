<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DivisionSeeder::class,
            UserSeeder::class,
            // Tambahkan seeder lain di sini jika ada
        ]);
        
        // Kode User::factory() bawaan Laravel Breeze bisa dihilangkan
        // karena Anda sudah punya UserSeeder sendiri
        // User::factory(10)->create();
    }
}