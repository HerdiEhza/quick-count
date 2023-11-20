<?php

namespace Database\Seeders;

use App\Models\TimSukses;
use Illuminate\Database\Seeder;

class TimSuksesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TimSukses::factory()
            ->count(1500)
            ->create();
    }
}
