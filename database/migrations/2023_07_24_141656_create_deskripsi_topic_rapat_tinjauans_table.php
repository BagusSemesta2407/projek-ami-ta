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
        Schema::create('deskripsi_topic_rapat_tinjauans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('topic_id')->constrained();
            $table->text('deskripsi_rapat_tinnjauan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deskripsi_topic_rapat_tinjauans');
    }
};
