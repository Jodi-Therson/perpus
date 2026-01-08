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
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('author')->nullable();
            $table->string('isbn')->unique()->nullable();
            $table->string('publisher')->nullable();
            $table->year('publication_year')->nullable();
            $table->integer('pages')->nullable();
            $table->string('language')->nullable();
            $table->text('description')->nullable();
            $table->string('cover_path')->nullable();
            $table->unsignedInteger('total_copies')->default(1);
            $table->unsignedInteger('available_copies')->default(1);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index('author');
            $table->index('title');
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
