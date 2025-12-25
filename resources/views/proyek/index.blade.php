@extends('layouts.app')

@section('content')
<div class="container">

    <a href="{{ route('proyek.create') }}" class="btn btn-primary mb-3">Tambah Proyek</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Proyek</th>
                <th>Klien</th>
                <th>Status</th>
                <th>Tgl Mulai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($proyek as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->nama_proyek }}</td>
                <td>{{ $p->klien }}</td>
                <td>{{ ucfirst($p->status) }}</td>
                <td>{{ $p->tanggal_mulai }}</td>
                <td>
                    <a href="{{ route('proyek.edit', $p) }}" 
                       class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('proyek.destroy', $p) }}" 
                          method="POST" 
                          style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus proyek?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6">Belum ada proyek.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
