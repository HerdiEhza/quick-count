<?php

namespace Database\Seeders;

use App\Models\DataTps;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DataTpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DataTps::factory()
        //     ->count(5)
        //     ->create();

        $get_tps1 = File::get('database/data/dataTps.json');
        $tps = json_decode($get_tps1, true);


        foreach ($tps as $tpsValue) {
            DataTps::query()->updateOrCreate([
                // 'id' => $paslon['id'],
                'nama_tps' => $tpsValue['nama_tps'],
                'alamat_tps' => $tpsValue['alamat_tps'],
                'wilayah_provinsi_id' => $tpsValue['wilayah_provinsi_id'],
                'wilayah_kabupaten_kota_id' => $tpsValue['wilayah_kabupaten_kota_id'],
                'wilayah_kecamatan_id' => $tpsValue['wilayah_kecamatan_id'],
                'wilayah_kelurahan_desa_id' => $tpsValue['wilayah_kelurahan_desa_id'],
                'data_dapil_ri_id' => $tpsValue['data_dapil_ri_id'],
                'data_dapil_prov_id' => $tpsValue['data_dapil_prov_id'],
                // 'data_dapil_kab_kota_id' => null,
                'data_dapil_kab_kota_id' => $tpsValue['data_dapil_kab_kota_id'],
            ]);
        };
    }
}
