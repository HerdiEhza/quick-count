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
        Schema::table('data_bakal_calons', function (Blueprint $table) {
            $table
                ->foreign('data_partai_id')
                ->references('id')
                ->on('data_partais')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('data_dapil_id')
                ->references('id')
                ->on('data_dapils')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('kategori_pemilu_id')
                ->references('id')
                ->on('data_kategori_pemilus')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_bakal_calons', function (Blueprint $table) {
            $table->dropForeign(['data_partai_id']);
            $table->dropForeign(['data_dapil_id']);
            $table->dropForeign(['kategori_pemilu_id']);
        });
    }
};
