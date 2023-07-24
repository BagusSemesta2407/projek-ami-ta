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
        Schema::create('tinjauan_pengendalians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('audit_lapangan_id')->constrained()->nullable();
            $table->enum('important', ['Important','Not Important']);
            $table->text('deskripsi_important')->nullable();
            $table->enum('urgent', ['Urgent','Not Urgent']);
            $table->text('deskripsi_urgent')->nullable();
            $table->text('rencana_tindak_lanjut')->nullable();
            $table->enum('anggaran', ['Anggaran','Non Anggaran']);
            $table->integer('jumlah_anggaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tinjauan_pengendalians');
    }
};
