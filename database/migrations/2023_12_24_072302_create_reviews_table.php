<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('book_id');
            // Foreign key

            $table->text('review');
            $table->unsignedTinyInteger('rating');
            $table->timestamps();

            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            // defining relationship

            // $table->foreignId('book_id')->constrained()->cascadeOnDelete();
            // book_id => from this name laravel automatically determine it references
            // id of book table
            // we can replace above 2 line using this line 
            // new shorter syntax 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
