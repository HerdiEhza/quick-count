<?php

namespace Database\Factories;

use App\Models\DataPartai;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class DataPartaiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DataPartai::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_partai' => $this->faker->text(9),
            'logo_partai' => $this->faker->imageUrl(),
        ];
    }
}
