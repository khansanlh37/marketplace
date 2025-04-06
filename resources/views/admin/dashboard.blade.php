@extends('admin.layout')

@section('title', 'Dashboard Admin')

@section('content')

<div class="container mt-4">
    <h2>Dashboard Admin</h2>
    <p><strong>Selamat Datang, Admin!</strong></p>
    <p>Gunakan panel ini untuk mengelola data pengguna dan produk.</p>

    <div class="row">
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-users"></i> Total Pengguna</h5>
                    <h2>{{ $totalUsers }}</h2>
                    <p>Pengguna terdaftar di sistem.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-box"></i> Total Produk</h5>
                    <h2>{{ $totalProducts }}</h2>
                    <p>Produk tersedia di marketplace.</p>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
