@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Edit Instansi</h1>
    <form action="{{ route('instansi.edit', $instansi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" class="form-control" value="{{ $instansi->nama }}" required>
        </div>
        <!-- Add other fields for email, provinsi, kabupaten, etc. -->
        <button type="submit" class="btn btn-primary mt-3">Update Instansi</button>
    </form>
</div>
@endsection
