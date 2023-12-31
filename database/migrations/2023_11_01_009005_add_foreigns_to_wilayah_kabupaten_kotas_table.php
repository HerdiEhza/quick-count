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
        Schema::table('wilayah_kabupaten_kotas', function (Blueprint $table) {
            $table
                ->foreign('wilayah_provinsi_id')
                ->references('id')
                ->on('wilayah_provinsis')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wilayah_kabupaten_kotas', function (Blueprint $table) {
            $table->dropForeign(['wilayah_provinsi_id']);
        });
    }
};
