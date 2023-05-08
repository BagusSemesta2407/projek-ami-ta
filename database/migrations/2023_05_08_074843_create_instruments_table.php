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
            $table->foreignId('category_unit_id')
            ->nullable()
            ->constrained()
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
            $table->enum('status_standar',['Pendidikan', 'Penelitian', 'Pengabdian Kepada Masyarakat'])->nullable();
            $table->string('name')->nullable();
            $table->enum('status',['Ya', 'Tidak'])->nullable();
            $table->string('keterangan')->nullable();
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
