<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, Restaurant $restaurant)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:255',
        ]);

        $review = new Review($validated);
        $review->user_id = auth()->id();
        $review->restaurant_id = $restaurant->id;
        $review->save();

        return redirect()->back()->with('success', 'レビューを投稿しました。');
    }
}
