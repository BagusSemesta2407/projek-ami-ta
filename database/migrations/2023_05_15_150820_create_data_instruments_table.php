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
        Schema::create('data_instruments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('auditor_id')
                ->nullable()
                ->constrained('users');
            $table->foreignId('auditor2_id')
                ->nullable()
                ->constrained('users');
            // $table->foreignId('auditee_id')
            //     ->nullable()
            //     ->constrained('users')
            //     ->cascadeOnDelete()
            //     ->cascadeOnUpdate();
            $table->foreignId('category_unit_id')
                ->nullable()
                ->constrained();
            $table->enum('status', ['Menunggu Konfirmasi Kepala P4MP','Ditolak Kepala P4MP','On Progress', 'Sudah Di Jawab Auditee', 'Audit Lapangan', 'Selesai']);
            $table->json('dokumenStandar')->nullable();
            $table->date('tanggal_audit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_instruments');
    }
};
