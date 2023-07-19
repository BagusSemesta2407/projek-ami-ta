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
        Schema::create('tinjauan_peningkatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dokumen_standar_id')->constrained();
            $table->foreignId('tinjauan_pengendalian_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tinjauan_peningkatans');
    }
};
