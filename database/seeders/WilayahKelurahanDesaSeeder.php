<?php

namespace Database\Seeders;

use App\Models\WilayahKelurahanDesa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

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

        $get_kel_desa = File::get('database/data/wilayahKelurahanDesa.json');
        $keldesas = json_decode($get_kel_desa, true);

        foreach ($keldesas as $keldes) {
            WilayahKelurahanDesa::query()->updateOrCreate([
                // 'id' => $paslon['id'],
                'nama_kelurahan_desa' => $keldes['nama_kelurahan_desa'],
                'jumlah_tps' => $keldes['jumlah_tps'],
                'jumlah_dpt' => $keldes['jumlah_dpt'],
                'wilayah_kecamatan_id' => $keldes['wilayah_kecamatan_id'],
            ]);
        }

        // WilayahKelurahanDesa::create([
        //     'nama_kelurahan_desa' => 'test kelurahan desa',
        //     'jumlah_tps' => null,
        //     'jumlah_dpt' => null,
        //     'wilayah_kecamatan_id' => 1,
        // ]);
    }
}
