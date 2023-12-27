<?php

use App\Http\Controllers\BookController;
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


Route::resource('/books', BookController::class);
// to use BookController

// cashing
// redis => example of cash server
// we can retrieve data using key
// to configure where cash is stored config/cache.php
// default cash driver is file. => store cache in files 
// recommended is memcache or redis => store data in cache servers
