<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WilayahKelurahanDesa;

class WilayahKelurahanDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // WilayahKelurahanDesa::factory()
        //     ->count(5)
        //     ->create();

        WilayahKelurahanDesa::create([
            'nama_kelurahan_desa' => 'test kelurahan desa',
            'jumlah_tps' => null,
            'jumlah_dpt' => null,
            'wilayah_kecamatan_id' => 1,
        ]);
    }
}
