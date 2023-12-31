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
        Schema::create('data_partais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomor_urut');
            $table->string('nama_partai');
            $table->string('logo_partai');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_partais');
    }
};
