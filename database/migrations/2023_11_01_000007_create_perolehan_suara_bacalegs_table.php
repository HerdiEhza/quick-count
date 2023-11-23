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
        Schema::create('perolehan_suara_bacalegs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('perolehan_suara_id');
            $table->unsignedBigInteger('data_bakal_calon_id');
            $table->string('suara');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perolehan_suara_bacalegs');
    }
};
