<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    protected $table = 'pendaftars';

    protected $fillable = [
        'user_id',
        'divisi_id',
        'nomor_hp',
        'nama_instansi',
        'nama_jurusan',
        'nim',
        'link_cv',
        'link_porto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }

    public function listPengumuman()
    {
        return $this->hasOne(ListPengumuman::class);
    }
}
