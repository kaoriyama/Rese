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
        <button class="favorite-button" onclick="toggleFavorite({{ $restaurant->id }})">
            ♥
        </button>
    </div>
</div>
@endforeach