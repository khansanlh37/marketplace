@extends('admin.layout')

@section('content')
    <h2>Daftar Cabang</h2>
    <a href="{{ route('admin.branches.create') }}" class="btn btn-primary mb-3">Tambah Cabang</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Cabang</th>
                <th>Wilayah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($branches as $key => $branch)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $branch->name }}</td>
                    <td>{{ $branch->region }}</td>
                    <td>
                        <a href="{{ route('admin.branches.edit', $branch->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.branches.destroy', $branch->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus cabang ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
