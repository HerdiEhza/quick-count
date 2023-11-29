<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'timses_leader_id' => rand(1, 500),
            ]);

        $userPemantaus = User::select(['id'])->get();
        $users = User::select(['id'])->get();

        foreach ($userPemantaus as $userPemantau) {
            DB::table('user_pemantau_wilayah_kelurahan_desa')->insert([
                'user_id' => $userPemantau['id'],
                'wilayah_kelurahan_desa_id' => rand(1, 1000),
            ]);
            DB::table('user_pemantau_wilayah_kelurahan_desa')->insert([
                'user_id' => $userPemantau['id'],
                'wilayah_kelurahan_desa_id' => rand(1001, 2000),
            ]);
            DB::table('user_pemantau_wilayah_kelurahan_desa')->insert([
                'user_id' => $userPemantau['id'],
                'wilayah_kelurahan_desa_id' => rand(2001, 2100),
            ]);
            DB::table('user_pemantau_wilayah_kelurahan_desa')->insert([
                'user_id' => $userPemantau['id'],
                'wilayah_kelurahan_desa_id' => rand(2101, 2140),
            ]);
        }

        foreach ($users as $user) {
            DB::table('user_timses_tps')->insert([
                'user_id' => $user['id'],
                'data_tps_id' => rand(1, 1000),
            ]);
            DB::table('user_timses_tps')->insert([
                'user_id' => $user['id'],
                'data_tps_id' => rand(1001, 2000),
            ]);
            DB::table('user_timses_tps')->insert([
                'user_id' => $user['id'],
                'data_tps_id' => rand(2001, 2100),
            ]);
            DB::table('user_timses_tps')->insert([
                'user_id' => $user['id'],
                'data_tps_id' => rand(2101, 2140),
            ]);
        }
    }
}
