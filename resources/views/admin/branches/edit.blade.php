@extends('admin.layout')

@section('content')
    <div class="container mt-4">
        <h2>Edit Cabang</h2>
        <form action="{{ route('admin.branches.update', $branch->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama Cabang</label>
            <input type="text" name="name" value="{{ $branch->name }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="location">Lokasi</label>
            <textarea name="location" class="form-control">{{ $branch->location }}</textarea>
        </div>

        <div class="form-group">
            <label for="region">Wilayah</label>
            <select name="region" class="form-control">
                <option value="Jabodetabek" {{ $branch->region == 'Jabodetabek' ? 'selected' : '' }}>Jabodetabek</option>
                <option value="Jawa Barat" {{ $branch->region == 'Jawa Barat' ? 'selected' : '' }}>Jawa Barat</option>
                <option value="Jawa Timur" {{ $branch->region == 'Jawa Timur' ? 'selected' : '' }}>Jawa Timur</option>
                <option value="Bali" {{ $branch->region == 'Bali' ? 'selected' : '' }}>Bali</option>
                <option value="Sulawesi Selatan" {{ $branch->region == 'Sulawesi Selatan' ? 'selected' : '' }}>Sulawesi Selatan</option>
                <option value="Sulawesi Utara" {{ $branch->region == 'Sulawesi Utara' ? 'selected' : '' }}>Sulawesi Utara</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
