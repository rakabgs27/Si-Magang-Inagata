<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoalPendaftar extends Model
{
    use HasFactory;

    protected $table = 'soal_pendaftars';

    protected $fillable = [
        'soal_id',
        'pendaftar_id',
        'deskripsi_tugas',
        'tanggal_mulai',
        'tanggal_akhir',
    ];

    public function soal()
    {
        return $this->belongsTo(Soal::class);
    }

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }
}
