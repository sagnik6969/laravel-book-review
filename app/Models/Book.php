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
                'reviews' => function (Builder $q) use ($from, $to) {
                    // To filter the reviews
                    // ** the books will be shown with the review count between from and to
                    if ($from && !$to)
                        $q->where('created_at', '>=', $from);
                    else if (!$from && $to)
                        $q->where('created_at', '<=', $to);
                    else if ($from && $to)
                        $q->whereNotBetween('created_at', [$from, $to]);

                }
            ])
            ->orderBy('reviews_count', 'DESC');
    }

    public function scopeHighestRated(Builder $query): Builder
    {
        return $query
            ->withAvg('reviews', 'rating')
            ->orderBy('reviews_avg_rating', 'DESC');
    }


    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    // the above function is needed to define one to many relationship
    // book has many reviews
}
