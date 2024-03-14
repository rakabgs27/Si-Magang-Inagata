<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $table = 'soals';

    protected $fillable = [
        'divisi_id',
        'pendaftar_id',
        'judul_soal',
        'file_soal',
    ];

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }
}
