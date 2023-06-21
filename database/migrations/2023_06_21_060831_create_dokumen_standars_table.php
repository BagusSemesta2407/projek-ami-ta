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
        Schema::create('dokumen_standars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_dokumen_mutu_standar_id')->nullable()
            ->constrained()
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen_standars');
    }
};
