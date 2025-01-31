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
        Schema::create('educational_content_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('educational_content_id')->constrained()->onDelete('cascade'); // Foreign key to educational_contents
            $table->string('file_name'); // Name of the file
            $table->string('file_path'); // Path to the file
            $table->string('file_type'); // Type of the file (e.g., video, document, audio)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educational_content_files');
    }
};
