<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\PerolehanSuara;
use Illuminate\Database\Eloquent\Factories\Factory;

class PerolehanSuaraFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PerolehanSuara::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'suara_sah' => $this->faker->numberBetween(25, 39),
            'suara_tidak_sah' => $this->faker->numberBetween(25, 39),
            'foto_c1' => $this->faker->imageUrl(),
            'foto_ba' => $this->faker->imageUrl(),
            'user_id' => \App\Models\User::factory(),
            'data_tps_id' => $this->faker->numberBetween(1, 17622),
            'data_kategori_pemilu_id' => \App\Models\DataKategoriPemilu::factory(),
        ];
    }
}
