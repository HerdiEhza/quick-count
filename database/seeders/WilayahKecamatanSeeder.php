<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WilayahKecamatan;

class WilayahKecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WilayahKecamatan::factory()
            ->count(5)
            ->create();
    }
}
