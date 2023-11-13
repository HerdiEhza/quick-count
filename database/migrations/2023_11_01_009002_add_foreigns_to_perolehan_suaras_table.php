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
        Schema::table('perolehan_suaras', function (Blueprint $table) {
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
                ->foreign('data_kategori_pemilu_id')
                ->references('id')
                ->on('data_kategori_pemilus')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('data_dapil_id')
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
        Schema::table('perolehan_suaras', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['data_tps_id']);
            $table->dropForeign(['data_kategori_pemilu_id']);
            $table->dropForeign(['data_dapil_id']);
        });
    }
};
