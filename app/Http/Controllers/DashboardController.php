<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konsultasi;
use App\Models\ProgresProyek;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung dari database
        $data = [
            'total_proyek'      => ProgresProyek::count(),
            'proyek_selesai'    => ProgresProyek::where('persentase', 100)->count(),
            'proyek_berjalan'   => ProgresProyek::where('persentase', '<', 100)->count(),

            
        ];

        return view('dashboard', compact('data'));
    }
}
