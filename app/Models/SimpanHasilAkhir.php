<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimpanHasilAkhir extends Model
{
    use HasFactory;

    protected $table = 'simpan_hasil_akhirs';

    protected $fillable = [
        'status',
        'hasil'
    ];

    protected $casts = [
        'hasil' => 'array',
    ];
}
