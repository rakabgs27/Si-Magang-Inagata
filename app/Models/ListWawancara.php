<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListWawancara extends Model
{
    use HasFactory;

    protected $table = 'list_wawancaras';

    protected $fillable = [
        'pendaftar_id',
        'divisi_mentor_id',
        'deskripsi',
        'tanggal_wawancara',
        'status'
    ];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class, 'pendaftar_id');
    }

    public function divisiMentor()
    {
        return $this->belongsTo(DivisiMentor::class, 'divisi_mentor_id');
    }

}
