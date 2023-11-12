<?php

namespace Database\Seeders;

use App\Models\DataBakalCalon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class WilayahDapilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinsi = File::get('database/data/wilayah_dapil/provinsi.json');
        $kab_kota = File::get('database/data/wilayah_dapil/kab_kota.json');
        $kecamatan = File::get('database/data/wilayah_dapil/kecamatan.json');
        $kel_desa = File::get('database/data/wilayah_dapil/kel_desa.json');
        
        $provinsi_files = json_decode($provinsi, true);
        $kab_kota_files = json_decode($kab_kota, true);
        $kecamatan_files = json_decode($kecamatan, true);
        $kel_desa_files = json_decode($kel_desa, true);

        foreach ($provinsi_files as $provinsi_file) {
            DB::table('data_dapil_has_wilayah_provinsis')->insert([
                'dapil_id' => $provinsi_file['dapil_id'],
                'provinsi_id' => $provinsi_file['provinsi_id'],
            ]);
        };

        foreach ($kab_kota_files as $kab_kota_file) {
            DB::table('data_dapil_has_wilayah_kabupaten_kotas')->insert([
                'dapil_id' => $kab_kota_file['dapil_id'],
                'kabupaten_kota_id' => $kab_kota_file['kabupaten_kota_id'],
            ]);
        };

        foreach ($kecamatan_files as $kecamatan_file) {
            DB::table('data_dapil_has_wilayah_kecamatans')->insert([
                'dapil_id' => $kecamatan_file['dapil_id'],
                'kecamatan_id' => $kecamatan_file['kecamatan_id'],
            ]);
        };
        foreach ($kel_desa_files as $kel_desa_file) {
            DB::table('data_dapil_has_wilayah_kelurahan_desas')->insert([
                'dapil_id' => $kel_desa_file['dapil_id'],
                'kelurahan_desa_id' => $kel_desa_file['kelurahan_desa_id'],
            ]);
        };
    }
}
