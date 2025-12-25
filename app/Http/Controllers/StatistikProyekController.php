<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\ProgresProyek;

class StatistikProyekController extends Controller
{
    // HALAMAN PILIH PROYEK
    public function index()
    {
        // ⛔ TANPA FILTER STATUS (SUPAYA DATA PASTI MUNCUL)
        $proyek = Proyek::orderBy('nama_proyek', 'asc')->get();

        return view('statistik.index', compact('proyek'));
    }

    // HALAMAN STATISTIK PROYEK
    public function show($id)
    {
        $proyek = Proyek::findOrFail($id);

        $progres = ProgresProyek::where('id_proyek', $id)
            ->orderBy('created_at', 'asc')
            ->get();

        // RATA-RATA PROGRES
        $persen = $progres->avg('persentase') ?? 0;

        // DATA CHART
        $tanggal = $progres->map(fn ($p) =>
            $p->created_at->format('d-m-Y')
        );

        $persentase = $progres->pluck('persentase');

        return view('statistik.show', compact(
            'proyek',
            'progres',
            'persen',
            'tanggal',
            'persentase'
        ));
    }
}
