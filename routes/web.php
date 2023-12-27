<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
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
// use \App\Models\Book;
// use \App\Models\Review;

Route::get('/', function () {

    return redirect()->route('books.index');

});


Route::resource('books', BookController::class)
    ->only(['index', 'show']);
// all routes except index and show will be disabled

// to use a scoped resource controller
Route::resource('books.reviews', ReviewController::class)
    ->scoped(['reviews' => 'book']) //reviews belongs to a particular book 
    ->only(['create', 'store']);

// the part of url comes after  books/{book} will be managed by ReviewController

// The scoped method is used to indicate that the reviews resource is scoped 
// within a specific book. This typically implies that the reviews are associated 
// with a particular book, and the routing should reflect this hierarchical 
// relationship.