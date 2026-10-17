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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('document_type'); // thb, sk, regulasi, hasil_resmi
            $table->string('file_path');
            $table->integer('file_size_kb')->default(1024);
            $table->string('file_format', 10)->default('pdf');
            $table->foreignId('sport_id')->nullable()->constrained('sports')->onDelete('set null');
            $table->unsignedInteger('download_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
