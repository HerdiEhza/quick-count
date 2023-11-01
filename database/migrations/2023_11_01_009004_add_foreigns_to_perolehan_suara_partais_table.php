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
        Schema::table('perolehan_suara_partais', function (Blueprint $table) {
            $table
                ->foreign('perolehan_suara_id')
                ->references('id')
                ->on('perolehan_suaras')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('data_partai_id')
                ->references('id')
                ->on('data_partais')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('perolehan_suara_partais', function (Blueprint $table) {
            $table->dropForeign(['perolehan_suara_id']);
            $table->dropForeign(['data_partai_id']);
        });
    }
};
