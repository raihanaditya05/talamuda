@extends('layouts.app')

@section('content')
<section class="content-header">
    <h4>Statistik Proyek: {{ $proyek->nama_proyek }}</h4>
</section>

<section class="content">

<div class="card mb-4">
    <div class="card-header bg-success text-white">
        Progress Total
    </div>
    <div class="card-body">

        <h5>Total Progress: {{ round($persen, 1) }}%</h5>

        <div class="progress mb-3">
            <div class="progress-bar bg-success"
                 style="width: {{ $persen }}%">
            </div>
        </div>

    </div>
</div>

{{-- CHART --}}
<div class="card mb-4">
    <div class="card-header bg-primary text-white">
        Grafik Progress
    </div>
    <div class="card-body">
        <canvas id="progressChart"></canvas>
    </div>
</div>

{{-- DETAIL --}}
<div class="card">
    <div class="card-header bg-info text-white">
        Detail Progress
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Deskripsi</th>
                    <th>Persentase</th>
                </tr>
            </thead>
            <tbody>
                @forelse($progres as $p)
                <tr>
                    <td>{{ $p->created_at->format('d-m-Y') }}</td>
                    <td>{{ $p->deskripsi }}</td>
                    <td>{{ $p->persentase }}%</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center text-muted">
                        Belum ada progres
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</section>

{{-- CHART JS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('progressChart');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: {!! json_encode($tanggal) !!},
        datasets: [{
            label: 'Progress (%)',
            data: {!! json_encode($persentase) !!},
            borderWidth: 2,
            tension: 0.4
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                max: 100
            }
        }
    }
});
</script>
@endsection
