<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['review', 'rating'];
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    // the above function is needed to define one to many relationship
    // review belongs to book

    protected static function booted()
    {
        static::updated(fn(Review $review) => cache()->forget('book:' . $review->book_id));
        static::deleted(fn(Review $review) => cache()->forget('book:' . $review->book_id));
        // to forget the cache whenever review is updated
        //  when database is directly modified from laravel without loading the model.
    }
}
