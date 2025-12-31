@extends('layouts.app')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <h4 class="mb-4">
            Progress Proyek: <strong>{{ $proyek->nama_proyek }}</strong>
        </h4>
    </div>
</section>

<section class="content">
    <div class="container-fluid">

        {{-- ALERT --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- FORM TAMBAH PROGRESS --}}
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                Tambah Progress
            </div>

            <div class="card-body">
                <form action="{{ route('progress.store') }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf

                    <input type="hidden"
                           name="id_proyek"
                           value="{{ $proyek->id_proyek }}">

                    <div class="form-group mb-3">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi"
                                  class="form-control"
                                  rows="3"
                                  placeholder="Contoh: Pengerjaan pondasi tahap 1"></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label>Persentase</label>
                        <select name="persentase"
                                class="form-control"
                                required>
                            <option value="">-- Pilih Persentase --</option>
                            @foreach(range(5,100,5) as $percent)
                                <option value="{{ $percent }}">
                                    {{ $percent }}%
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label>Foto Progres</label>
                        <input type="file"
                               name="foto"
                               class="form-control">
                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Simpan Progress
                    </button>
                </form>
            </div>
        </div>

        {{-- TABEL RIWAYAT PROGRESS --}}
        <div class="card">
            <div class="card-header bg-primary text-white">
                Riwayat Progress
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="text-center">
                            <tr>
                                <th width="40">#</th>
                                <th width="220">Foto</th>
                                <th width="80">%</th>
                                <th>Deskripsi</th>
                                <th width="120">Tanggal</th>
                                <th width="80">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($progres->reverse() as $p)
                            <tr>
                                <td class="text-center">
                                    {{ $loop->iteration }}
                                </td>

                                {{-- FOTO --}}
                                <td class="text-center">
                                    @if($p->foto)
                                        <img
                                            src="{{ url('storage/'.$p->foto) }}"
                                            alt="Foto Progress"
                                            style="
                                                width:200px;
                                                height:140px;
                                                object-fit:cover;
                                                border-radius:8px;
                                                box-shadow:0 3px 8px rgba(0,0,0,.3);
                                            "
                                        >
                                    @else
                                        <span class="text-muted">Tidak ada</span>
                                    @endif
                                </td>

                                <td class="text-center">
                                    <span class="badge bg-info fs-6">
                                        {{ $p->persentase }}%
                                    </span>
                                </td>

                                {{-- DESKRIPSI --}}
                                <td style="font-size:14px; line-height:1.4;">
                                    {{ $p->deskripsi }}
                                </td>

                                <td class="text-center">
                                    {{ $p->created_at->format('d-m-Y') }}
                                </td>

                                <td class="text-center">
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

    </div>
</section>

@endsection
