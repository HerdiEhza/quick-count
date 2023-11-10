<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_tps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_tps');
            $table->string('alamat_tps')->nullable();
            $table->string('jumlah_dpt')->nullable();
            $table->unsignedBigInteger('wilayah_provinsi_id');
            $table->unsignedBigInteger('wilayah_kabupaten_kota_id');
            $table->unsignedBigInteger('wilayah_kecamatan_id');
            $table->unsignedBigInteger('wilayah_kelurahan_desa_id');
            $table->unsignedBigInteger('data_dapil_ri_id')->nullable();
            $table->unsignedBigInteger('data_dapil_prov_id')->nullable();
            $table->unsignedBigInteger('data_dapil_kab_kota_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_tps');
    }
};
