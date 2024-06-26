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
        for ($i = 1; $i <= 10; $i++) {
            JawabanPendaftar::create([
                'soal_pendaftar_id' => $i,
                'link_jawaban' => 'https://example.com/link-jawaban-' . $i,
                'file_jawaban' => 'jawaban' . $i . '.pdf',
                'tanggal_pengumpulan' => Carbon::now(),
            ]);
        }

        // JawabanPendaftar::create([
        //     'soal_pendaftar_id' => 2,
        //     'link_jawaban' => 'https://example.com/link-jawaban',
        //     'file_jawaban' => 'jawaban.pdf',
        //     'tanggal_pengumpulan' => Carbon::now(),
        // ]);
    }
}
