@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Tambah Proyek</h3>
    <form action="{{ route('proyek.store') }}" method="POST">
        @csrf

        <div class="form-group mb-2">
            <label>Nama Proyek</label>
            <input type="text" name="nama_proyek" class="form-control" required>
        </div>

        <div class="form-group mb-2">
            <label>Klien</label>
            <input type="text" name="klien" class="form-control">
        </div>

        <div class="form-group mb-2">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control">
        </div>

        <div class="form-group mb-2">
            <label>Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control">
        </div>

        <div class="form-group mb-2">
            <label>Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control">
        </div>

        <div class="form-group mb-2">
            <label>Status</label>
           <select name="status" class="form-control" required>
    <option value="proses">Proses</option>
    <option value="pending">Pending</option>
    <option value="selesai">Selesai</option>
</select>
        </div>

        <div class="form-group mb-3">
            <label>Anggaran</label>
            <input type="number" name="anggaran" class="form-control">
        </div>

        <button class="btn btn-success">Simpan</button>
    </form>

</div>
@endsection
