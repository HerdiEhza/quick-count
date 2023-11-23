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
        Schema::table('wilayah_kecamatans', function (Blueprint $table) {
            $table
                ->foreign('wilayah_kabupaten_kota_id')
                ->references('id')
                ->on('wilayah_kabupaten_kotas')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wilayah_kecamatans', function (Blueprint $table) {
            $table->dropForeign(['wilayah_kabupaten_kota_id']);
        });
    }
};
