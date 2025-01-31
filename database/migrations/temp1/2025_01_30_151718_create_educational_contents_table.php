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
        Schema::create('educational_contents', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Content title
            $table->text('description')->nullable(); // Content description
            $table->integer('price')->default(0); // Price of the content (0 = free)
            $table->float('discount', 8, 2)->default(0); // Discount value (float)
            $table->enum('discount_type', ['amount', 'percent'])->default('amount'); // Discount type: amount or percent
            $table->softDeletes(); // For soft deletes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educational_contents');
    }
};
