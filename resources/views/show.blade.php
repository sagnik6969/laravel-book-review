@extends('layouts.app')

@section('content')
    <h1 class="">
        {{ $book->title }}
    </h1>
    <h5 class="text-secondary">
        By {{ $book->author }}
    </h5>
    <div class="mt-4">
        <x-star-rating :rating="$book->reviews_avg_rating" />
    </div>

    {{-- {{  }} --}}
    {{-- <x-star-rating /> is a custom component --}}
    <p class="mt-1">
        <span class="font-weight-bold">
            {{ count($book->reviews) }}</span> reviews
    </p>

    <h3>
        Reviews
    </h3>
    <div>
        @foreach ($book->reviews as $review)
            <div class="card mt-2">
                <div class="card-body">
                    <div class="d-flex mb-2 justify-content-between align-items-center">
                        <x-star-rating :rating="$review->rating" />
                        <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                    </div>
                    <p class="card-text">{{ $review->review }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
