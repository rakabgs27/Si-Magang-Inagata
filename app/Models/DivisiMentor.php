<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivisiMentor extends Model
{
    use HasFactory;

    protected $table = 'divisi_mentors';

    protected $fillable = [
        'user_id',
        'divisi_id',
    ];

    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'divisi_id');
    }
}
