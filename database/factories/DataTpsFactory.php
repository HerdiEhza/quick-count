<?php

namespace Database\Factories;

use App\Models\DataTps;
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
            'wilayah_provinsi_id' => $this->faker->numberBetween(1, 1),
            'wilayah_kabupaten_kota_id' => $this->faker->numberBetween(1, 14),
            'wilayah_kecamatan_id' => $this->faker->numberBetween(1, 174),
            'wilayah_kelurahan_desa_id' => $this->faker->numberBetween(1, 1),
            'data_dapil_ri_id' => $this->faker->numberBetween(1, 2),
            'data_dapil_prov_id' => $this->faker->numberBetween(3, 10),
            'data_dapil_kab_kota_id' => $this->faker->numberBetween(11, 73),
        ];
    }
}
