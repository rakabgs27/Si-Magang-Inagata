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
        'user_id',
        'judul_soal',
        'file_soal',
        'deskripsi_soal',
        'tanggal_upload',
    ];

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
