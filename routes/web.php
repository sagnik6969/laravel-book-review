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
    // Book::where('title','LIKE','%qui%')->get();
    // middle argument is operator
    // write `->toSql()`in place of get to get the sql query

    // we can also add custom filters like where, take
    // the custom filter is defined in Book.php
    // Book::title('qui')->get(); 
    // Book::title('qui')->where('created_at','>','2023-9-01')->get();        
    // local query scopes can be chained with other filters()
});
