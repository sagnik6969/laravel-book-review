<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use \App\Models\Book;
use \App\Models\Review;

Route::get('/', function () {
    // dd(\App\Models\Book::find(1));
    // To get book without review
    

    // $book = \App\Models\Book::find(1);
    // dd($book->reviews);
    // TO get all the reviews in a book

    // dd(\App\Models\Book::with('reviews')->find(1));
    // To get books along with reviews at once

    // dd(\App\Models\Book::with('reviews')->take(4)->get());
    // To get 4 books with reviews

    // lazy loading loading the data only when it is needed
    // $book = \App\Models\Book::find(1);
    // dd($book->reviews); => lazy loading
    // eager loading loading all the data at once


    // $book = \App\Models\Book::find(2);
    // $book->load('reviews'); // loads reviews into the book object
    // Load method lets you load 1 or more relationships you can add 
    // them separated by comma or you can pass an array


    // to save a review
    // 1st method
    // $review = new \App\Models\Review();
    // $review->review = 'Good';
    // $review->rating = 5;
    // $review->book_id = 1;
    // $review->save();

    // 2nd method
    // $review = new \App\Models\Review();
    // $review->review = 'Good';
    // $review->rating = 5;
    // $book = \App\Models\Book::find(1);
    // $book->reviews()->save($review);
    // dd($book);

    // 3rd method
    // $book = \App\Models\Book::find(1);
    // $book->reviews()->create(['review' => 'good', 'rating' => 5]);
    // dd($book);

    // to find a book related to review
    // dd(\App\Models\Review::find(1)->book);


    // To move the review from one book to another
    // $review = \App\Models\Review::find(1);
    // \App\Models\Book::all()->firstWhere('id',2)->reviews()->save($review);

    
});
