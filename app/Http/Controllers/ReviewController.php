<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::where(
            'user_id',
            auth()->id()
        )->latest()->get();

        return view(
            'reviews.index',
            compact('reviews')
        );
    }

    public function store(Request $request)
    {
        Review::create([
            'user_id' => auth()->id(),
            'movie_id' => $request->movie_id,
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        return back();
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return back();
    }
}