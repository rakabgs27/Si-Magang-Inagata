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
        for ($i = 1; $i <= 10; $i++) {
            NilaiReviewer::create([
                'nilai_wawancara_pendaftars_id' => $i,
                'nilai_pendaftars_id' => $i,
                'status' => 'Terverifikasi',
                'tanggal_verifikasi' => Carbon::now(),
            ]);
        }
    }
}
