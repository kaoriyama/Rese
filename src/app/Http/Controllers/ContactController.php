<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Area;
use App\Models\Genre;

class ContactController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::with(['area', 'genre'])->get();
        $areas = Area::all();
        $genres = Genre::all();

        return view('index', compact('restaurants', 'areas', 'genres'));
    }

    public function show($id)
    {
        $restaurant = Restaurant::with(['area', 'genre'])->findOrFail($id);
        return view('shop_detail', compact('restaurant'));
    }

    public function showDonePage()
    {
        return view('done');
    }

    public function search(Request $request)
    {
        $query = Restaurant::query();

        if ($request->filled('area')) {
            $query->where('area_id', $request->area);
        }

        if ($request->filled('genre')) {
            $query->where('genre_id', $request->genre);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $restaurants = $query->with(['area', 'genre'])->get();

        return view('partials.restaurant_grid', compact('restaurants'));
    }
}