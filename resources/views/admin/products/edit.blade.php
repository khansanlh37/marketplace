@extends('admin.layout')

@section('content')
<div class="container">
    <h2>Edit Produk</h2>
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Nama Produk -->
        <div class="form-group">
            <label for="name">Nama Produk:</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
        </div>

        <!-- Harga -->
        <div class="form-group">
            <label for="price">Harga:</label>
            <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
        </div>

        <!-- Deskripsi -->
        <div class="form-group">
            <label for="description">Deskripsi:</label>
            <textarea name="description" class="form-control" required>{{ $product->description }}</textarea>
        </div>

        <!-- Kategori -->
        <div class="form-group">
            <label for="category_id">Kategori:</label>
            <select name="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Cabang -->
        <div class="form-group">
            <label for="branch_id">Pilih Cabang:</label>
            <select name="branch_id" class="form-control">
                @foreach ($branches as $branch)
                    <option value="{{ $branch->id }}" {{ $product->branch_id == $branch->id ? 'selected' : '' }}>{{ $branch->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Gambar Produk -->
        <div class="form-group">
            <label for="image">Gambar Produk:</label>
            <input type="file" name="image" class="form-control">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="150">
            @endif
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
