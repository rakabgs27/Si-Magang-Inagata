<?php

namespace Database\Seeders;

use App\Models\NilaiReviewer;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NilaiReviewerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for ($i = 1; $i <= 10; $i++) {
        //     NilaiReviewer::create([
        //         'nilai_wawancara_pendaftars_id' => $i,
        //         'nilai_pendaftars_id' => $i,
        //         'status' => 'Terverifikasi',
        //         'tanggal_verifikasi' => Carbon::now(),
        //     ]);
        //     }
        NilaiReviewer::create([
            'nilai_wawancara_pendaftars_id' => 1,
            'nilai_pendaftars_id' => 1,
            'status' => 'Terverifikasi',
            'tanggal_verifikasi' => Carbon::now(),
        ]);
        NilaiReviewer::create([
            'nilai_wawancara_pendaftars_id' => 2,
            'nilai_pendaftars_id' => 2,
            'status' => 'Terverifikasi',
            'tanggal_verifikasi' => Carbon::now(),
        ]);
        NilaiReviewer::create([
            'nilai_wawancara_pendaftars_id' => 3,
            'nilai_pendaftars_id' => 3,
            'status' => 'Terverifikasi',
            'tanggal_verifikasi' => Carbon::now(),
        ]);
        NilaiReviewer::create([
            'nilai_wawancara_pendaftars_id' => 4,
            'nilai_pendaftars_id' => 4,
            'status' => 'Terverifikasi',
            'tanggal_verifikasi' => Carbon::now(),
        ]);
        NilaiReviewer::create([
            'nilai_wawancara_pendaftars_id' => 5,
            'nilai_pendaftars_id' => 5,
            'status' => 'Terverifikasi',
            'tanggal_verifikasi' => Carbon::now(),
        ]);
        NilaiReviewer::create([
            'nilai_wawancara_pendaftars_id' => 6,
            'nilai_pendaftars_id' => 6,
            'status' => 'Belum Diverifikasi',
            'tanggal_verifikasi' => Carbon::now(),
        ]);
        NilaiReviewer::create([
            'nilai_wawancara_pendaftars_id' => 7,
            'nilai_pendaftars_id' => 7,
            'status' => 'Belum Diverifikasi',
            'tanggal_verifikasi' => Carbon::now(),
        ]);
        NilaiReviewer::create([
            'nilai_wawancara_pendaftars_id' => 8,
            'nilai_pendaftars_id' => 8,
            'status' => 'Belum Diverifikasi',
            'tanggal_verifikasi' => Carbon::now(),
        ]);
        NilaiReviewer::create([
            'nilai_wawancara_pendaftars_id' => 9,
            'nilai_pendaftars_id' => 9,
            'status' => 'Belum Diverifikasi',
            'tanggal_verifikasi' => Carbon::now(),
        ]);
        NilaiReviewer::create([
            'nilai_wawancara_pendaftars_id' => 10,
            'nilai_pendaftars_id' => 10,
            'status' => 'Belum Diverifikasi',
            'tanggal_verifikasi' => Carbon::now(),
        ]);
    }
}
