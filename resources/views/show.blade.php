@extends('layouts.app')

@section('content')
    <h1 class="">
        {{ $book->title }}
    </h1>
    <h5 class="text-secondary">
        By {{ $book->author }}
    </h5>
    <p class="mt-3">
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
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">{{ $review->rating }}</h5>
                        <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                    </div>
                    <p class="card-text">{{ $review->review }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
