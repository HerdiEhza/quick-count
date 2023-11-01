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
        Schema::create('wilayah_kecamatans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('wilayah_kabupaten_kota_id');
            $table->string('nama_kecamatan');
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
        Schema::dropIfExists('wilayah_kecamatans');
    }
};
