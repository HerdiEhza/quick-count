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
        Schema::create('user_pemantau_wilayah_kelurahan_desa', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->constrained(
                table: 'users',
                indexName: 'pemantau_user_id'
            )->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreignId('wilayah_kelurahan_desa_id')->nullable()->constrained(
                table: 'data_tps',
                indexName: 'pemantau_wilayah_kelurahan_desa_id'
            )->cascadeOnDelete()->cascadeOnUpdate();

            $table->primary(['user_id', 'wilayah_kelurahan_desa_id'], 'user_pemantau_wilayah_kelurahan_desa_data_user_id_wilayah_kelurahan_desa_id_primary');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_pemantau_wilayah_kelurahan_desa');
    }
};
