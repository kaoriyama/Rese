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
        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf
            <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
            <div class="form-group">
                <input type="date" name="date" value="{{ date('Y-m-d') }}" required>
            </div>
            <div class="form-group">
                <select name="time" required>
                    <option value="17:00">17:00</option>
                    <!-- Add more time options here -->
                </select>
            </div>
            <div class="form-group">
                <select name="number_of_guests" required>
                    <option value="1">1人</option>
                    <option value="2">2人</option>
                    <!-- Add more guest number options here -->
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
        const dateInput = document.querySelector('input[name="date"]');
        const timeSelect = document.querySelector('select[name="time"]');
        const guestsSelect = document.querySelector('select[name="number_of_guests"]');
        
        const summaryDate = document.getElementById('summary-date');
        const summaryTime = document.getElementById('summary-time');
        const summaryGuests = document.getElementById('summary-guests');

        function updateSummary() {
            summaryDate.textContent = dateInput.value;
            summaryTime.textContent = timeSelect.value;
            summaryGuests.textContent = guestsSelect.value + '人';
        }

        dateInput.addEventListener('change', updateSummary);
        timeSelect.addEventListener('change', updateSummary);
        guestsSelect.addEventListener('change', updateSummary);

        // Initialize summary
        updateSummary();
    });
</script>
@endsection