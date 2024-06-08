<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiPendaftar extends Model
{
    use HasFactory;

    protected $table = 'nilai_pendaftars';

    protected $fillable = [
        'pendaftar_id',
        'kriteria_1', 'kriteria_2', 'kriteria_3', 'kriteria_4', 'kriteria_5', 'kriteria_6',
        'kriteria_7', 'kriteria_8', 'kriteria_9', 'kriteria_10', 'kriteria_11', 'kriteria_12',
        'kriteria_13', 'kriteria_14', 'kriteria_15', 'kriteria_16', 'kriteria_17', 'kriteria_18',
        'kriteria_19', 'kriteria_20', 'kriteria_21', 'kriteria_22', 'kriteria_23', 'kriteria_24',
        'kriteria_25', 'kriteria_26', 'kriteria_27', 'kriteria_28', 'kriteria_29', 'kriteria_30',
        'kriteria_31', 'kriteria_32', 'kriteria_33', 'kriteria_34', 'kriteria_35', 'kriteria_36',
        'kriteria_37', 'kriteria_38', 'kriteria_39', 'kriteria_40',
    ];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }
}
