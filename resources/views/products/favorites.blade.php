@extends('layouts.app')

@section('content')
    <h1>Produk Favorit</h1>

    <div class="row">
        @foreach ($favorites as $product)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="card-img-top">
                    <div class="card-body text-center">
                        <h5>{{ $product->name }}</h5>
                        <p class="text-success fw-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
