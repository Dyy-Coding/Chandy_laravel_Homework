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
        Schema::create('books', function (Blueprint $table) {
    $table->id(); // Auto-incrementing BIGINT primary key
    $table->uuid('author_id');
    $table->string('title');
    $table->string('isbn')->unique();
    $table->year('publication_year');
    $table->string('genre');
    $table->integer('available_copies');
    $table->timestamps();

    // Uncomment if foreign key is used
    // $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
