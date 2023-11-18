<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimsesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Timses\Timses::factory(5)->create();

        \App\Models\Timses\Timses::factory()->create([
            'name' => 'Test Timses',
            'username'=>'timses',
            'email' => 'timses@timses.com',
        ]);
    }
}
