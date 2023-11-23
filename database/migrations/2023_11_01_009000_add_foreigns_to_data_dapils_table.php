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
        Schema::table('data_dapils', function (Blueprint $table) {
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
        Schema::table('data_dapils', function (Blueprint $table) {
            $table->dropForeign(['kategori_pemilu_id']);
        });
    }
};
