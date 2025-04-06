document.addEventListener("DOMContentLoaded", function () {
    // Ambil semua tombol favorite
    const favoriteButtons = document.querySelectorAll(".favorite-btn");

    // Cek favorite yang sudah disimpan di localStorage
    let favorites = JSON.parse(localStorage.getItem("favorites")) || [];

    // Tandai produk yang sudah difavoritkan
    favoriteButtons.forEach(button => {
        let productId = button.getAttribute("data-id");
        if (favorites.includes(productId)) {
            button.classList.add("favorited");
        }

        // Event saat tombol diklik
        button.addEventListener("click", function () {
            toggleFavorite(productId, button);
        });
    });

    // Fungsi menambah/menghapus favorite
    function toggleFavorite(productId, button) {
        let index = favorites.indexOf(productId);
        if (index === -1) {
            favorites.push(productId);
            button.classList.add("favorited");
        } else {
            favorites.splice(index, 1);
            button.classList.remove("favorited");
        }
        localStorage.setItem("favorites", JSON.stringify(favorites));
    }
});
