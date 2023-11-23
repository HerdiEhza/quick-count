<?php

namespace Database\Seeders;

use App\Models\WilayahKabupatenKota;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class WilayahKabupatenKotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // WilayahKabupatenKota::factory()
        //     ->count(5)
        //     ->create();

        $get_kab_kota = File::get('database/data/wilayahKabupatenKota.json');
        $kabkotas = json_decode($get_kab_kota, true);

        foreach ($kabkotas as $kabkota) {
            WilayahKabupatenKota::query()->updateOrCreate([
                // 'id' => $paslon['id'],
                'nama_kabupaten_kota' => $kabkota['nama_kabupaten_kota'],
                'jumlah_tps' => $kabkota['jumlah_tps'],
                'jumlah_dpt' => $kabkota['jumlah_dpt'],
                'wilayah_provinsi_id' => $kabkota['wilayah_provinsi_id'],
            ]);
        }
    }
}
