<?php

namespace Database\Factories;

use App\Models\DataTps;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class DataTpsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DataTps::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_tps' => $this->faker->lexify('TPS-##'),
            'alamat_tps' => $this->faker->address(),
            'jumlah_dpt' => $this->faker->numberBetween(25, 39),
            'wilayah_provinsi_id' => \App\Models\WilayahProvinsi::factory(),
            'wilayah_kabupaten_kota_id' => \App\Models\WilayahKabupatenKota::factory(),
            'wilayah_kecamatan_id' => \App\Models\WilayahKecamatan::factory(),
            'wilayah_kelurahan_desa_id' => \App\Models\WilayahKelurahanDesa::factory(),
            'data_dapil_ri_id' => \App\Models\DataDapil::factory(),
            'data_dapil_prov_id' => \App\Models\DataDapil::factory(),
            'data_dapil_kab_kota_id' => \App\Models\DataDapil::factory(),
        ];
    }
}
