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
        Schema::create('perolehan_suara_partais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('perolehan_suara_id');
            $table->unsignedBigInteger('data_partai_id');
            $table->string('suara');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perolehan_suara_partais');
    }
};
