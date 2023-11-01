<?php

namespace Database\Factories;

use Illuminate\Support\Str;
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
            'suara' => $this->faker->numberBetween(25, 39),
            'perolehan_suara_id' => \App\Models\PerolehanSuara::factory(),
            'data_bakal_calon_id' => \App\Models\DataBakalCalon::factory(),
        ];
    }
}
