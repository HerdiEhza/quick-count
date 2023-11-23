<?php

namespace Database\Seeders;

use App\Models\DataPartai;
use Illuminate\Database\Seeder;

class DataPartaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DataPartai::factory()
        //     ->count(20)
        //     ->create();

        $partai = [
            [
                'nomor_urut' => 1,
                'nama_partai' => 'Partai Kebangkitan Bangsa',
                'logo_partai' => 'Logo_PKB.svg',
            ],
            [
                'nomor_urut' => 2,
                'nama_partai' => 'Partai Gerakan Indonesia Raya',
                'logo_partai' => 'Logo_Gerindra.svg',
            ],
            [
                'nomor_urut' => 3,
                'nama_partai' => 'Partai Demokrasi Indonesia Perjuangan',
                'logo_partai' => 'Logo_PDI-P.svg',
            ],
            [
                'nomor_urut' => 4,
                'nama_partai' => 'Partai Golongan Karya',
                'logo_partai' => 'Logo_Golkar.svg',
            ],
            [
                'nomor_urut' => 5,
                'nama_partai' => 'Partai Nasional Demokrat',
                'logo_partai' => 'Partai_NasDem.svg',
            ],
            [
                'nomor_urut' => 6,
                'nama_partai' => 'Partai Buruh',
                'logo_partai' => 'Logo_Partai_Buruh.png',
            ],
            [
                'nomor_urut' => 7,
                'nama_partai' => 'Partai Gelombang Rakyat Indonesia',
                'logo_partai' => 'Logo_partai_gelora.png',
            ],
            [
                'nomor_urut' => 8,
                'nama_partai' => 'Partai Keadilan Sejahtera',
                'logo_partai' => 'PKS_logo_2020.png',
            ],
            [
                'nomor_urut' => 9,
                'nama_partai' => 'Partai Kebangkitan Nusantara',
                'logo_partai' => 'Bendera_Partai_Kebangkitan_Nusantara.svg',
            ],
            [
                'nomor_urut' => 10,
                'nama_partai' => 'Partai Hati Nurani Rakyat',
                'logo_partai' => 'Logo_Hanura.svg',
            ],
            [
                'nomor_urut' => 11,
                'nama_partai' => 'Partai Garda Republik Indonesia',
                'logo_partai' => 'Logo_Partai_Garda_Republik_Indonesia.png',
            ],
            [
                'nomor_urut' => 12,
                'nama_partai' => 'Partai Amanat Nasional',
                'logo_partai' => 'Logo_PAN.svg',
            ],
            [
                'nomor_urut' => 13,
                'nama_partai' => 'Partai Bulan Bintang',
                'logo_partai' => 'Bulan_Bintang.jpg',
            ],
            [
                'nomor_urut' => 14,
                'nama_partai' => 'Partai Demokrat',
                'logo_partai' => 'Logo_of_the_Democratic_Party_(Indonesia).svg',
            ],
            [
                'nomor_urut' => 15,
                'nama_partai' => 'Partai Solidaritas Indonesia',
                'logo_partai' => 'Logo_of_Indonesian_Solidarity_Party.svg',
            ],
            [
                'nomor_urut' => 16,
                'nama_partai' => 'Partai PERINDO',
                'logo_partai' => 'Logo_Partai_Perindo.png',
            ],
            [
                'nomor_urut' => 17,
                'nama_partai' => 'Partai Persatuan Pembangunan',
                'logo_partai' => 'Logo_PPP.svg',
            ],
            [
                'nomor_urut' => 18,
                'nama_partai' => 'Partai Ummat',
                'logo_partai' => 'Ummah_Party_Logo.png',
            ],
        ];

        foreach ($partai as $data) {
            \App\Models\DataPartai::create($data);
        }
    }
}
