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
        Schema::create('audit_dokumens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evaluasi_diri_id')->constrained();
            $table->enum('status_ketercapaian_auditor_1', ['Tercapai', 'Tidak Tercapai'])->nullable();
            $table->text('deskripsi_auditor_1')->nullable();
            $table->string('daftar_tilik_auditor_1')->nullable();
            $table->enum('status_ketercapaian_auditor_2', ['Tercapai', 'Tidak Tercapai'])->nullable();
            $table->text('deskripsi_auditor_2')->nullable();
            $table->string('daftar_tilik_auditor_2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_dokumens');
    }
};
