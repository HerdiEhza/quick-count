<?php

namespace Database\Seeders;

use App\Models\PerolehanSuaraBacaleg;
use Illuminate\Database\Seeder;

class PerolehanSuaraBacalegSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PerolehanSuaraBacaleg::factory()
            ->count(17262)
            ->create();
    }
}
