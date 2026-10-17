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
        Schema::create('contingents', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g. Kota Padang
            $table->string('code', 10)->unique(); // e.g. PDG
            $table->string('leader_name'); // Ketua Kontingen
            $table->string('contact_phone')->nullable();
            $table->string('logo_url')->nullable();
            $table->string('color_hex', 10)->default('#E11D48'); // Warna identitas kontingen
            $table->integer('official_count')->default(0);
            $table->integer('athlete_count')->default(0);
            $table->integer('target_gold')->default(0);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contingents');
    }
};
