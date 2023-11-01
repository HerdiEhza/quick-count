<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WilayahKabupatenKota;

class WilayahKabupatenKotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WilayahKabupatenKota::factory()
            ->count(5)
            ->create();
    }
}
