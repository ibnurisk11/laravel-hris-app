<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('divisions')->insert([
            ['name' => 'IT Department'],
            ['name' => 'Finance Department'],
            ['name' => 'HR Department'],
        ]);
    }
}