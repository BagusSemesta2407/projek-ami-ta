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
        Schema::create('program_studis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jurusan_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->nullable();
            // $table->string('jenjang')->nullable();
            $table->foreignId('jenjang_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->nullable();
            $table->string('name')->nullable()->comment('nama program studi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_studis');
    }
};
