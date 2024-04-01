<?php

namespace Database\Seeders;

use App\Models\Soal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Soal::create([
            'user_id' => 1,
            'divisi_id' => 2,
            'judul_soal' => 'Sample Question',
            'file_soal' => 'sample_file.pdf',
            'deskripsi_soal' => 'This is a sample question description.',
            'tanggal_upload' => now(),
        ]);
    }
}
