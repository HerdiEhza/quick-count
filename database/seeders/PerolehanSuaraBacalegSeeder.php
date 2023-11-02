<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PerolehanSuaraBacaleg;

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
