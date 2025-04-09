@extends('admin.layout')

@section('content')
    <h2>Daftar Tipe Produk</h2>
    <a href="{{ route('admin.product-types.create') }}" class="btn btn-primary mb-3">Tambah Tipe</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nama Tipe</th>
                <th>Produk</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
                <tr>
                    <td>{{ $type->name }}</td>
                    <td>{{ $type->product->name ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
