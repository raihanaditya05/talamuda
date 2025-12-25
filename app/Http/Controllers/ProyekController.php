<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    // Menampilkan daftar proyek
    public function index()
    {
        $proyek = Proyek::all();
        return view('proyek.index', compact('proyek'));
    }

    // Form tambah data
    public function create()
    {
        return view('proyek.create');
    }

    // Proses simpan data proyek
    public function store(Request $request)
    {
        $request->validate([
            'nama_proyek' => 'required|string|max:255',
            'klien' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date',
            'status' => 'required|string',
            'anggaran' => 'required|numeric',
        ]);

        Proyek::create([
            'nama_proyek' => $request->nama_proyek,
            'klien' => $request->klien,
            'lokasi' => $request->lokasi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'status' => $request->status,
            'anggaran' => $request->anggaran,
        ]);

        return redirect()->route('proyek.index')->with('success', 'Proyek berhasil ditambahkan!');
    }

    // Form edit proyek
    public function edit($id)
    {
        $proyek = Proyek::findOrFail($id);
        return view('proyek.edit', compact('proyek'));
    }

    // Proses update data proyek
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_proyek' => 'required|string|max:255',
            'klien' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date',
            'status' => 'required|string',
            'anggaran' => 'required|numeric',
        ]);

        $proyek = Proyek::findOrFail($id);

        $proyek->update([
            'nama_proyek' => $request->nama_proyek,
            'klien'  => $request->klien,
            'lokasi' => $request->lokasi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'status' => $request->status,
            'anggaran' => $request->anggaran,
        ]);

        return redirect()->route('proyek.index')->with('success', 'Proyek berhasil diperbarui!');
    }

    // Hapus proyek
    public function destroy($id)
    {
        $proyek = Proyek::findOrFail($id);
        $proyek->delete();

        return redirect()->route('proyek.index')->with('success', 'Proyek berhasil dihapus!');
    }
}
