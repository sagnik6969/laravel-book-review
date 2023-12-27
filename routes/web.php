<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('books.index');
});

Route::resource('books', BookController::class)
    ->only(['index', 'show']);

Route::resource('books.reviews', ReviewController::class)
    ->scoped(['reviews' => 'book']) //reviews belongs to a particular book 
    ->only(['create', 'store']);


// Rate limiting => use same melanisms as storing cache
// middlewares contains logic that is performed while executing every request.
// all the middlewares are defined in app/http/kernel.php inside $middleware variable