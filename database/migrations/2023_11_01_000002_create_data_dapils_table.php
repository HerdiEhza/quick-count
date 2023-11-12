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
        Schema::create('data_dapils', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kategori_dapil');
            $table->string('nama_dapil');
            $table->unsignedBigInteger('kategori_pemilu_id');
            $table->string('jumlah_kursi')->nullable();
            $table->string('jumlah_penduduk')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_dapils');
    }
};
