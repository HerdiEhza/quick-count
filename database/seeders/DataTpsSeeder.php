<?php

namespace Database\Seeders;

use App\Models\DataTps;
use Illuminate\Database\Seeder;

class DataTpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DataTps::factory()
            ->count(5)
            ->create();
    }
}
