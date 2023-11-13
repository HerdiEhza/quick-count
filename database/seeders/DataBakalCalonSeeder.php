<?php

namespace Database\Seeders;

use App\Models\DataBakalCalon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DataBakalCalonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DataBakalCalon::factory()
        //     ->count(800)
        //     ->create();

        $DPR_RI_KALBAR_1 = File::get('database/data/bakal_calon/DPR_RI_KALBAR_1.json');
        $DPRD_PROV_KALBAR_1 = File::get('database/data/bakal_calon/DPRD_PROV_KALBAR_1.json');
        $DPRD_KOTA_PTK_1 = File::get('database/data/bakal_calon/DPRD_KOTA_PTK_1.json');
        $DPRD_KOTA_PTK_2 = File::get('database/data/bakal_calon/DPRD_KOTA_PTK_2.json');
        $DPRD_KOTA_PTK_3 = File::get('database/data/bakal_calon/DPRD_KOTA_PTK_3.json');
        $DPRD_KOTA_PTK_4 = File::get('database/data/bakal_calon/DPRD_KOTA_PTK_4.json');
        $DPRD_KOTA_PTK_5 = File::get('database/data/bakal_calon/DPRD_KOTA_PTK_5.json');
        
        $paslons = json_decode($DPR_RI_KALBAR_1, true);

        $DPR_RI_KALBAR_1_files = json_decode($DPR_RI_KALBAR_1, true);
        $DPRD_PROV_KALBAR_1_files = json_decode($DPRD_PROV_KALBAR_1, true);
        $DPRD_KOTA_PTK_1_files = json_decode($DPRD_KOTA_PTK_1, true);
        $DPRD_KOTA_PTK_2_files = json_decode($DPRD_KOTA_PTK_2, true);
        $DPRD_KOTA_PTK_3_files = json_decode($DPRD_KOTA_PTK_3, true);
        $DPRD_KOTA_PTK_4_files = json_decode($DPRD_KOTA_PTK_4, true);
        $DPRD_KOTA_PTK_5_files = json_decode($DPRD_KOTA_PTK_5, true);


        foreach ($DPR_RI_KALBAR_1_files as $DPR_RI_KALBAR_1_file) {
            DataBakalCalon::query()->updateOrCreate([
                // 'id' => $paslon['id'],
                'nomor_urut' => $DPR_RI_KALBAR_1_file['nomor_urut'],
                'nama_bakal_calon' => $DPR_RI_KALBAR_1_file['nama_bakal_calon'],
                'jenis_kelamin' => $DPR_RI_KALBAR_1_file['jenis_kelamin'],
                'data_partai_id' => $DPR_RI_KALBAR_1_file['data_partai_id'],
                'data_dapil_id' => $DPR_RI_KALBAR_1_file['data_dapil_id'],
                'kategori_pemilu_id' => $DPR_RI_KALBAR_1_file['kategori_pemilu_id'],
                'foto_path' => $DPR_RI_KALBAR_1_file['foto_path'],
            ]);
        };

        foreach ($DPRD_PROV_KALBAR_1_files as $DPRD_PROV_KALBAR_1_file) {
            DataBakalCalon::query()->updateOrCreate([
                // 'id' => $paslon['id'],
                'nomor_urut' => $DPRD_PROV_KALBAR_1_file['nomor_urut'],
                'nama_bakal_calon' => $DPRD_PROV_KALBAR_1_file['nama_bakal_calon'],
                'jenis_kelamin' => $DPRD_PROV_KALBAR_1_file['jenis_kelamin'],
                'data_partai_id' => $DPRD_PROV_KALBAR_1_file['data_partai_id'],
                'data_dapil_id' => $DPRD_PROV_KALBAR_1_file['data_dapil_id'],
                'kategori_pemilu_id' => $DPRD_PROV_KALBAR_1_file['kategori_pemilu_id'],
                'foto_path' => $DPRD_PROV_KALBAR_1_file['foto_path'],
            ]);
        };

        foreach ($DPRD_KOTA_PTK_1_files as $DPRD_KOTA_PTK_1_file) {
            DataBakalCalon::query()->updateOrCreate([
                // 'id' => $paslon['id'],
                'nomor_urut' => $DPRD_KOTA_PTK_1_file['nomor_urut'],
                'nama_bakal_calon' => $DPRD_KOTA_PTK_1_file['nama_bakal_calon'],
                'jenis_kelamin' => $DPRD_KOTA_PTK_1_file['jenis_kelamin'],
                'data_partai_id' => $DPRD_KOTA_PTK_1_file['data_partai_id'],
                'data_dapil_id' => $DPRD_KOTA_PTK_1_file['data_dapil_id'],
                'kategori_pemilu_id' => $DPRD_KOTA_PTK_1_file['kategori_pemilu_id'],
                'foto_path' => $DPRD_KOTA_PTK_1_file['foto_path'],
            ]);
        };
        foreach ($DPRD_KOTA_PTK_2_files as $DPRD_KOTA_PTK_2_file) {
            DataBakalCalon::query()->updateOrCreate([
                // 'id' => $paslon['id'],
                'nomor_urut' => $DPRD_KOTA_PTK_2_file['nomor_urut'],
                'nama_bakal_calon' => $DPRD_KOTA_PTK_2_file['nama_bakal_calon'],
                'jenis_kelamin' => $DPRD_KOTA_PTK_2_file['jenis_kelamin'],
                'data_partai_id' => $DPRD_KOTA_PTK_2_file['data_partai_id'],
                'data_dapil_id' => $DPRD_KOTA_PTK_2_file['data_dapil_id'],
                'kategori_pemilu_id' => $DPRD_KOTA_PTK_2_file['kategori_pemilu_id'],
                'foto_path' => $DPRD_KOTA_PTK_2_file['foto_path'],
            ]);
        };
        foreach ($DPRD_KOTA_PTK_3_files as $DPRD_KOTA_PTK_3_file) {
            DataBakalCalon::query()->updateOrCreate([
                // 'id' => $paslon['id'],
                'nomor_urut' => $DPRD_KOTA_PTK_3_file['nomor_urut'],
                'nama_bakal_calon' => $DPRD_KOTA_PTK_3_file['nama_bakal_calon'],
                'jenis_kelamin' => $DPRD_KOTA_PTK_3_file['jenis_kelamin'],
                'data_partai_id' => $DPRD_KOTA_PTK_3_file['data_partai_id'],
                'data_dapil_id' => $DPRD_KOTA_PTK_3_file['data_dapil_id'],
                'kategori_pemilu_id' => $DPRD_KOTA_PTK_3_file['kategori_pemilu_id'],
                'foto_path' => $DPRD_KOTA_PTK_3_file['foto_path'],
            ]);
        };
        foreach ($DPRD_KOTA_PTK_4_files as $DPRD_KOTA_PTK_4_file) {
            DataBakalCalon::query()->updateOrCreate([
                // 'id' => $paslon['id'],
                'nomor_urut' => $DPRD_KOTA_PTK_4_file['nomor_urut'],
                'nama_bakal_calon' => $DPRD_KOTA_PTK_4_file['nama_bakal_calon'],
                'jenis_kelamin' => $DPRD_KOTA_PTK_4_file['jenis_kelamin'],
                'data_partai_id' => $DPRD_KOTA_PTK_4_file['data_partai_id'],
                'data_dapil_id' => $DPRD_KOTA_PTK_4_file['data_dapil_id'],
                'kategori_pemilu_id' => $DPRD_KOTA_PTK_4_file['kategori_pemilu_id'],
                'foto_path' => $DPRD_KOTA_PTK_4_file['foto_path'],
            ]);
        };
        foreach ($DPRD_KOTA_PTK_5_files as $DPRD_KOTA_PTK_5_file) {
            DataBakalCalon::query()->updateOrCreate([
                // 'id' => $paslon['id'],
                'nomor_urut' => $DPRD_KOTA_PTK_5_file['nomor_urut'],
                'nama_bakal_calon' => $DPRD_KOTA_PTK_5_file['nama_bakal_calon'],
                'jenis_kelamin' => $DPRD_KOTA_PTK_5_file['jenis_kelamin'],
                'data_partai_id' => $DPRD_KOTA_PTK_5_file['data_partai_id'],
                'data_dapil_id' => $DPRD_KOTA_PTK_5_file['data_dapil_id'],
                'kategori_pemilu_id' => $DPRD_KOTA_PTK_5_file['kategori_pemilu_id'],
                'foto_path' => $DPRD_KOTA_PTK_5_file['foto_path'],
            ]);
        };
        

        // foreach ($paslons as $paslon) {
        //     DataBakalCalon::query()->updateOrCreate([
        //         // 'id' => $paslon['id'],
        //         'nomor_urut' => $paslon['nomor_urut'],
        //         'nama_bakal_calon' => $paslon['nama_bakal_calon'],
        //         'jenis_kelamin' => $paslon['jenis_kelamin'],
        //         'data_partai_id' => $paslon['data_partai_id'],
        //         'data_dapil_id' => $paslon['data_dapil_id'],
        //         'kategori_pemilu_id' => $paslon['kategori_pemilu_id'],
        //         'foto_path' => $paslon['foto_path'],
        //     ]);
        // }
    }
}
