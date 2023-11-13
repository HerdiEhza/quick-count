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
        Schema::create('user_data_tps_photo', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->constrained(
                table: 'users', indexName: 'photos_user_id'
            )->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreignId('data_tps_id')->nullable()->constrained(
                table: 'data_tps', indexName: 'photos_data_tps_id'
            )->cascadeOnDelete()->cascadeOnUpdate();

            $table->string('photo_path');

            $table->primary(['user_id', 'data_tps_id'], 'user_data_tps_photo_data_user_id_data_tps_id_primary');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_data_tps_photo');
    }
};
