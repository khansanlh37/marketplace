@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-items-center mb-3">
        <!-- Tombol Back -->
        @if(request()->has('search'))
            <div class="col-auto">
                <a href="{{ route('products.index') }}" class="d-flex align-items-center text-decoration-none text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    <span class="ms-2">Kembali</span>
                </a>
            </div>
        @endif

        <!-- Form Pencarian -->
        <div class="col">
            <form action="{{ route('products.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari produk..." value="{{ request('search') }}">
                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded-r-md">
                        🔍
                </button>
            </form>
        </div>
    </div>

    <div class="row">
        <!-- Sidebar Filter -->
        <div class="col-md-3">
            <h4 class="text-center">Filter Produk</h4>
            <form action="{{ route('products.index') }}" method="GET">
                <label for="region">Wilayah:</label>
                <select name="region" class="form-select mb-2" onchange="this.form.submit()">
                    <option value="">Semua Wilayah</option>
                    @foreach($regions as $region)
                        <option value="{{ $region }}" {{ request('region') == $region ? 'selected' : '' }}>{{ $region }}</option>
                    @endforeach
                </select>

                <label for="branch">Cabang:</label>
                <select name="branch" class="form-select mb-2" onchange="this.form.submit()">
                    <option value="">Semua Cabang</option>
                    @foreach($branches as $branch)
                        <option value="{{ $branch->id }}" {{ request('branch') == $branch->id ? 'selected' : '' }}>{{ $branch->name }}</option>
                    @endforeach
                </select>

                <label for="category">Kategori:</label>
                <select name="category" class="form-select mb-2" onchange="this.form.submit()">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </form>
        </div>

        <!-- Produk List -->
        <div class="row">
            @foreach($products as $product)
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card shadow-sm p-2 product-card position-relative">
                    
                    <!-- Badge Kategori -->
                    <span class="badge bg-warning position-absolute top-0 start-0 m-2 px-3 py-2">
                        {{ $product->category->name ?? 'Kategori' }}
                    </span>

                    <!-- Tombol Favorite -->
                    <button class="favorite-btn position-absolute top-0 end-0 m-2 p-2 rounded-circle shadow-sm border-0"
                        data-product-id="{{ $product->id }}" onclick="toggleFavorite({{ $product->id }})">
                        <i id="fav-icon-{{ $product->id }}" class="fas fa-heart {{ in_array($product->id, session('favorites', [])) ? 'text-danger' : 'text-gray-300' }}"></i>
                    </button>

                    <!-- Gambar Produk -->
                    <a href="{{ route('products.show', $product->id) }}" class="text-decoration-none text-dark">
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top product-img" alt="{{ $product->name }}">
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">{{ $product->name }}</h5>
                            <p class="text-success fw-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

            @if($products->isEmpty())
                <p class="text-center text-gray-500">Produk tidak ditemukan.</p>
            @endif

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan CSS -->
<style>
    /* Card Styling */
    .product-card {
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        height: auto;
    }

    .product-card:hover {
        transform: scale(1.05);
        box-shadow: 6px 12px rgba(0, 0, 0, 0.15);
    }

    .product-img {
        height: 180px;
        object-fit: contain;
        padding: 10px;
    }

    .favorite-btn {
        background-color: white;
        border-radius: 50%;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        border: none;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .favorite-btn:hover {
        background-color: #f3f3f3;
    }

        .color-circle {
        display: inline-block;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        margin: 0 3px;
        border: 1px solid #ccc;
    }
    /* Positioning for Favorite Icon */
    .position-absolute {
        position: absolute;
    }
    .top-0 {
        top: 10px;
    }
    .end-0 {
        right: 10px;
    }
    .bg-white {
        background-color: white;
    }
    .rounded-circle {
        border-radius: 50%;
    }
    .shadow-sm {
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }
    .border-0 {
        border: none;
    }
    .text-gray-500 {
        color: gray;
    }

    /* Styling untuk Back Button */
    .back-button {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: black;
        font-weight: bold;
        transition: color 0.3s ease;
    }
    .back-button:hover {
        color: #007bff;
    }
    .back-button svg {
        width: 20px;
        height: 20px;
    }

    .relative {
    position: relative;
}

    .absolute {
        position: absolute;
        top: 10px;
        right: 10px;
    }

    button.favorite-btn {
        background-color: white;
        padding: 8px;
        border-radius: 50%;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        border: 1px solid #ccc;
        transition: background-color 0.3s ease;
    }

    button.favorite-btn:hover {
        background-color: #f3f3f3;
    }

    button.favorite-btn i {
        font-size: 1rem;
    }

    .favorite-btn {
    display: flex !important;
    align-items: center;
    justify-content: center;
    }

</style>

<script>
    function toggleFavorite(productId) {
        fetch(`/favorite/toggle/${productId}`, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                "Content-Type": "application/json",
            },
            body: JSON.stringify({})
        })
        .then(response => response.json())
        .then(data => {
            let icon = document.getElementById(`fav-icon-${productId}`);
            if (data.message === "Added to favorites") {
                icon.classList.remove("text-gray-300");
                icon.classList.add("text-danger");
            } else {
                icon.classList.remove("text-danger");
                icon.classList.add("text-gray-300");
            }
        })
        .catch(error => console.error("Error:", error));
    }
</script>
@endsection
