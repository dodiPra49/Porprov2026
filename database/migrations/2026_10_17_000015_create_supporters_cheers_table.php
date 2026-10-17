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
        Schema::create('supporters_cheers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contingent_id')->constrained('contingents')->onDelete('cascade');
            $table->string('sender_name');
            $table->string('sender_city');
            $table->text('message');
            $table->unsignedInteger('likes_count')->default(0);
            $table->boolean('is_approved')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supporters_cheers');
    }
};
