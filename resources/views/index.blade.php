@extends('layouts.app')


@section('content')
    <h2>Books</h2>
    @forelse ($books as $book)
        <div class="card mt-3">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <a href="{{ route('books.show', ['book' => $book]) }}">
                        <h5 class="card-title">{{ $book->title }}</h5>
                    </a>
                    <h6 class="card-subtitle mb-2 text-muted">By {{ $book->author }}</h6>
                </div>
                <div>
                    <h5 class="mb-0">{{ round($book->reviews_avg_rating, 1) }}</h5>
                    <p class="text-secondary mb-0">Out of {{ $book->reviews_count }} reviews</p>
                </div>
            </div>
        </div>
    @empty
        <div class="card mt-3">
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                <h5>No book found</h5>
                <a href="{{ route('books.index') }}">Reset critaria</a>
            </div>
        </div>
    @endforelse
@endsection
