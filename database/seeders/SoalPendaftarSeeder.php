<?php

namespace Database\Seeders;

use App\Models\SoalPendaftar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SoalPendaftarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SoalPendaftar::create([
            'soal_id' => 1,
            'pendaftar_id' => 1,
            'deskripsi_tugas' => 'Deskripsi tugas contoh',
            'tanggal_mulai' => Carbon::now()->subDays(10),
            'tanggal_akhir' => Carbon::now()->subDays(5),
            'status' => 'Selesai Dikerjakan',
        ]);
    }
}
