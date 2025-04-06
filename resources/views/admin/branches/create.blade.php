@extends('admin.layout')

@section('content')
    <div class="container mt-4">
        <h2>Tambah Cabang</h2>
        <form action="{{ route('admin.branches.store') }}" method="POST" class="p-4">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nama Cabang:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Lokasi:</label>
                <textarea id="location" name="location" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="region" class="form-label">Wilayah:</label>
                <select id="region" name="region" class="form-select">
                <option value="Jabodetabek">Jabodetabek</option>
                <option value="Jawa Barat">Jawa Barat</option>
                <option value="Jawa Timur">Jawa Timur</option>
                <option value="Bali">Bali</option>
                <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                <option value="Sulawesi Utara">Sulawesi Utara</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
