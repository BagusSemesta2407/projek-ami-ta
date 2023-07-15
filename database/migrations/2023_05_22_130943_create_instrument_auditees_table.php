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
            // $table->foreignId('proof_id')->nullable()
            //     ->constrained()
            //     ->cascadeOnDelete()
            //     ->cascadeOnUpdate();
            $table->string('bukti')->nullable();
            $table->enum('status_ketercapaian',['Tercapai', 'Tidak Tercapai'])->nullable()->comment('for auditee');
            $table->text('deskripsi_ketercapaian')->nullable()->comment('for auditee');
            $table->text('hasil_audit_dokumen')->nullable()->comment('for auditor');
            $table->text('hasil_temuan_audit')->nullable()->comment('for auditor');
            $table->enum('status_temuan_audit', ['Tercapai', 'Tidak Tercapai'])->nullable()->comment('For Auditor');
            $table->enum('important',['Important','Not Important'])->nullable()->comment('for p4mp');
            $table->text('deskripsi_penting')->nullable();
            $table->text('deskripsi_tidak_penting')->nullable();
            $table->enum('urgent',['Urgent','Not Urgent'])->nullable()->comment('for p4mp');
            $table->text('deskripsi_urgent')->nullable();
            $table->text('deskripsi_tidak_urgent')->nullable();
            $table->string('anggaran')->nullable();
            $table->text('tindak_lanjut')->nullable()->comment('for p4mp');
            $table->string('rekomendasi')->nullable();
            $table->string('change_dokumen')->comment('alasan')->nullable();
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
