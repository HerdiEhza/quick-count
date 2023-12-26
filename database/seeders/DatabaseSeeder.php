<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\Caleg\SubandiSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $this->call(PermissionsSeeder::class);

        $this->call(DataKategoriPemiluSeeder::class);
        $this->call(DataDapilSeeder::class);
        $this->call(DataPartaiSeeder::class);
        $this->call(DataBakalCalonSeeder::class);
        $this->call(WilayahProvinsiSeeder::class);
        $this->call(WilayahKabupatenKotaSeeder::class);
        $this->call(WilayahKecamatanSeeder::class);
        $this->call(WilayahKelurahanDesaSeeder::class);
        $this->call(WilayahDapilSeeder::class);
        $this->call(DataTpsSeeder::class);

        $this->call(UserSeeder::class);

        // $this->call(SubandiSeeder::class);
        // $this->call(TimSuksesSeeder::class);

        // $this->call(PerolehanSuaraSeeder::class);
        // $this->call(PerolehanSuaraBacalegSeeder::class);
        // $this->call(PerolehanSuaraPartaiSeeder::class);
    }
}
