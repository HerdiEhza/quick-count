<?php

namespace Database\Seeders;

use App\Models\DataPartai;
use Illuminate\Database\Seeder;

class DataPartaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DataPartai::factory()
            ->count(5)
            ->create();
    }
}
