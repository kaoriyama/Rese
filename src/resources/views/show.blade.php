<section class="reviews-section">
    <h3>レビュー</h3>
    @if(auth()->check())
        <form action="{{ route('restaurants.reviews.store', $restaurant) }}" method="POST">
            @csrf
            <div>
                <label for="rating">評価：</label>
                <select name="rating" id="rating" required>
                    @for($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div>
                <label for="comment">コメント：</label>
                <textarea name="comment" id="comment" required></textarea>
            </div>
            <button type="submit">レビューを投稿</button>
        </form>
    @endif

    <div class="reviews-list">
        @foreach($restaurant->reviews as $review)
            <div class="review-card">
                <p><strong>評価：</strong> {{ $review->rating }}/5</p>
                <p><strong>コメント：</strong> {{ $review->comment }}</p>
                <p><small>投稿者： {{ $review->user->name }} - {{ $review->created_at->format('Y-m-d H:i') }}</small></p>
            </div>
        @endforeach
    </div>
</section>