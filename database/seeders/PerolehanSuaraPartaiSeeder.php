<?php

namespace Database\Seeders;

use App\Models\PerolehanSuaraPartai;
use Illuminate\Database\Seeder;

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
