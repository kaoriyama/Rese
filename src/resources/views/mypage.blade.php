@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<main>
    <h2>{{ $user->name }}さん</h2>
    <div class="mypage-container">
        <section class="reservation-section">
            <h3>予約状況</h3>
            @forelse($reservations as $reservation)
                <div class="reservation-card">
                    <h4>予約 {{ $loop->iteration }}</h4>
                    <p><strong>Shop:</strong> {{ $reservation->shop->name }}</p>
                    <p><strong>Date:</strong> {{ $reservation->reservation_date }}</p>
                    <p><strong>Time:</strong> {{ \Carbon\Carbon::parse($reservation->reservation_time)->format('H:i') }}</p>
                    <p><strong>Number:</strong> {{ $reservation->number_of_guests }}人</p>
                    <form action="{{ route('reservations.cancel', $reservation->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="cancel-btn">×</button>
                    </form>
                </div>
            @empty
                <p>現在、予約はありません。</p>
            @endforelse
        </section>
        <section class="favorites-section">
            <h3>お気に入り店舗</h3>
            <div class="favorites-container">
                @foreach($favorites as $favorite)
                    <div class="favorite-card">
                        <img src="{{ $favorite->shop->image_url }}" alt="{{ $favorite->shop->name }}">
                        <h4>{{ $favorite->shop->name }}</h4>
                        <p>#{{ $favorite->shop->area->name }} #{{ $favorite->shop->genre->name }}</p>
                        <div class="card-actions">
                            <a href="{{ route('shops.show', $favorite->shop) }}" class="details-btn">詳しくみる</a>
                            <form action="{{ route('favorites.toggle', $favorite->shop) }}" method="POST">
                                @csrf
                                <button type="submit" class="favorite-btn">♥</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</main>
@endsection

@section('scripts')
<script>
    // 必要に応じてJavaScriptを追加
</script>
@endsection