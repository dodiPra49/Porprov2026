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
        Schema::create('match_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_id')->constrained('schedules')->onDelete('cascade');
            $table->foreignId('winner_athlete_id')->nullable()->constrained('athletes')->onDelete('set null');
            $table->foreignId('winner_contingent_id')->nullable()->constrained('contingents')->onDelete('set null');
            $table->string('score_summary'); // e.g. "3 - 1" atau "10.23 detik"
            $table->json('score_detail')->nullable(); // detail set, round, catatan poin
            $table->foreignId('verified_by')->nullable()->constrained('users')->onDelete('set null');
            $table->dateTime('verified_at')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('match_results');
    }
};
