<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\DataBakalCalon;
use Illuminate\Database\Eloquent\Factories\Factory;

class DataBakalCalonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DataBakalCalon::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_bakal_calon' => $this->faker->name(),
            'data_partai_id' => $this->faker->numberBetween(1, 20),
            'data_dapil_id' => $this->faker->numberBetween(1, 5),
            // 'data_partai_id' => \App\Models\DataPartai::factory(),
            // 'data_dapil_id' => \App\Models\DataDapil::factory(),
        ];
    }
}
