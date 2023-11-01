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
        Schema::create('wilayah_provinsis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_provinsi');
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
        Schema::dropIfExists('wilayah_provinsis');
    }
};
