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
        Schema::table('perolehan_suara_bacalegs', function (Blueprint $table) {
            $table
                ->foreign('perolehan_suara_id')
                ->references('id')
                ->on('perolehan_suaras')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('data_bakal_calon_id')
                ->references('id')
                ->on('data_bakal_calons')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('perolehan_suara_bacalegs', function (Blueprint $table) {
            $table->dropForeign(['perolehan_suara_id']);
            $table->dropForeign(['data_bakal_calon_id']);
        });
    }
};
