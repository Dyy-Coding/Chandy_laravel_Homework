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
        Schema::create('_authors', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Unique identifier
            $table->string("name");
            $table->string("bio");
            $table->string("nationality");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_authors');
    }
};
