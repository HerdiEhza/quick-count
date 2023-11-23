<?php

namespace Database\Factories;

use App\Models\DataDapil;
use Illuminate\Database\Eloquent\Factories\Factory;

class DataDapilFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DataDapil::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_dapil' => $this->faker->city(),
        ];
    }
}
