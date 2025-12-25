<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProgresProyek extends Model
{
    use HasFactory;

    protected $table = 'progres_proyek';
    protected $primaryKey = 'id_progresproyek';

    protected $fillable = [
        'id_proyek',
        'deskripsi',
        'persentase',
        'foto',
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'id_proyek', 'id_proyek');
    }
}
