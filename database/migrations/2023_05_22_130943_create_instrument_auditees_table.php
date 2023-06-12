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
        Schema::create('instrument_auditees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instrument_id')->nullable()
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('data_instrument_id')->nullable()
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('proof_id')->nullable()
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('nama_instrument')->nullable();
            $table->string('nama_auditor')->nullable();
            $table->string('nama_auditee')->nullable();
            $table->string('nama_unit')->nullable();
            $table->string('tahun_instrument')->nullable();
            $table->enum('answer', ['ya', 'tidak'])->comment('jawaban dari auditee')->nullable();
            $table->enum('status', ['Valid', 'Tidak Valid'])->nullable()->comment('For Auditor');
            $table->string('reason')->comment('alasan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instrument_auditees');
    }
};
