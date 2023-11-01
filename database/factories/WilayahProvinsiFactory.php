<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\WilayahProvinsi;
use Illuminate\Database\Eloquent\Factories\Factory;

class WilayahProvinsiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WilayahProvinsi::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_provinsi' => $this->faker->city(),
            'jumlah_tps' => $this->faker->numberBetween(25, 39),
            'jumlah_dpt' => $this->faker->numberBetween(25, 39),
        ];
    }
}
