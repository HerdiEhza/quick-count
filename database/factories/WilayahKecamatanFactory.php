<?php

namespace Database\Factories;

use App\Models\WilayahKecamatan;
use Illuminate\Database\Eloquent\Factories\Factory;

class WilayahKecamatanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WilayahKecamatan::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_kecamatan' => $this->faker->city(),
            'jumlah_tps' => $this->faker->numberBetween(25, 39),
            'jumlah_dpt' => $this->faker->numberBetween(25, 39),
            'wilayah_kabupaten_kota_id' => \App\Models\WilayahKabupatenKota::factory(),
        ];
    }
}
