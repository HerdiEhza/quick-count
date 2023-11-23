<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tim_sukses', function (Blueprint $table) {
            $table
                ->foreign('data_bakal_calon_id')
                ->references('id')
                ->on('data_bakal_calons')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('data_tps_id')
                ->references('id')
                ->on('data_tps')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('wilayah_kabupaten_kota_id')
                ->references('id')
                ->on('wilayah_kabupaten_kotas')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('wilayah_kecamatan_id')
                ->references('id')
                ->on('wilayah_kecamatans')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('wilayah_kelurahan_desa_id')
                ->references('id')
                ->on('wilayah_kelurahan_desas')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tim_sukses', function (Blueprint $table) {
            $table->dropForeign(['data_bakal_calon_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['data_tps_id']);
            $table->dropForeign(['wilayah_kabupaten_kota_id']);
            $table->dropForeign(['wilayah_kecamatan_id']);
            $table->dropForeign(['wilayah_kelurahan_desa_id']);
        });
    }
};
