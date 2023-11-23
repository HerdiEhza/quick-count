<?php

namespace Database\Factories;

use App\Models\PerolehanSuaraBacaleg;
use Illuminate\Database\Eloquent\Factories\Factory;

class PerolehanSuaraBacalegFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PerolehanSuaraBacaleg::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'suara' => $this->faker->numberBetween(25, 69),
            'perolehan_suara_id' => $this->faker->numberBetween(1, 200),
            'data_bakal_calon_id' => $this->faker->numberBetween(1, 927),
            // 'perolehan_suara_id' => \App\Models\PerolehanSuara::factory(),
            // 'data_bakal_calon_id' => \App\Models\DataBakalCalon::factory(),
        ];
    }
}
