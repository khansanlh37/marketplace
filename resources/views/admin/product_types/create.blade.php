@extends('admin.layout')

@section('content')
    <h2>Tambah Tipe Produk</h2>

    <form action="{{ route('admin.product-types.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product_id">Pilih Produk</label>
            <select name="product_id" id="product_id" class="form-control">
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Nama Tipe</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.product-types.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
