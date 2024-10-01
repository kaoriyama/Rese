<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $reservations = $user->reservations()->with('shop')->get();
        $favorites = $user->favorites()->with('shop.area', 'shop.genre')->get();

        return view('mypage', compact('user', 'reservations', 'favorites'));
    }
}