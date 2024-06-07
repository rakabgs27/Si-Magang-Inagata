<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JawabanPendaftar;
use Carbon\Carbon;

class JawabanPendaftarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JawabanPendaftar::create([
            'soal_pendaftar_id' => 1,
            'link_jawaban' => 'https://example.com/link-jawaban',
            'file_jawaban' => 'jawaban.pdf',
            'tanggal_pengumpulan' => Carbon::now(),
        ]);
    }
}
