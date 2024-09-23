<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese - レストラン予約サービス</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="header">
        <div class="logo">Rese</div>
        <div class="search-bar">
            <select>
                <option>All area</option>
                @foreach($areas as $area)
                    <option value="{{ $area->id }}">{{ $area->name }}</option>
                @endforeach
            </select>
            <select>
                <option>All genre</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
            <input type="text" placeholder="Search ...">
        </div>
    </header>

    <main class="restaurant-grid">
        @foreach($restaurants as $restaurant)
        <div class="restaurant-card">
            <img src="{{ $restaurant->image_url }}" alt="{{ $restaurant->name }}" class="restaurant-image">
            <div class="restaurant-info">
                <div class="restaurant-name">{{ $restaurant->name }}</div>
                <div class="restaurant-tags">
                    #{{ $restaurant->area->name }} #{{ $restaurant->genre->name }}
                </div>
                <button class="detail-button">詳しく見る</button>
                <button class="favorite-button" onclick="toggleFavorite({{ $restaurant->id }})">
                    ♥
                </button>
            </div>
        </div>
        @endforeach
    </main>

    <script>
        function toggleFavorite(restaurantId) {
            // お気に入り切り替えのロジックをここに実装
            console.log('Toggle favorite for restaurant ID:', restaurantId);
        }
    </script>
</body>
</html>