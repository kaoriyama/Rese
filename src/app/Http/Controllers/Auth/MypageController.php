<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MypageController extends Controller
{
    public function index()
    {
        // ここにマイページの処理を記述
        return view('mypage');
    }
}