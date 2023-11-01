<?php

namespace Database\Seeders;

use App\Models\DataBakalCalon;
use Illuminate\Database\Seeder;

class DataBakalCalonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DataBakalCalon::factory()
            ->count(67)
            ->create();
    }
}
