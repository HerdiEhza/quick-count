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
        Schema::create('wilayah_kelurahan_desas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('wilayah_kecamatan_id');
            $table->string('nama_kelurahan_desa');
            $table->string('jumlah_tps');
            $table->string('jumlah_dpt');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wilayah_kelurahan_desas');
    }
};
