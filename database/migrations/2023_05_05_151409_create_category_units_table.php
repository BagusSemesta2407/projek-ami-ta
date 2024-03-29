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
        Schema::create('category_units', function (Blueprint $table) {
            $table->id();
            $table->enum('kategori_audit',['Unit','Program Studi','Jurusan'])->nullable();
            $table->foreignId('user_id')->constrained();
            $table->string('name')->nullable();
            $table->string('jenjang')->nullable();
            $table->string('kepala')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_units');
    }
};
