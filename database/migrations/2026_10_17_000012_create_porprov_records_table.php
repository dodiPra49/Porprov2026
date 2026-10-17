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
        Schema::create('porprov_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_sport_id')->constrained('sub_sports')->onDelete('cascade');
            $table->foreignId('athlete_id')->constrained('athletes')->onDelete('cascade');
            $table->foreignId('contingent_id')->constrained('contingents')->onDelete('cascade');
            $table->string('record_metric'); // e.g. "Lari 100 Meter Putra (Detik)"
            $table->string('previous_record'); // e.g. "10.45 dtk (Porprov 2022)"
            $table->string('new_record'); // e.g. "10.21 dtk"
            $table->date('achieved_at');
            $table->string('venue_name');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('porprov_records');
    }
};
