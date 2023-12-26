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
        \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'marketing@dku.id',
                'password' => Hash::make('Mekikau19'),
            ]);
        \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'jo@dku.id',
                'password' => Hash::make('Qwerty2021!'),
            ]);
        \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'sani@dku.id',
                'password' => Hash::make('Qwerty2021!'),
            ]);

        $userPemantaus = User::select(['id'])->get();

        foreach ($userPemantaus as $userPemantau) {
            // DB::table('user_pemantau_wilayah_kelurahan_desa')->insert([
            //     'user_id' => $userPemantau['id'],
            //     'wilayah_kelurahan_desa_id' => rand(1, 1000),
            // ]);
            // DB::table('user_pemantau_wilayah_kelurahan_desa')->insert([
            //     'user_id' => $userPemantau['id'],
            //     'wilayah_kelurahan_desa_id' => rand(1001, 2000),
            // ]);
            // DB::table('user_pemantau_wilayah_kelurahan_desa')->insert([
            //     'user_id' => $userPemantau['id'],
            //     'wilayah_kelurahan_desa_id' => rand(2001, 2100),
            // ]);
            // DB::table('user_pemantau_wilayah_kelurahan_desa')->insert([
            //     'user_id' => $userPemantau['id'],
            //     'wilayah_kelurahan_desa_id' => rand(2101, 2140),
            // ]);

            DB::table('user_pemantau_wilayah_kelurahan_desa')->insert([
                'user_id' => $userPemantau['id'],
                'wilayah_kelurahan_desa_id' => rand(155, 157),
            ]);
        }
    }
}
