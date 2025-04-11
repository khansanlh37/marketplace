@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Tipe Produk</h3>
    <form action="{{ route('admin.product-types.update', $productType->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama Tipe</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $productType->name) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
