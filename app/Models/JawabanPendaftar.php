<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanPendaftar extends Model
{
    use HasFactory;

    protected $fillable = [
        'soal_pendaftar_id',
        'link_jawaban',
        'file_jawaban',
        'tanggal_pengumpulan',
    ];

    public function soalPendaftar()
    {
        return $this->belongsTo(SoalPendaftar::class);
    }
}
