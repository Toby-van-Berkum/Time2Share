<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create(Lending $lending) {
        return view('reviews.create', compact('lending'));
    }

    public function store(Request $request, Lending $lending) {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|string'
        ]);

        $review = new Review([
            'lending_id' => $lending->id,
            'reviewer_id' => Auth::id(),
            'reviewee_id' => $lending->borrower_id,
            'rating' => $request->rating,
            'comment' => $request->comment
        ]);

        $review->save();

        return redirect()->route('lendings.index');
    }
}
