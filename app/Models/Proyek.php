<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ProgresProyek;

class Proyek extends Model
{
    use HasFactory;

    protected $table = 'proyek';
    protected $primaryKey = 'id_proyek';

  protected $fillable = [
    'nama_proyek',
    'klien',
    'lokasi',
    'tanggal_mulai',
    'tanggal_selesai',
    'status',
    'anggaran',
];


    // Jika tabel tidak punya created_at & updated_at, aktifkan baris ini:
    // public $timestamps = false;

    public function progres()
    {
        return $this->hasMany(ProgresProyek::class, 'id_proyek');
    }
}
