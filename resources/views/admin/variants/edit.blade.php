@extends('admin.layout')

@section('content')
<div class="container">
    <h2>Edit Variant</h2>

    <form method="POST" action="{{ route('admin.variants.update', $variant->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="product_type_id">Tipe Produk</label>
            <select name="product_type_id" class="form-control" required>
                <option value="">-- Pilih Tipe Produk --</option>
                @foreach($productTypes as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="price">Harga</label>
            <input type="number" name="price" class="form-control" step="0.01" value="{{ $variant->price }}" required>
        </div>

        <div class="form-group">
            <label for="color">Warna</label>
            <input type="text" name="color" class="form-control" value="{{ $variant->color }}" required>
        </div>

        <div class="form-group">
            <label for="image">Gambar</label>
            <input type="file" name="image" class="form-control">
            <p>Gambar saat ini:</p>
            <img src="{{ asset('storage/' . $variant->image) }}" width="100">
            <input type="hidden" name="old_image" value="{{ $variant->image }}">
        </div>

        <div class="form-group">
            <label for="category_id">Kategori</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $variant->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="branch_id">Cabang</label>
            <select name="branch_id" class="form-control" required>
                @foreach($branches as $branch)
                    <option value="{{ $branch->id }}" {{ $variant->branch_id == $branch->id ? 'selected' : '' }}>
                        {{ $branch->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="product_id">Produk</label>
            <select name="product_id" class="form-control" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $variant->product_id == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Variant</button>
    </form>
</div>
@endsection
