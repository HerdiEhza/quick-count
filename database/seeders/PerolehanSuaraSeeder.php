<?php

namespace Database\Seeders;

use App\Models\PerolehanSuara;
use Illuminate\Database\Seeder;

class PerolehanSuaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PerolehanSuara::factory()
            ->count(204)
            ->create();
    }
}
