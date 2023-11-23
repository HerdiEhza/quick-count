<?php

namespace Database\Factories;

use App\Models\WilayahKelurahanDesa;
use Illuminate\Database\Eloquent\Factories\Factory;

class WilayahKelurahanDesaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WilayahKelurahanDesa::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_kelurahan_desa' => $this->faker->city(),
            'jumlah_tps' => $this->faker->numberBetween(25, 39),
            'jumlah_dpt' => $this->faker->numberBetween(25, 39),
            'wilayah_kecamatan_id' => \App\Models\WilayahKecamatan::factory(),
        ];
    }
}
