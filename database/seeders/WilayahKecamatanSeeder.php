<?php

namespace Database\Seeders;

use App\Models\WilayahKecamatan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class WilayahKecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // WilayahKecamatan::factory()
        //     ->count(5)
        //     ->create();

        $get_kecamatan = File::get('database/data/wilayahKecamatan.json');
        $kecamatans = json_decode($get_kecamatan, true);

        foreach ($kecamatans as $kecamatan) {
            WilayahKecamatan::query()->updateOrCreate([
                // 'id' => $paslon['id'],
                'nama_kecamatan' => $kecamatan['nama_kecamatan'],
                'jumlah_tps' => $kecamatan['jumlah_tps'],
                'jumlah_dpt' => $kecamatan['jumlah_dpt'],
                'wilayah_kabupaten_kota_id' => $kecamatan['wilayah_kabupaten_kota_id'],
            ]);
        }
    }
}
