@extends('layouts.app')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <h4 class="mb-4">Progress Proyek: {{ $proyek->nama_proyek }}</h4>
  </div>
</section>

<section class="content">
  <div class="container-fluid">

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Form Tambah Progress --}}
    <div class="card mb-4">
      <div class="card-header bg-success text-white">Tambah Progress</div>
      <div class="card-body">

        <form action="{{ route('progress.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          {{-- ID PROYEK --}}
          <input type="hidden" name="id_proyek" value="{{ $proyek->id_proyek }}">

          <div class="form-group mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3"></textarea>
          </div>

          <div class="form-group mb-3">
            <label>Persentase</label>
            <select name="persentase" class="form-control" required>
              <option value="">-- Pilih Persentase --</option>
              @foreach(range(5, 100, 5) as $percent)
                <option value="{{ $percent }}">{{ $percent }}%</option>
              @endforeach
            </select>
          </div>

          <div class="form-group mb-3">
            <label>Foto Progres (opsional)</label>
            <input type="file" name="foto" class="form-control">
          </div>

          <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i> Simpan Progress
          </button>
        </form>

      </div>
    </div>

    {{-- Tabel Progress --}}
    <div class="card">
      <div class="card-header bg-primary text-white">Riwayat Progress</div>
      <div class="card-body">

        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Deskripsi</th>
              <th>Persentase</th>
              <th>Foto</th>
              <th>Tanggal</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <tbody>
            @forelse($progres as $p)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $p->deskripsi }}</td>
              <td>
                <span class="badge bg-info">{{ $p->persentase }}%</span>
              </td>
              <td>
                @if($p->foto)
                  <img 
                    src="{{ asset('storage/'.$p->foto) }}" 
                    width="100" 
                    class="img-thumbnail"
                  >
                @else
                  <i class="text-muted">Tidak ada</i>
                @endif
              </td>
              <td>{{ $p->created_at->format('d-m-Y') }}</td>
              <td>
               <form action="{{ route('progress.destroy', $p->id_progresproyek) }}"
      method="POST"
      onsubmit="return confirm('Hapus progress ini?')">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger btn-sm">
        <i class="fas fa-trash"></i>
    </button>
</form>

              </td>
            </tr>
            @empty
            <tr>
              <td colspan="6" class="text-center text-muted">
                Belum ada progress
              </td>
            </tr>
            @endforelse
          </tbody>

        </table>
      </div>
    </div>

  </div>
</section>

@endsection
