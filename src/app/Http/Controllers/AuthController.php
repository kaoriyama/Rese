<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
    $areas = Area::all();
    return view('index', ['areas' => $areas]);
    }
}
