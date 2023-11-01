<?php

namespace Database\Seeders;

use App\Models\DataDapil;
use Illuminate\Database\Seeder;

class DataDapilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DataDapil::factory()
            ->count(5)
            ->create();
    }
}
