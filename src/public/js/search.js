document.addEventListener('DOMContentLoaded', function() {
    const areaSelect = document.getElementById('area-select');
    const genreSelect = document.getElementById('genre-select');
    const searchInput = document.getElementById('search-input');

    function performSearch() {
        const area = areaSelect.value;
        const genre = genreSelect.value;
        const searchTerm = searchInput.value;

        fetch(`/search?area=${area}&genre=${genre}&search=${searchTerm}`)
            .then(response => response.text())
            .then(html => {
                document.getElementById('restaurant-grid').innerHTML = html;
            });
        }

    areaSelect.addEventListener('change', performSearch);
    genreSelect.addEventListener('change', performSearch);
    searchInput.addEventListener('input', performSearch);
});
