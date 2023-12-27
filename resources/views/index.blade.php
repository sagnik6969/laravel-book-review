@extends('layouts.app')


@section('content')
    <h2>Books</h2>

    <form action="">
        <div class="form-inline">
            <input class="form-control search-box mr-2" type="text" name="title" placeholder="Search by title"
                value="{{ request('title') }}">
            <input type="hidden" name="filter" value="{{ request('filter') }}">
            {{-- request('title') => to get old value of title --}}
            <button class="form-control btn btn-outline-primary mr-2">Search</button>
            <a class="btn btn-outline-secondary form-control" href="{{ route('books.index') }}">Reset</a>
        </div>
    </form>

    @php
        $filters = [
            '' => 'Latest',
            'popular_last_month' => 'Popular Last Month',
            'popular_last_6months' => 'Popular Last 6 Months',
            'highest_rated_last_month' => 'Highest Rated Last Month',
            'highest_rated_last_6months' => 'Highest Rated Last 6 Months',
        ];
    @endphp
    <div class="filter-container d-flex text-center p-2 mt-3 rounded">
        @foreach ($filters as $key => $label)
            <div
                class="d-flex justify-content-center align-items-center flex-even rounded p-2 {{ $key == request('filter') ? 'bg-white shadow-sm' : '' }}">
                <a class="text-muted text-decoration-none"
                    href="{{ route('books.index', [
                        ...request()->query(),
                        // spread operator => works like js.
                        // request()->query() contains all the
                        // query params
                        'filter' => $key,
                    ]) }}">{{ $label }}</a>
            </div>
        @endforeach

    </div>

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
                    <h5 class="mb-0">{{ number_format($book->reviews_avg_rating, 1) }}</h5>
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
    <div class="mt-5">
        {{ $books->links('pagination::bootstrap-4') }}
    </div>
@endsection
