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
    // to get books with review count
    // App\Models\Book::withCount('reviews')->get();

    // to get most recent 3 books with review count
    // Book::withCount('reviews')->latest()->limit(3)->get(); 
    // limit works on query builders
    // take works on both query builders and laravel collections
    // in case of query builders take is just alias to limit 


    // order in which you call different query builder 
    //methods does not matter (** important)
    // Book::where('id',2)->take

    // To get books with highest average rating
    // Book::withAvg('reviews','rating')->orderBy('reviews_avg_rating','desc')->limit(5)->get();
    // Book::withCount('reviews')->having('reviews_count','>=','10')->withAvg('reviews','rating')->orderBy('reviews_avg_rating'
    
    // To find the Books with max rating which has at least 10 reviews 
    // App\Models\Book::withCount('reviews')->having('reviews_count','>=','10')->withAvg('reviews','rating')->orderBy('reviews_avg_rating'
    // ,'desc')->limit(4)->get()


    // => The order in which you call the query builder functions does not matter.
    // => but it is not always the case if you use order by the first order by takes precedence over 2nd order by.
    // App\Models\Book::popular()->highestRated()
    // popular(), highestRated() => are custom query builder functions



});
