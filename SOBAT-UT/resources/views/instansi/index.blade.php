@extends('layouts.app')

@section('title', 'Data Instansi')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Data Instansi</h2>

    <!-- Success message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Add New Instansi Button -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createInstansiModal">
        Tambah Instansi
    </button>

    <!-- Table -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Provinsi</th>
                <th>Kabupaten</th>
                <th>PIC</th>
                <th>Status</th>
                <th>Bintang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($instansis as $instansi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $instansi->nama }}</td>
                <td>{{ $instansi->email }}</td>
                <td>{{ $instansi->provinsi }}</td>
                <td>{{ $instansi->kabupaten }}</td>
                <td>{{ $instansi->pic }}</td>
                <td>{{ $instansi->status }}</td>
                <td>{{ $instansi->bintang }}</td>
                <td>
                    <!-- Edit Button -->
                    <a href="{{ route('instansi.edit', $instansi->id) }}" class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <!-- Delete Button -->
                    <form action="{{ route('instansi.destroy', $instansi->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus instansi ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Create Instansi Modal -->
<div class="modal fade" id="createInstansiModal" tabindex="-1" aria-labelledby="createInstansiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createInstansiModalLabel">Tambah Instansi Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('instansi.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <input type="text" name="provinsi" id="provinsi" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="kabupaten" class="form-label">Kabupaten</label>
                        <input type="text" name="kabupaten" id="kabupaten" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="pic" class="form-label">PIC</label>
                        <input type="text" name="pic" id="pic" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" name="status" id="status" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="bintang" class="form-label">Bintang</label>
                        <input type="number" name="bintang" id="bintang" class="form-control" min="0" max="5">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
