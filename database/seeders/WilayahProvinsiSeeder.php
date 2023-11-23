<?php

namespace Database\Seeders;

use App\Models\WilayahProvinsi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class WilayahProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // WilayahProvinsi::factory()
        //     ->count(5)
        //     ->create();

        $get_provinsi = File::get('database/data/wilayahProvinsi.json');
        $provinsis = json_decode($get_provinsi, true);

        foreach ($provinsis as $provinsi) {
            WilayahProvinsi::query()->updateOrCreate([
                // 'id' => $paslon['id'],
                'nama_provinsi' => $provinsi['nama_provinsi'],
                'jumlah_tps' => $provinsi['jumlah_tps'],
                'jumlah_dpt' => $provinsi['jumlah_dpt'],
            ]);
        }
    }
}
