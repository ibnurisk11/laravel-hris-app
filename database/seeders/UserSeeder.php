<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Division;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil ID dari divisi yang sudah dibuat di DivisionSeeder
        $itDivision = Division::where('name', 'IT Department')->first();

        DB::table('users')->insert([
            'nip' => '1234567890',
            'ktp' => '1122334455667788',
            'npwp' => '998877665544332211',
            'name' => 'Admin HRIS',
            'email' => 'admin@hris.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'birth_date' => '1990-01-01',
            'address' => 'Jl. Kebon Jeruk No. 1',
            'division_id' => $itDivision->id,
            'position' => 'Head of IT',
            'joined_at' => '2023-01-01',
            'contract_until' => '2025-01-01',
            'salary' => 10000000.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}