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
        Schema::create('audit_lapangans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('audit_dokumen_id')->constrained();
            $table->text('hasil_temuan_audit')->nullable();
            // $table->enum('status_temuan_audit', ['Tercapai', 'Tidak Tercapai'])->nullable();
            $table->string('rekomendasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_lapangans');
    }
};
