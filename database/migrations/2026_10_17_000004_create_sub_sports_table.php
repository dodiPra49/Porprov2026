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
        Schema::create('sub_sports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sport_id')->constrained('sports')->onDelete('cascade');
            $table->string('name'); // e.g. Kelas A Putra (45-50 kg)
            $table->string('code')->unique(); // e.g. SILAT-TANDING-A-PA
            $table->enum('gender_category', ['Putra', 'Putri', 'Campuran'])->default('Putra');
            $table->string('match_type')->default('tanding'); // tanding, seni, nomor_terukur
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_sports');
    }
};
