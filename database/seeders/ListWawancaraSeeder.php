<?php

namespace Database\Seeders;

use App\Models\ListWawancara;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ListWawancaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ListWawancara::create([
            'pendaftar_id' => 1,
            'divisi_mentor_id' => 1,
            'deskripsi' => 'Deskripsi wawancara pendaftar 1',
            'tanggal_wawancara' => Carbon::now()->subDays(10),
            'status' => 'Selesai'
        ]);

        ListWawancara::create([
            'pendaftar_id' => 2,
            'divisi_mentor_id' => 1,
            'deskripsi' => 'Deskripsi wawancara pendaftar 2',
            'tanggal_wawancara' => Carbon::now()->subDays(9),
            'status' => 'Selesai'
        ]);

        ListWawancara::create([
            'pendaftar_id' => 3,
            'divisi_mentor_id' => 1,
            'deskripsi' => 'Deskripsi wawancara pendaftar 3',
            'tanggal_wawancara' => Carbon::now()->subDays(8),
            'status' => 'Selesai'
        ]);

        ListWawancara::create([
            'pendaftar_id' => 4,
            'divisi_mentor_id' => 1,
            'deskripsi' => 'Deskripsi wawancara pendaftar 4',
            'tanggal_wawancara' => Carbon::now()->subDays(7),
            'status' => 'Selesai'
        ]);

        ListWawancara::create([
            'pendaftar_id' => 5,
            'divisi_mentor_id' => 1,
            'deskripsi' => 'Deskripsi wawancara pendaftar 5',
            'tanggal_wawancara' => Carbon::now()->subDays(6),
            'status' => 'Selesai'
        ]);

        ListWawancara::create([
            'pendaftar_id' => 6,
            'divisi_mentor_id' => 1,
            'deskripsi' => 'Deskripsi wawancara pendaftar 6',
            'tanggal_wawancara' => Carbon::now()->subDays(5),
            'status' => 'Selesai'
        ]);

        ListWawancara::create([
            'pendaftar_id' => 7,
            'divisi_mentor_id' => 1,
            'deskripsi' => 'Deskripsi wawancara pendaftar 7',
            'tanggal_wawancara' => Carbon::now()->subDays(4),
            'status' => 'Selesai'
        ]);

        ListWawancara::create([
            'pendaftar_id' => 8,
            'divisi_mentor_id' => 1,
            'deskripsi' => 'Deskripsi wawancara pendaftar 8',
            'tanggal_wawancara' => Carbon::now()->subDays(3),
            'status' => 'Selesai'
        ]);

        ListWawancara::create([
            'pendaftar_id' => 9,
            'divisi_mentor_id' => 1,
            'deskripsi' => 'Deskripsi wawancara pendaftar 9',
            'tanggal_wawancara' => Carbon::now()->subDays(2),
            'status' => 'Selesai'
        ]);

        ListWawancara::create([
            'pendaftar_id' => 10,
            'divisi_mentor_id' => 1,
            'deskripsi' => 'Deskripsi wawancara pendaftar 10',
            'tanggal_wawancara' => Carbon::now()->subDays(1),
            'status' => 'Selesai'
        ]);
    }
}
