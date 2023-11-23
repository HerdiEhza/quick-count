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
        Schema::create('user_timses_tps', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->constrained(
                table: 'users', indexName: 'timses_tps_user_id'
            )->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreignId('data_tps_id')->nullable()->constrained(
                table: 'data_tps', indexName: 'timses_tps_data_tps_id'
            )->cascadeOnDelete()->cascadeOnUpdate();

            $table->primary(['user_id', 'data_tps_id'], 'timses_tps_user_id_data_tps_id_primary');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_timses_tps');
    }
};
