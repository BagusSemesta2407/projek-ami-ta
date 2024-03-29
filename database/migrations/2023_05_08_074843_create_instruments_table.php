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
        Schema::create('instruments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jurusan_id')
            ->nullable()
            ->constrained()
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
            $table->foreignId('program_studi_id')
            ->nullable()
            ->constrained()
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
            $table->foreignId('unit_id')
            ->nullable()
            ->constrained()
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
            $table->enum('kategori_audit_instrument',['Unit','Program Studi','Jurusan'])->nullable();
            $table->enum('status_standar', ['Pendidikan', 'Penelitian', 'Pengabdian Kepada Masyarakat'])->nullable();
            $table->string('name')->nullable();
            $table->string('target')->nullable();
            $table->enum('status_ketercapaian', ['Tercapai', 'Tidak Tercapai'])->default('Tidak Tercapai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instruments');
    }
};
