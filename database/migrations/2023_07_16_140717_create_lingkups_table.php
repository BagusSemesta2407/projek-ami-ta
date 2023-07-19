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
        Schema::create('lingkups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_instrument_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('deskripsi_lingkup')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lingkups');
    }
};
