<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListPengumuman extends Model
{
    use HasFactory;

    protected $table = 'list_pengumuman';
    protected $fillable = ['id_pendaftar', 'status'];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class, 'id_pendaftar');
    }
}
