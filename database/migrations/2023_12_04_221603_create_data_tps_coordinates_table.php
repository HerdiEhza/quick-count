<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_tps_coordinates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_tps_id')->nullable()->constrained(
                table: 'data_tps',
                indexName: 'coordinate_data_tps_id'
            )->cascadeOnDelete()->cascadeOnUpdate();

            $table->string('latitude');
            $table->string('longitude');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_tps_coordinates');
    }
};
