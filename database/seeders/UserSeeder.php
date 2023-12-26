<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'marketing@dku.id',
                'password' => Hash::make('Mekikau19'),
            ]);
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'jo@dku.id',
                'password' => Hash::make('Qwerty2021!'),
            ]);
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'sani@dku.id',
                'password' => Hash::make('Qwerty2021!'),
            ]);
    }
}
