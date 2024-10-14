<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\MypageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FavoriteController;

Route::get('/', [ContactController::class, 'index']);

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/restaurants/{id}', [ContactController::class, 'show'])->name('restaurants.show');

Route::get('/', [ContactController::class, 'index'])->name('index');

Route::get('/mypage', [MypageController::class, 'index'])->name('mypage')->middleware('auth');

Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store')->middleware('auth');

// 会員登録完了ページ
Route::get('/thanks', [AuthController::class, 'showThanksPage'])->name('register.thanks');

// 予約完了ページ
Route::get('/done', [ContactController::class, 'showDonePage'])->name('reservation.done');

Route::delete('/reservations/{reservation}', [ReservationController::class, 'cancel'])->name('reservations.cancel')->middleware('auth');

// 検索用のルートを追加
Route::get('/search', [ContactController::class, 'search'])->name('restaurants.search');

// お気に入り機能用のルートを追加
Route::post('/favorites', [FavoriteController::class, 'store'])->name('favorites.store')->middleware('auth');
Route::delete('/favorites/{restaurant}', [FavoriteController::class, 'destroy'])->name('favorites.destroy')->middleware('auth');


Route::post('/restaurants/{restaurant}/reviews', [ReviewController::class, 'store'])->name('restaurants.reviews.store');


