@extends('admin.layout')

@section('content')
    <h2>Tambah Tipe Produk</h2>

    <form action="{{ route('admin.product-types.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="product_id" class="form-label">Pilih Produk</label>
            <select class="form-control" name="product_id" id="product_id" required>
                <option value="">-- Pilih Produk --</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nama Tipe</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.product-types.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
