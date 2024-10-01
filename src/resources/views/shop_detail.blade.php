@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_detail.css') }}">
@endsection

@section('content')
<div class="shop-detail-container">
    <div class="shop-info">
        <a href="{{ route('index') }}" class="back-button">&lt; 戻る</a>
        <img src="{{ $restaurant->image_url }}" alt="{{ $restaurant->name }}" class="shop-image">
        <div class="shop-tags">
            <span class="tag">#{{ $restaurant->area->name }}</span>
            <span class="tag">#{{ $restaurant->genre->name }}</span>
        </div>
        <h1 class="shop-name">{{ $restaurant->name }}</h1>
        <p class="shop-description">{{ $restaurant->description }}</p>
    </div>

    @auth
    <div class="reservation-form">
        <h2>予約</h2>
        <form action="{{ route('reservations.store') }}" method="POST" id="reservation-form">
            @csrf
            <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
            <div class="form-group">
                <input type="date" name="date" id="reservation-date" value="{{ date('Y-m-d') }}" required>
            </div>
            <div class="form-group">
                <select name="time" id="reservation-time" required>
                    <option value="17:00">17:00</option>
                    <option value="18:00">18:00</option>
                    <option value="19:00">19:00</option>
                    <option value="20:00">20:00</option>
                    <option value="21:00">21:00</option>
                    <option value="22:00">22:00</option>
                </select>
            </div>
            <div class="form-group">
                <select name="number_of_guests" id="reservation-guests" required>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}">{{ $i }}人</option>
                    @endfor
                </select>
            </div>
            <div class="reservation-summary">
                <p><strong>Shop</strong> {{ $restaurant->name }}</p>
                <p><strong>Date</strong> <span id="summary-date"></span></p>
                <p><strong>Time</strong> <span id="summary-time"></span></p>
                <p><strong>Number</strong> <span id="summary-guests"></span></p>
            </div>
            <button type="submit" class="submit-button">予約する</button>
        </form>
    </div>
    @endauth
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('reservation-form');
    const dateInput = document.getElementById('reservation-date');
    const timeSelect = document.getElementById('reservation-time');
    const guestsSelect = document.getElementById('reservation-guests');
    
    const summaryDate = document.getElementById('summary-date');
    const summaryTime = document.getElementById('summary-time');
    const summaryGuests = document.getElementById('summary-guests');

    function updateSummary() {
        summaryDate.textContent = dateInput.value;
        summaryTime.textContent = timeSelect.value;
        summaryGuests.textContent = guestsSelect.value + '人';
    }

    // フォーム全体にイベントリスナーを追加
    form.addEventListener('input', updateSummary);
    form.addEventListener('change', updateSummary);

    // 初期化時にもサマリーを更新
    updateSummary();
});
</script>
@endsection