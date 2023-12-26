<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Custom query function can be chained with query builders
    public function scopeTitle(Builder $query, string $title): Builder
    {
        return $query->where('title', 'LIKE', '%' . $title . '%');
    }

    public function scopePopular(Builder $query, $from = null, $to = null): Builder
    {
        return $query
            ->withCount([
                'reviews' =>
                    fn(Builder $q) => $this->dateRangeFilter($q, $from, $to)
                // The above is an example of arrow function.
                // arrow function do not need to use 'use' keyword.
                // arrow function can have only 1 expression.
            ])
            ->orderBy('reviews_count', 'DESC');
    }

    public function scopeHighestRated(Builder $query, $from = null, $to = null): Builder
    {
        return $query
            ->withAvg([
                'reviews' =>
                    fn(Builder $q) => $this->dateRangeFilter($q, $from, $to)
            ], 'rating')
            ->orderBy('reviews_avg_rating', 'DESC');
    }

    private function dateRangeFilter(Builder $query, $from = null, $to = null)
    {
        if ($from && !$to)
            $query->where('created_at', '>=', $from);
        else if (!$from && $to)
            $query->where('created_at', '<=', $to);
        else if ($from && $to)
            $query->whereNotBetween('created_at', [$from, $to]);

            // The method doesn't return anything explicitly because it modifies 
            // the query directly. In Laravel, queries are modified by reference, 
            // so you can modify the original query inside the method.
    }

    public function scopeMinReviews(Builder $query, int $minReview): Builder
    {
        // filters the books which has reviews >= $minReview
        return $query->having('reviews_count', '>=', $minReview);
    }


    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    // the above function is needed to define one to many relationship
    // book has many reviews
}
