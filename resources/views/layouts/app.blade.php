<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Marketplace')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Link CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
<body>
    <!-- Header -->
    <header class="bg-white shadow-sm py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Logo Perusahaan -->
            <a href="/" class="d-flex align-items-center">
                <img src="{{ asset('storage/logo-hyundaigowa.png') }}" alt="Company Logo" class="me-2" height="40">
            </a>

            <!-- Navigasi + Pencarian -->
            <div class="d-flex align-items-center space-x-6">
                <!-- My Favorites tanpa link, tetapi bisa diklik -->
                <span class="favorites-text" onclick="navigateToFavorites()">My Favorites</span>
            </div>
        </div>
    </header>

    <!-- Tambahkan script navigasi -->
    <script>
        function navigateToFavorites() {
            window.location.href = "/favorites"; // Sesuaikan dengan rute favorit di Laravel
        }
    </script>

    <style>
        .favorites-text {
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            color: black; /* Warna teks menjadi hitam */
            margin-right: 20px; /* Untuk mengatur sejajar dengan search */
        }
        .favorites-text:hover {
            text-decoration: underline;
        }
    </style>

    <!-- Main Content -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('js/favorites.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
