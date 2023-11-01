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
        Schema::create('data_bakal_calons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('data_partai_id');
            $table->unsignedBigInteger('data_dapil_id');
            $table->string('nama_bakal_calon');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_bakal_calons');
    }
};
