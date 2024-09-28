<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;

Route::get('/', [ContactController::class, 'index']);

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/restaurants/{id}', [ContactController::class, 'show'])->name('restaurants.show');

Route::get('/restaurants/{id}', [ContactController::class, 'show'])->name('restaurants.show');

Route::get('/', [ContactController::class, 'index'])->name('index');