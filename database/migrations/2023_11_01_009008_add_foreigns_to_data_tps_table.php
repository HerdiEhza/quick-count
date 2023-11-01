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
        Schema::table('data_tps', function (Blueprint $table) {
            $table
                ->foreign('wilayah_provinsi_id')
                ->references('id')
                ->on('wilayah_provinsis')
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

            $table
                ->foreign('data_dapil_ri_id')
                ->references('id')
                ->on('data_dapils')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('data_dapil_prov_id')
                ->references('id')
                ->on('data_dapils')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('data_dapil_kab_kota_id')
                ->references('id')
                ->on('data_dapils')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_tps', function (Blueprint $table) {
            $table->dropForeign(['wilayah_provinsi_id']);
            $table->dropForeign(['wilayah_kabupaten_kota_id']);
            $table->dropForeign(['wilayah_kecamatan_id']);
            $table->dropForeign(['wilayah_kelurahan_desa_id']);
            $table->dropForeign(['data_dapil_ri_id']);
            $table->dropForeign(['data_dapil_prov_id']);
            $table->dropForeign(['data_dapil_kab_kota_id']);
        });
    }
};
