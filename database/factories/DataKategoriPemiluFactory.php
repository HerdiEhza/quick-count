<?php

namespace Database\Factories;

use App\Models\DataKategoriPemilu;
use Illuminate\Database\Eloquent\Factories\Factory;

class DataKategoriPemiluFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DataKategoriPemilu::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_kategori_pemilu' => $this->faker->text(12),
        ];
    }
}
