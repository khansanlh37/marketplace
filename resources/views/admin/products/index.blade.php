@extends('admin.layout')

@section('title', 'Manajemen Produk')

@section('content')
<h2>Daftar Produk</h2>

<a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>Deskripsi</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $key => $product)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $product->name }}</td>
            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
            <td>{{ $product->category->name ?? 'Tidak Ada Kategori' }}</td>
            <td>{{ $product->description}}</td>
            <td>{{ $product->color }}</td>
            <td>
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" 
                    alt="{{ $product->name }}" 
                    class="img-fluid"
                    onerror="this.onerror=null; this.src='{{ asset('images/default-image.png') }}';">
            @else
                <img src="{{ asset('images/default-image.png') }}" 
                    alt="Default Image" 
                    class="img-fluid">
            @endif
            </td>
            <td>
                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
