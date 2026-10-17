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
        Schema::create('medal_tallies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contingent_id')->unique()->constrained('contingents')->onDelete('cascade');
            $table->integer('gold')->default(0);
            $table->integer('silver')->default(0);
            $table->integer('bronze')->default(0);
            $table->integer('total_medals')->default(0);
            $table->integer('rank_position')->default(0);
            $table->dateTime('last_updated_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medal_tallies');
    }
};
