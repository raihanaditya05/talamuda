@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Proyek</h3>

    <form action="{{ route('proyek.update', $proyek->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Proyek</label>
            <input type="text" name="nama_proyek" class="form-control" value="{{ $proyek->nama_proyek }}" required>
        </div>

        <div class="mb-3">
            <label>Klien</label>
            <input type="text" name="klien" class="form-control" value="{{ $proyek->klien }}">
        </div>

        <div class="mb-3">
            <label>Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" value="{{ $proyek->tanggal_mulai }}">
        </div>

        <div class="mb-3">
            <label>Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control" value="{{ $proyek->tanggal_selesai }}">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="berjalan" {{ $proyek->status == 'berjalan' ? 'selected' : '' }}>Berjalan</option>
                <option value="selesai" {{ $proyek->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $proyek->deskripsi }}</textarea>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
