<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiWawancaraPendaftar extends Model
{
    use HasFactory;

    protected $table = 'nilai_wawancara_pendaftars';

    protected $fillable = [
        'pendaftar_id',
        'nilai_wawancara',
        'status',
    ];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }


}
