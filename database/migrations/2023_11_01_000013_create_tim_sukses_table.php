<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tim_sukses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomor_ktp');
            $table->string('nomor_hp');
            $table->string('nama');
            $table->unsignedBigInteger('data_bakal_calon_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('data_tps_id');
            $table->unsignedBigInteger('wilayah_kabupaten_kota_id');
            $table->unsignedBigInteger('wilayah_kecamatan_id');
            $table->unsignedBigInteger('wilayah_kelurahan_desa_id');
            $table->boolean('is_out_range')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tim_sukses');
    }
};
