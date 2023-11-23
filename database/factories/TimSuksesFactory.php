<?php

namespace Database\Factories;

use App\Models\DataTps;
use App\Models\TimSukses;
use Illuminate\Database\Eloquent\Factories\Factory;

class TimSuksesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TimSukses::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tpsData = DataTps::findOrFail(rand(1, 2716));

        return [
            'nomor_ktp' => $this->faker->nik(),
            'nomor_hp' => $this->faker->phoneNumber(),
            'nama' => $this->faker->name(),
            'is_out_range' => $this->faker->boolean(0),
            // 'data_bakal_calon_id' => $this->faker->numberBetween(1, 200),
            'data_bakal_calon_id' => 127,
            'user_id' => $this->faker->numberBetween(500, 800),
            'data_tps_id' => $tpsData->id,
            'wilayah_kabupaten_kota_id' => $tpsData->wilayah_kabupaten_kota_id,
            'wilayah_kecamatan_id' => $tpsData->wilayah_kecamatan_id,
            'wilayah_kelurahan_desa_id' => $tpsData->wilayah_kelurahan_desa_id,
        ];
    }
}
