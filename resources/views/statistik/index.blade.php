@extends('layouts.app')

@section('content')
<section class="content-header">
    <h4>Statistik Proyek</h4>
</section>

<section class="content">
<div class="card">
    <div class="card-header bg-info text-white">
        Pilih Proyek
    </div>

    <div class="card-body">
        @forelse($proyek as $p)
            <a href="{{ route('statistik.show', $p->id_proyek) }}"
               class="btn btn-primary mb-2">
                {{ $p->nama_proyek }}
            </a>
            <br>
        @empty
            <p class="text-muted">Belum ada proyek</p>
        @endforelse
    </div>
</div>
</section>
@endsection
