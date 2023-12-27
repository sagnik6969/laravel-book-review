@extends('layouts.app')

@section('content')
    <h1>Add a review for {{ $book->title }}</h1>
    <form action="{{ route('books.reviews.store', ['book' => $book]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="review">Review</label>
            <textarea class="form-control" name="review" id="review" cols="30" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="rating">Rating</label>
            <select name="rating" id="rating" class="form-control" id="exampleFormControlSelect1">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <button class="btn btn-primary">Add Review</button>
    </form>
@endsection
