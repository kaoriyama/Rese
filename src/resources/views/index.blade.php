@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="{{asset('js/search.js')}}"></script>
    <script src="{{asset('js/favorites.js')}}"></script>
    @endsection

@section('search-bar')
<div class="search-bar-container">
    <select id="area-select" name="area">
        <option value="">All area</option>
        @foreach($areas as $area)
            <option value="{{ $area->id }}">{{ $area->name }}</option>
        @endforeach
    </select>
    <select id="genre-select" name="genre">
        <option value="">All genre</option>
        @foreach($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
        @endforeach
    </select>
    <input type="text" id="search-input" name="search" placeholder="Search ...">
</div>
@endsection

@section('content')
<main id="restaurant-grid" class="restaurant-grid">
    @foreach($restaurants as $restaurant)
    <div class="restaurant-card">
        <img src="{{ $restaurant->image_url }}" alt="{{ $restaurant->name }}" class="restaurant-image">
        <div class="restaurant-info">
            <div class="restaurant-name">{{ $restaurant->name }}</div>
            <div class="restaurant-tags">
                #{{ $restaurant->area->name }} #{{ $restaurant->genre->name }}
            </div>
            <button class="detail-button">
                <a href="{{ route('restaurants.show', $restaurant->id) }}" class="nav__link">詳しく見る</a>
            </button>
            <button class="favorite-button" onclick="toggleFavorite({{ $restaurant->id }}, this)" data-restaurant-id="{{ $restaurant->id }}">
                <i class="fas fa-heart {{ $restaurant->is_favorited ? 'favorited' : '' }}"></i>
            </button>
            <button onclick="toggleFavorite({{ $restaurant->id }}, this)" class="favorite-btn">
            <i class="fas fa-heart {{ $restaurant->isFavoritedByUser(auth()->id()) ? 'favorited' : '' }}"></i>
            </button>
        </div>
    </div>
    @endforeach
</main>
@endsection

