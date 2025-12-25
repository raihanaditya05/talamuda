<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyek;
use App\Models\ProgresProyek;
use Illuminate\Support\Facades\Storage;

class ProgresProyekController extends Controller
{
    public function pilihProyek()
    {
        $proyek = Proyek::all();
        return view('progress.pilih', compact('proyek'));
    }

    public function index($id_proyek)
    {
        $proyek = Proyek::findOrFail($id_proyek);

        $progres = ProgresProyek::where('id_proyek', $id_proyek)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('progress.pproyek', compact('proyek', 'progres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_proyek'  => 'required|exists:proyek,id_proyek',
            'deskripsi'  => 'nullable|string',
            'persentase' => 'required|integer|min:0|max:100',
            'foto'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['id_proyek','deskripsi','persentase']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_proyek', 'public');
        }

        ProgresProyek::create($data);

        return back()->with('success', 'Progress berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $progres = ProgresProyek::findOrFail($id);

        if ($progres->foto && Storage::disk('public')->exists($progres->foto)) {
            Storage::disk('public')->delete($progres->foto);
        }

        $progres->delete();

        return back()->with('success', 'Progress berhasil dihapus');
    }
}
