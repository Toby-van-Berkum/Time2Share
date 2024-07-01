@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Review for Lending #{{ $lending->id }}</h1>
    <form action="{{ route('reviews.store', $lending) }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="rating" class="block text-gray-700">Rating</label>
            <select name="rating" id="rating" class="w-full px-4 py-2 border rounded" required>
                @for($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="mb-4">
            <label for="comment" class="block text-gray-700">Comment</label>
            <textarea name="comment" id="comment" class="w-full px-4 py-2 border rounded" required></textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit Review</button>
    </form>
</div>
@endsection