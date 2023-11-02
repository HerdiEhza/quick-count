<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\PerolehanSuaraPartai;
use Illuminate\Database\Eloquent\Factories\Factory;

class PerolehanSuaraPartaiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PerolehanSuaraPartai::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'suara' => $this->faker->numberBetween(25, 39),
            'perolehan_suara_id' => $this->faker->numberBetween(1, 200),
            'data_partai_id' => $this->faker->numberBetween(1, 20),
            // 'perolehan_suara_id' => \App\Models\PerolehanSuara::factory(),
            // 'data_partai_id' => \App\Models\DataPartai::factory(),
        ];
    }
}
