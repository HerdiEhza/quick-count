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
        Schema::create('perolehan_suaras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('suara_sah');
            $table->string('suara_tidak_sah');
            $table->string('foto_c1');
            $table->string('foto_ba');
            $table->unsignedBigInteger('data_tps_id');
            $table->unsignedBigInteger('data_kategori_pemilu_id');
            $table->unsignedBigInteger('data_dapil_id');
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perolehan_suaras');
    }
};
