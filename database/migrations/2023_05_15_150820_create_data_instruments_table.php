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
                ->constrained('auditors');
            $table->foreignId('auditor2_id')
                ->nullable()
                ->constrained('auditors');
            $table->foreignId('jurusan_id')->nullable()
            ->constrained();
            $table->foreignId('program_studi_id')->nullable()
            ->constrained();
            $table->foreignId('unit_id')->nullable()
            ->constrained();
            $table->foreignId('auditee_id')->nullable()
            ->constrained('users');
            $table->enum('kategori_audit',['Unit','Program Studi','Jurusan'])->nullable();
            $table->enum('status', ['Menunggu Konfirmasi Kepala P4MP','Ditolak Kepala P4MP','On Progress', 'Sudah Di Jawab Auditee', 'Audit Lapangan', 'Selesai']);
            $table->string('alasan_tolak')->nullable();
            $table->text('kesimpulan')->nullable();
            $table->string('file')->nullable();
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
