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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('type', ['photo', 'video', 'live_stream'])->default('photo');
            $table->string('media_url'); // Path foto atau URL embed streaming YouTube
            $table->string('thumbnail_url')->nullable();
            $table->text('caption')->nullable();
            $table->foreignId('sport_id')->nullable()->constrained('sports')->onDelete('set null');
            $table->dateTime('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
