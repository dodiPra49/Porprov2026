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
        Schema::create('sports', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g. Pencak Silat
            $table->string('slug')->unique();
            $table->string('category')->default('Bela Diri'); // Bela Diri, Permainan, Terukur, Akurasi
            $table->string('icon_url')->nullable();
            $table->string('person_in_charge')->nullable(); // Technical Delegate
            $table->text('rules_summary')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sports');
    }
};
