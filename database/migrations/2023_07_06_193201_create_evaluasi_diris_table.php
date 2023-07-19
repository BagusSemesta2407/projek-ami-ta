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
        Schema::create('evaluasi_diris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_instrument_id')
            ->constrained();
            $table->foreignId('instrument_id')->constrained();
            $table->enum('status_ketercapaian',['Tercapai', 'Tidak Tercapai'])->nullable();
            $table->text('deskripsi_ketercapaian')->nullable()->comment('for auditee');
            $table->string('bukti')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluasi_diris');
    }
};
