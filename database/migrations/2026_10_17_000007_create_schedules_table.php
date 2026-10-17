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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_sport_id')->constrained('sub_sports')->onDelete('cascade');
            $table->foreignId('venue_id')->constrained('venues')->onDelete('cascade');
            $table->string('match_code')->unique(); // e.g. MATCH-SILAT-001
            $table->string('round_name'); // e.g. Babak Penyisihan, Perempat Final, Final
            $table->dateTime('scheduled_at');
            $table->dateTime('finished_at')->nullable();
            $table->enum('status', ['upcoming', 'ongoing', 'completed', 'postponed'])->default('upcoming');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
