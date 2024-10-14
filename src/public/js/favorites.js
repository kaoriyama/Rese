async function toggleFavorite(restaurantId, button) {
    button.disabled = true;
    const icon = button.querySelector('i');
    const isFavorited = icon.classList.contains('favorited');
    const url = isFavorited ? `/favorites/${restaurantId}` : '/favorites';
    const method = isFavorited ? 'delete' : 'post';

    try {
        const response = await axios({
            method: method,
            url: url,
            data: { restaurant_id: restaurantId }
        });

        if (response.data.status === 'success') {
            icon.classList.toggle('favorited');
        }
    } catch (error) {
        console.error('Error:', error);
    } finally {
        button.disabled = false;
    }
}