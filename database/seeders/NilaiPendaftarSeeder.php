<?php

namespace Database\Seeders;

use App\Models\NilaiPendaftar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NilaiPendaftarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NilaiPendaftar::create([
            'pendaftar_id' => 1,
            'kriteria_1' => 60,
            'kriteria_2' => 70,
            'kriteria_3' => 80,
            'kriteria_4' => 90,
            'kriteria_5' => 100,
            'kriteria_6' => 60,
            'status' => 'Sudah Dinilai'
        ]);

        NilaiPendaftar::create([
            'pendaftar_id' => 2,
            'kriteria_1' => 70,
            'kriteria_2' => 80,
            'kriteria_3' => 90,
            'kriteria_4' => 100,
            'kriteria_5' => 60,
            'kriteria_6' => 70,
            'status' => 'Sudah Dinilai'
        ]);

        NilaiPendaftar::create([
            'pendaftar_id' => 3,
            'kriteria_1' => 80,
            'kriteria_2' => 90,
            'kriteria_3' => 100,
            'kriteria_4' => 60,
            'kriteria_5' => 70,
            'kriteria_6' => 80,
            'status' => 'Sudah Dinilai'
        ]);

        NilaiPendaftar::create([
            'pendaftar_id' => 4,
            'kriteria_1' => 90,
            'kriteria_2' => 100,
            'kriteria_3' => 60,
            'kriteria_4' => 70,
            'kriteria_5' => 80,
            'kriteria_6' => 90,
            'status' => 'Sudah Dinilai'
        ]);

        NilaiPendaftar::create([
            'pendaftar_id' => 5,
            'kriteria_1' => 100,
            'kriteria_2' => 60,
            'kriteria_3' => 70,
            'kriteria_4' => 80,
            'kriteria_5' => 90,
            'kriteria_6' => 100,
            'status' => 'Sudah Dinilai'
        ]);

        NilaiPendaftar::create([
            'pendaftar_id' => 6,
            'kriteria_1' => 60,
            'kriteria_2' => 70,
            'kriteria_3' => 80,
            'kriteria_4' => 90,
            'kriteria_5' => 100,
            'kriteria_6' => 60,
            'status' => 'Sudah Dinilai'
        ]);

        NilaiPendaftar::create([
            'pendaftar_id' => 7,
            'kriteria_1' => 70,
            'kriteria_2' => 80,
            'kriteria_3' => 90,
            'kriteria_4' => 100,
            'kriteria_5' => 60,
            'kriteria_6' => 70,
            'status' => 'Sudah Dinilai'
        ]);

        NilaiPendaftar::create([
            'pendaftar_id' => 8,
            'kriteria_1' => 80,
            'kriteria_2' => 90,
            'kriteria_3' => 100,
            'kriteria_4' => 60,
            'kriteria_5' => 70,
            'kriteria_6' => 80,
            'status' => 'Sudah Dinilai'
        ]);

        NilaiPendaftar::create([
            'pendaftar_id' => 9,
            'kriteria_1' => 90,
            'kriteria_2' => 100,
            'kriteria_3' => 60,
            'kriteria_4' => 70,
            'kriteria_5' => 80,
            'kriteria_6' => 90,
            'status' => 'Sudah Dinilai'
        ]);

        NilaiPendaftar::create([
            'pendaftar_id' => 10,
            'kriteria_1' => 100,
            'kriteria_2' => 60,
            'kriteria_3' => 70,
            'kriteria_4' => 80,
            'kriteria_5' => 90,
            'kriteria_6' => 100,
            'status' => 'Sudah Dinilai'
        ]);
    }
}
