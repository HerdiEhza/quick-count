<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PerolehanSuaraPartai;

class PerolehanSuaraPartaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PerolehanSuaraPartai::factory()
            ->count(17262)
            ->create();
    }
}
