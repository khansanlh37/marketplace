<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background: #343a40;
            color: white;
            padding-top: 20px;
        }
        .sidebar a {
            padding: 10px;
            display: block;
            color: white;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #495057;
        }
        .content {
            margin-left: 260px;
            padding: 20px;
        }
        .card {
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }
        .footer {
            text-align: center;
            padding: 10px;
            background: #343a40;
            color: white;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
        .dropdown-menu {
            background-color: #343a40; /* Gunakan warna yang lebih gelap supaya terlihat */
            color: white; /* Pastikan teks dropdown berwarna putih */
            min-width: 200px; /* Lebar minimum untuk dropdown menu */
        }
        .dropdown-item:hover {
            background-color: #495057; /* Ganti warna background item saat hover */
            color: white; /* Pastikan teks tetap putih saat hover */
        }
    </style>
    
</head>
<body>

    <div class="sidebar">
        <h4 class="text-center">Admin Panel</h4>
        <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
        
        <!-- Dropdown untuk Management Product -->
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="productDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Management Product
            </button>
            <ul class="dropdown-menu" aria-labelledby="productDropdown">
                <li><a class="dropdown-item" href="{{ route('admin.products') }}">Product Management</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.product-types.index') }}">Type Product Management</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.variants.index') }}">Variants Management</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.branches.index') }}">Branch Management</a></li>
            </ul>
        </div>

        <a href="{{ route('admin.logout') }}" class="list-group-item list-group-item-action text-danger">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>

    <div class="content">
        @yield('content')
    </div>

    <div class="footer">
        © 2025 Marketplace Admin
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // $('#variantModal').modal('show');
        });
    </script>
    <script>
        $('#variantModal').on('show.bs.modal', function (e) {
        console.log('Modal is shown!');
        });
    </script>
</body>
</html>
