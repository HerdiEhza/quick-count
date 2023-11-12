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
        Schema::create('data_dapil_has_wilayah_provinsis', function (Blueprint $table) {
            $table->foreignId('dapil_id')->nullable()->constrained(
                table: 'data_dapils', indexName: 'wilayah_provinsis_dapil_id'
            )->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreignId('provinsi_id')->nullable()->constrained(
                table: 'wilayah_provinsis', indexName: 'wilayah_provinsis_provinsi_id'
            )->cascadeOnDelete()->cascadeOnUpdate();

            $table->primary(['dapil_id', 'provinsi_id'], 'data_dapil_has_wilayah_provinsis_data_dapil_id_provinsi_id_primary');
        });

        Schema::create('data_dapil_has_wilayah_kabupaten_kotas', function (Blueprint $table) {
            $table->foreignId('dapil_id')->nullable()->constrained(
                table: 'data_dapils', indexName: 'wilayah_kabupaten_kotas_dapil_id'
            )->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreignId('kabupaten_kota_id')->nullable()->constrained(
                table: 'wilayah_kabupaten_kotas', indexName: 'wilayah_kabupaten_kotas_kabupaten_kota_id'
            )->cascadeOnDelete()->cascadeOnUpdate();

            $table->primary(['dapil_id', 'kabupaten_kota_id'], 'data_dapil_has_wilayah_kabupaten_kotas_data_dapil_id_kabupaten_kota_id_primary');
        });

        Schema::create('data_dapil_has_wilayah_kecamatans', function (Blueprint $table) {
            $table->foreignId('dapil_id')->nullable()->constrained(
                table: 'data_dapils', indexName: 'wilayah_kecamatans_dapil_id'
            )->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreignId('kecamatan_id')->nullable()->constrained(
                table: 'wilayah_kecamatans', indexName: 'wilayah_kecamatans_kecamatan_id'
            )->cascadeOnDelete()->cascadeOnUpdate();

            $table->primary(['dapil_id', 'kecamatan_id'], 'data_dapil_has_wilayah_kecamatans_data_dapil_id_kecamatan_id_primary');
        });

        Schema::create('data_dapil_has_wilayah_kelurahan_desas', function (Blueprint $table) {
            $table->foreignId('dapil_id')->nullable()->constrained(
                table: 'data_dapils', indexName: 'wilayah_kelurahan_desas_dapil_id'
            )->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreignId('kelurahan_desa_id')->nullable()->constrained(
                table: 'wilayah_kelurahan_desas', indexName: 'wilayah_kelurahan_desas_kelurahan_desa_id'
            )->cascadeOnDelete()->cascadeOnUpdate();

            $table->primary(['dapil_id', 'kelurahan_desa_id'], 'data_dapil_has_wilayah_kelurahan_desas_data_dapil_id_kelurahan_desa_id_primary');
        });

        Schema::create('data_dapil_has_data_partais', function (Blueprint $table) {
            $table->foreignId('dapil_id')->nullable()->constrained(
                table: 'data_dapils', indexName: 'dapil_has_partai_data_dapil_id'
            )->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreignId('data_partai_id')->nullable()->constrained(
                table: 'data_partais', indexName: 'dapil_has_partai_data_partai_id'
            )->cascadeOnDelete()->cascadeOnUpdate();

            $table->primary(['dapil_id', 'data_partai_id'], 'data_dapil_has_data_partai_data_dapil_id_data_partai_id_primary');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_dapil_has_wilayah_provinsis');
        Schema::dropIfExists('data_dapil_has_wilayah_kabupaten_kotas');
        Schema::dropIfExists('data_dapil_has_wilayah_kecamatans');
        Schema::dropIfExists('data_dapil_has_wilayah_kelurahan_desas');
    }
};
