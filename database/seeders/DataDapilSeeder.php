<?php

namespace Database\Seeders;

use App\Models\DataDapil;
use Illuminate\Database\Seeder;

class DataDapilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DataDapil::factory()
        //     ->count(5)
        //     ->create();

        DataDapil::create([
            'kategori_dapil' => "DPR RI",
            'nama_dapil' => "KALBAR 1",
            'kategori_pemilu_id' => 2,
            'jumlah_kursi' => 8,
        ]);

        DataDapil::create([
            'kategori_dapil' => "DPR RI",
            'nama_dapil' => "KALBAR 2",
            'kategori_pemilu_id' => 2,
            'jumlah_kursi' => 4,
        ]);

        DataDapil::create([
            'kategori_dapil' => "DPRD Provinsi",
            'nama_dapil' => "KALIMANTAN BARAT 1",
            'kategori_pemilu_id' => 3,
            'jumlah_kursi' => 8,
        ]);

        DataDapil::create([
            'kategori_dapil' => "DPRD Provinsi",
            'nama_dapil' => "KALIMANTAN BARAT 2",
            'kategori_pemilu_id' => 3,
            'jumlah_kursi' => 11,
        ]);

        DataDapil::create([
            'kategori_dapil' => "DPRD Provinsi",
            'nama_dapil' => "KALIMANTAN BARAT 3",
            'kategori_pemilu_id' => 3,
            'jumlah_kursi' => 6,
        ]);

        DataDapil::create([
            'kategori_dapil' => "DPRD Provinsi",
            'nama_dapil' => "KALIMANTAN BARAT 4",
            'kategori_pemilu_id' => 3,
            'jumlah_kursi' => 8,
        ]);

        DataDapil::create([
            'kategori_dapil' => "DPRD Provinsi",
            'nama_dapil' => "KALIMANTAN BARAT 5",
            'kategori_pemilu_id' => 3,
            'jumlah_kursi' => 5,
        ]);

        DataDapil::create([
            'kategori_dapil' => "DPRD Provinsi",
            'nama_dapil' => "KALIMANTAN BARAT 6",
            'kategori_pemilu_id' => 3,
            'jumlah_kursi' => 8,
        ]);

        DataDapil::create([
            'kategori_dapil' => "DPRD Provinsi",
            'nama_dapil' => "KALIMANTAN BARAT 7",
            'kategori_pemilu_id' => 3,
            'jumlah_kursi' => 11,
        ]);

        DataDapil::create([
            'kategori_dapil' => "DPRD Provinsi",
            'nama_dapil' => "KALIMANTAN BARAT 8",
            'kategori_pemilu_id' => 3,
            'jumlah_kursi' => 8,
        ]);

        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "SAMBAS 1",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 7,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "SAMBAS 2",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 7,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "SAMBAS 3",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 5,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "SAMBAS 4",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 6,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "SAMBAS 5",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 6,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "SAMBAS 6",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 7,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "SAMBAS 7",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 7,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "MEMPAWAH 1",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 9,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "MEMPAWAH 2",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 7,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "MEMPAWAH 3",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 9,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "MEMPAWAH 4",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 10,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "SANGGAU 1",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 7,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "SANGGAU 2",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 9,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "SANGGAU 3",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 9,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "SANGGAU 4",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 9,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "SANGGAU 5",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 6,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "KETAPANG 1",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 10,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "KETAPANG 2",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 5,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "KETAPANG 3",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 7,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "KETAPANG 4",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 6,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "KETAPANG 5",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 5,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "KETAPANG 6",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 5,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "KETAPANG 7",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 7,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "SINTANG 1",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 7,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "SINTANG 2",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 9,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "SINTANG 3",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 8,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "SINTANG 4",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 5,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "SINTANG 5",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 3,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "SINTANG 6",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 8,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "KAPUAS HULU 1",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 7,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "KAPUAS HULU 2",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 8,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "KAPUAS HULU 3",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 8,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "KAPUAS HULU 4",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 7,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "BENGKAYANG 1",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 7,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "BENGKAYANG 2",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 6,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "BENGKAYANG 3",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 4,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "BENGKAYANG 4",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 6,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "BENGKAYANG 5",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 7,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "LANDAK 1",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 11,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "LANDAK 2",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 12,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "LANDAK 3",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 8,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "LANDAK 4",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 5,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "LANDAK 5",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 4,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "SEKADAU 1",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 10,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "SEKADAU 2",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 12,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "SEKADAU 3",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 8,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "MELAWI 1",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 11,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "MELAWI 2",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 5,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "MELAWI 3",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 9,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "MELAWI 4",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 5,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "KAYONG UTARA 1",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 6,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "KAYONG UTARA 2",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 4,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "KAYONG UTARA 3",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 7,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "KAYONG UTARA 4",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 8,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "KUBU RAYA 1",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 8,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "KUBU RAYA 2",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 5,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "KUBU RAYA 3",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 4,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "KUBU RAYA 4",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 7,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "KUBU RAYA 5",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 4,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "KUBU RAYA 6",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 9,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "KUBU RAYA 7",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 8,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "KOTA PONTIANAK 1",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 8,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "KOTA PONTIANAK 2",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 10,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "KOTA PONTIANAK 3",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 10,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "KOTA PONTIANAK 4",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 7,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "KOTA PONTIANAK 5",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 10,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "KOTA SINGKAWANG 1",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 7,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "KOTA SINGKAWANG 2",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 9,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "KOTA SINGKAWANG 3",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 7,
        ]);
        DataDapil::create([
            'kategori_dapil' => "DPRD Kabupaten / Kota",
            'nama_dapil' => "KOTA SINGKAWANG 4",
            'kategori_pemilu_id' => 4,
            'jumlah_kursi' => 7,
        ]);
    }
}
