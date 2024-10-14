<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Restaurant;

class FavoriteController extends Controller
{
    public function store(Request $request)
    {
        $user = auth()->user();
        $restaurantId = $request->input('restaurant_id');

        $favorite = new Favorite();
        $favorite->user_id = $user->id;
        $favorite->restaurant_id = $restaurantId;
        $favorite->save();

        return response()->json(['status' => 'success']);
    }

    public function destroy(Restaurant $restaurant)
    {
        $user = auth()->user();
        $favorite = Favorite::where('user_id', $user->id)
                            ->where('restaurant_id', $restaurant->id)
                            ->first();

        if ($favorite) {
            $favorite->delete();
        }

        return response()->json(['status' => 'success']);
    }
}