@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Progress Proyek – Pilih Proyek</h3>

    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            Daftar Proyek
        </div>

        <div class="card-body">

            @if($proyek->count() === 0)
                <p class="text-center mb-0">Belum ada proyek.</p>
            @else
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Proyek</th>
                            <th>Klien</th>
                            <th>Status</th>
                            <th width="140">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($proyek as $p)
                            <tr>
                                <td>{{ $p->nama_proyek }}</td>
                                <td>{{ $p->klien ?? '-' }}</td>
                                <td>
                                    <span class="badge
                                        @if($p->status === 'Selesai') bg-success
                                        @elseif($p->status === 'Berjalan') bg-primary
                                        @else bg-secondary
                                        @endif
                                    ">
                                        {{ $p->status }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('progress.index', $p->id_proyek) }}"
                                       class="btn btn-sm btn-primary">
                                        Lihat Progress
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </div>
    </div>
</div>
@endsection
