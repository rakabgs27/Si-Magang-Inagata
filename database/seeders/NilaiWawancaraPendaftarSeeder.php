<?php

namespace Database\Seeders;

use App\Models\NilaiWawancaraPendaftar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NilaiWawancaraPendaftarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NilaiWawancaraPendaftar::create([
            'pendaftar_id' => 1,
            'nilai_wawancara' => 60,
            'status' => 'Sudah Dinilai'
        ]);

        NilaiWawancaraPendaftar::create([
            'pendaftar_id' => 2,
            'nilai_wawancara' => 70,
            'status' => 'Sudah Dinilai'
        ]);

        NilaiWawancaraPendaftar::create([
            'pendaftar_id' => 3,
            'nilai_wawancara' => 80,
            'status' => 'Sudah Dinilai'
        ]);

        NilaiWawancaraPendaftar::create([
            'pendaftar_id' => 4,
            'nilai_wawancara' => 90,
            'status' => 'Sudah Dinilai'
        ]);

        NilaiWawancaraPendaftar::create([
            'pendaftar_id' => 5,
            'nilai_wawancara' => 100,
            'status' => 'Sudah Dinilai'
        ]);

        NilaiWawancaraPendaftar::create([
            'pendaftar_id' => 6,
            'nilai_wawancara' => 60,
            'status' => 'Sudah Dinilai'
        ]);

        NilaiWawancaraPendaftar::create([
            'pendaftar_id' => 7,
            'nilai_wawancara' => 70,
            'status' => 'Sudah Dinilai'
        ]);

        NilaiWawancaraPendaftar::create([
            'pendaftar_id' => 8,
            'nilai_wawancara' => 80,
            'status' => 'Sudah Dinilai'
        ]);

        NilaiWawancaraPendaftar::create([
            'pendaftar_id' => 9,
            'nilai_wawancara' => 90,
            'status' => 'Sudah Dinilai'
        ]);

        // NilaiWawancaraPendaftar::create([
        //     'pendaftar_id' => 10,
        //     'nilai_wawancara' => 100,
        //     'status' => 'Sudah Dinilai'
        // ]);
    }
}
