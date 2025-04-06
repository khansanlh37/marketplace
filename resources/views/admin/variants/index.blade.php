@extends('admin.layout')

@section('content')
<div class="container">
    <h2>Daftar Variants</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Tipe Produk</th>
                <th>Harga</th>
                <th>Warna</th>
                <th>Gambar</th>
                <th>Kategori</th>
                <th>Cabang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($variants as $variant)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $variant->type }}</td>
                    <td>Rp {{ number_format($variant->price, 0, ',', '.') }}</td> <!-- Menampilkan harga -->
                    <td style="background-color: {{ $variant->color }};"></td>
                    <td><img src="{{ asset('storage/' . $variant->image) }}" width="50" height="50" alt="Variant Image"></td>
                    <td>{{ $variant->category ? $variant->category->name : 'Category not available' }}</td>
                    <td>{{ $variant->branch ? $variant->branch->name : 'Branch not available' }}</td>
                    <td>
                        <a href="{{ route('admin.variants.edit', $variant->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.variants.destroy', $variant->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <button type="button" id="addVariantBtn" class="btn btn-primary" data-toggle="modal" data-target="#variantModal">
        Tambah Variants
    </button>

<!-- Modal -->
<div class="modal fade" id="variantModal" tabindex="-1" role="dialog" aria-labelledby="variantModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="variantModalLabel">Tambah Variant</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('admin.variants.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label for="type">Tipe Produk</label>
                    <input type="text" class="form-control" name="type" required>
                </div>
                <div class="form-group">
                    <label for="price">Harga</label>
                    <input type="number" class="form-control" name="price" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="color">Warna</label>
                    <input type="color" class="form-control" name="color" required>
                </div>
                <div class="form-group">
                    <label for="image">Gambar Produk</label>
                    <input type="file" class="form-control" name="image" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label for="category_id">Kategori</label>
                    <select name="category_id" class="form-control" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="branch_id">Cabang</label>
                    <select name="branch_id" class="form-control" required>
                        @foreach($branches as $branch)
                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                        @endforeach
                    </select>
                </div>
                

                <!-- Tambahkan input hidden untuk product_id -->
                <div class="form-group">
            <label for="product_id">Produk</label>
            <select name="product_id" class="form-control" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

                <button type="submit" class="btn btn-primary">Simpan Variant</button>
            </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('addVariantBtn').addEventListener('click', function () {
        $('#variantModal').modal('show');
    });
</script>
@endsection