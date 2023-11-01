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
        Schema::table('wilayah_kelurahan_desas', function (Blueprint $table) {
            $table
                ->foreign('wilayah_kecamatan_id')
                ->references('id')
                ->on('wilayah_kecamatans')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wilayah_kelurahan_desas', function (Blueprint $table) {
            $table->dropForeign(['wilayah_kecamatan_id']);
        });
    }
};
