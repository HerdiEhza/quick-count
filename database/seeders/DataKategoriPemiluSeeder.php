<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DataKategoriPemilu;

class DataKategoriPemiluSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DataKategoriPemilu::factory()
            ->count(5)
            ->create();
    }
}
