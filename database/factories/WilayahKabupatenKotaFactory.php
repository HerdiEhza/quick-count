<?php

namespace Database\Factories;

use App\Models\WilayahKabupatenKota;
use Illuminate\Database\Eloquent\Factories\Factory;

class WilayahKabupatenKotaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WilayahKabupatenKota::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_kabupaten_kota' => $this->faker->city(),
            'jumlah_tps' => $this->faker->numberBetween(25, 39),
            'jumlah_dpt' => $this->faker->numberBetween(25, 39),
            'wilayah_provinsi_id' => \App\Models\WilayahProvinsi::factory(),
        ];
    }
}
