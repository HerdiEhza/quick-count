<?php

namespace Database\Seeders\Caleg;

use App\Models\DataBakalCalon;
use App\Models\TimSukses;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class SubandiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $get_data = File::get('data_subandi/dukungan_suara.json');

        $data_subandis = json_decode($get_data, true);

        foreach ($data_subandis as $data_subandi) {
            for ($i = 0; $i <= $data_subandi['total_dukungan']; $i++) {
                TimSukses::query()->create([
                    "nomor_ktp" => $data_subandi['nomor_ktp'],
                    "nomor_hp" => $data_subandi['nomor_hp'],
                    "nama" => $data_subandi['nama'],
                    "data_bakal_calon_id" => $data_subandi['data_bakal_calon_id'],
                    "user_id" => $data_subandi['user_id'],
                    "wilayah_kelurahan_desa_id" => $data_subandi['wilayah_kelurahan_desa_id'],
                    "wilayah_kabupaten_kota_id" => $data_subandi['wilayah_kabupaten_kota_id'],
                    "wilayah_kecamatan_id" => $data_subandi['wilayah_kecamatan_id'],
                    "data_tps_id" => $data_subandi['data_tps_id'],
                    "is_out_range" => false,
                ]);
            }
        }
    }
}
