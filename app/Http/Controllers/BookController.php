<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

// php artisan make:controller BookController --resource => this command is used to create this file
// this file will automatically implement the routes index,create ..... 
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = $request->input('title');
        $filter = $request->input('filter', '') ?? '';



        // The when method will execute the given callback 
        // when the first argument given to the method evaluates 
        // to true.

        $books = Book::when(
            $title, function ($query, $title) {
                $query->title($title);
            }
            // title is a custom filter defined in Book model
        );
        // ->withAvg('reviews', 'rating')->withCount('reviews')->paginate(5);

        $books = match ($filter) {
            '' => $books->withCount('reviews')->withAvg('reviews', 'rating')->latest(),
            'popular_last_month' => $books->popularLastMonth(),
            'popular_last_6months' => $books->popularLast6Months(),
            'highest_rated_last_month' => $books->highestRatedLastMonth(),
            'highest_rated_last_6months' => $books->highestRatedLast6Months(),
            'default' => $books->withCount('reviews')->withAvg('reviews', 'rating')->latest(),
        };

        // Expression 'match' is a short syntax for 'switch' that does not have 'break' or 'return'.


        // $books = $books->paginate();
        // cashing books
        $cacheKey = 'books:' . $filter . ':' . $title;
        $books = cache()->remember($cacheKey, 3600, fn() => $books->paginate());
        // if the key does not exist in the cache then the arrow function will be called 
        // and the result will be stored in the cache

        return view('index', [
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $cacheKey = 'book:' . $book->id;

        // caching the review list for every book
        $book = cache()->remember($cacheKey, 3600, fn() => $book->load([
            'reviews' => function ($query) {
                $query->latest();
            }
            // load reviews with specific filters
            // $book->load() => also returns the new book object
        ]));
        ;
        return view('show', [
            'book' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
