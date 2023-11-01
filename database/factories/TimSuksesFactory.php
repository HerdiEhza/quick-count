<?php

namespace Database\Factories;

use App\Models\TimSukses;
use Illuminate\Support\Str;
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
        return [
            'nomor_ktp' => $this->faker->creditCardNumber(),
            'nomor_hp' => $this->faker->phoneNumber(),
            'nama' => $this->faker->name(),
            'is_out_range' => $this->faker->boolean(),
            'data_bakal_calon_id' => \App\Models\DataBakalCalon::factory(),
            'user_id' => \App\Models\User::factory(),
            'data_tps_id' => \App\Models\DataTps::factory(),
            'wilayah_kabupaten_kota_id' => \App\Models\WilayahKabupatenKota::factory(),
            'wilayah_kecamatan_id' => \App\Models\WilayahKecamatan::factory(),
            'wilayah_kelurahan_desa_id' => \App\Models\WilayahKelurahanDesa::factory(),
        ];
    }
}
