<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiReviewer extends Model
{
    use HasFactory;

    protected $table = 'nilai_reviewers';

    protected $fillable = [
        'nilai_wawancara_pendaftars_id',
        'nilai_pendaftars_id',
        'status',
        'tanggal_verifikasi',
    ];

    public function nilaiWawancaraPendaftars()
    {
        return $this->belongsTo(NilaiWawancaraPendaftar::class, 'nilai_wawancara_pendaftars_id');
    }

    public function nilaiPendaftars()
    {
        return $this->belongsTo(NilaiPendaftar::class, 'nilai_pendaftars_id');
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->tanggal_verifikasi = now();
        });
    }
}
