@extends('admin.layout')

@section('content')
<h2>Daftar Tipe Produk</h2>
<a href="{{ route('admin.product-types.create') }}" class="btn btn-primary mb-3">Tambah Tipe</a>

<table class="table">
    <thead>
        <tr>
            <th>Nama Tipe</th>
            <th>Produk</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($types as $type) <!-- Pastikan menggunakan $types sesuai dengan controller -->
        <tr>
            <td>{{ $type->name }}</td>
            <td>{{ $type->product->name ?? '-' }}</td> <!-- Menampilkan nama produk -->
            <td>
                <!-- Tombol Edit -->
                <a href="{{ route('admin.product-types.edit', $type->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <!-- Tombol Delete -->
                <form action="{{ route('admin.product-types.destroy', $type->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
