@extends('admin.layout')

@section('content')
<h2>Tambah Produk</h2>

<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Nama Produk -->
    <div class="mb-3">
        <label for="name" class="form-label">Nama Produk:</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <!-- Harga Produk -->
    <div class="mb-3">
        <label for="price" class="form-label">Harga:</label>
        <input type="number" name="price" id="price" class="form-control" required>
    </div>

    <!-- Deskripsi Produk -->
    <div class="mb-3">
        <label for="description" class="form-label">Deskripsi:</label>
        <textarea name="description" id="description" class="form-control"></textarea>
    </div>

    <!-- Kategori Produk -->
    <div class="mb-3">
        <label for="category_id" class="form-label">Kategori:</label>
        <select name="category_id" id="category_id" class="form-control" required>
            <option value="" disabled selected>Pilih Kategori</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Pilih Cabang -->
    <div class="mb-3">
        <label for="branch_id" class="form-label">Pilih Cabang:</label>
        <select name="branch_id" id="branch_id" class="form-control" required>
            <option value="" disabled selected>Pilih Cabang</option>
            @foreach($branches as $branch)
                <option value="{{ $branch->id }}">{{ $branch->name }} - {{ $branch->region }}</option>
            @endforeach
        </select>
    </div>

    <!-- Upload Gambar Produk -->
    <div class="mb-3">
        <label for="image" class="form-label">Gambar Produk:</label>
        <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
    </div>

    <!-- Tombol Simpan Produk -->
    <button type="submit" class="btn btn-primary mt-3">Simpan Produk</button>
</form>
@endsection
