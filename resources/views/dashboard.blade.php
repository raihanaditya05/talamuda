@extends('layouts.app')

@section('content')

<!-- Header / Judul Halaman -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Dashboard</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- Konten Utama -->
<section class="content">
  <div class="container-fluid">
    <div class="row">

      <!-- Card: Total Proyek -->
      <div class="col-lg-3 col-12">
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $data['total_proyek'] ?? 0 }}</h3>
            <p>Total Proyek</p>
          </div>
          <div class="icon">
            <i class="fas fa-building"></i>
          </div>
       <a href="{{ route('progress.pilih') }}" class="small-box-footer">
            Lihat Detail <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <!-- Card: Proyek Selesai -->
      <div class="col-lg-3 col-12">
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $data['proyek_selesai'] ?? 0 }}</h3>
            <p>Proyek Selesai</p>
          </div>
          <div class="icon">
            <i class="fas fa-check-circle"></i>
          </div>
        <a href="{{ route('progress.pilih') }}" class="small-box-footer">
            Lihat Detail <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <!-- Card: Proyek Berjalan -->
      <div class="col-lg-3 col-12">
        <div class="small-box bg-warning">
          <div class="inner text-white">
            <h3>{{ $data['proyek_berjalan'] ?? 0 }}</h3>
            <p>Proyek Berjalan</p>
          </div>
          <div class="icon">
            <i class="fas fa-tasks"></i>
          </div>
          <a href="{{ route('progress.pilih') }}" class="small-box-footer text-white">
            Lihat Detail <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
    </div>

    <!-- Card Sambutan -->
    <div class="card mt-4">
      <div class="card-header bg-success text-white">
        <h3 class="card-title">Selamat Datang di Dashboard Brader Konstruksi</h3>
      </div>
      <div class="card-body">
        <p>
          Sistem ini membantu kamu memantau progress proyek, mencatat laporan mingguan,
          serta mengawasi bahan bangunan dengan lebih efisien.
        </p>
        <p>
          Gunakan menu di sidebar untuk mengelola fitur sesuai kebutuhan.
        </p>
      </div>
    </div>

  </div>
</section>

@endsection
