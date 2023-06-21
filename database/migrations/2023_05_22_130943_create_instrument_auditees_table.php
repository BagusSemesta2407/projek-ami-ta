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
            $table->enum('status_ketercapaian',['Tercapai', 'Tidak Tercapai'])->nullable()->comment('for auditee');
            $table->string('deskripsi_ketercapaian')->nullable()->comment('for auditee');
            $table->string('hasil_audit_dokumen')->nullable()->comment('for auditor');
            $table->string('hasil_temuan_audit')->nullable()->comment('for auditor');
            $table->enum('status_temuan_audit', ['Tercapai', 'Tidak Tercapai'])->nullable()->comment('For Auditor');
            $table->string('rekomendasi')->nullable();
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
