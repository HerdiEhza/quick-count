<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(500)
            ->create([
                'timses_ring' => 1,
                // 'timses_leader_id' => fake()->numberBetween(1, 500),
            ]);

        User::factory()
            ->count(500)
            ->create([
                'timses_ring' => 2,
                'timses_leader_id' => fake()->numberBetween(1, 500),
            ]);
    }
}
