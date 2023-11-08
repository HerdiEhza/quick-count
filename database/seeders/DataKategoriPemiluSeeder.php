<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DataKategoriPemilu;

class DataKategoriPemiluSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DataKategoriPemilu::factory()
        //     ->count(5)
        //     ->create();

        $kategoriPemilu = [
            // [
            //     'id' => 1,
            //     'nama_kategori_pemilu' => 'Pemilihan umum Presiden RI',
            // ],
            [
                'id' => 2,
                'nama_kategori_pemilu' => 'Pemilihan umum Legislatif DPR RI',
            ],
            [
                'id' => 3,
                'nama_kategori_pemilu' => 'Pemilihan umum Legislatif DPRD Provinsi',
            ],
            [
                'id' => 4,
                'nama_kategori_pemilu' => 'Pemilihan umum Legislatif DPRD Kab/Kota',
            ],
            // [
            //     'id' => 5,
            //     'nama_kategori_pemilu' => 'Pemilihan umum DPD',
            // ],
        ];

        foreach ($kategoriPemilu as $kaPem) {
            \App\Models\DataKategoriPemilu::create($kaPem);
        }
    }
}
